<?php

/**
 * Имеем функцию load_users_data для получения информации о пользователях по id в виде объекта
 */

function load_users_data($user_ids) {
    $user_ids = explode(',', $user_ids);
    $db = mysqli_connect("localhost", "root", "123123", "database");
    foreach ($user_ids as $user_id) {
        /** 
         * $db = mysqli_connect("localhost", "root", "123123", "database");
         * @method mysqli_connect() выносим из цикла, чтобы не подключатся к базе данных каждый раз при переборе нового $user_id
         * в запросе к базе данных переменная присутствует в строке и создает ошибку (для решения я просто сконкатенировал строку и переменную)
        */
        $sql = mysqli_query($db, "SELECT * FROM users WHERE id=" . $user_id);
        while($obj = $sql->fetch_object()){
            $data[$user_id] = $obj;
        }
        /**
         * mysqli_close($db);
         * @method mysqli_close() тоже выносим из цикла, чтобы не закрывать соединение каждый раз
         */
    }
    mysqli_close($db);
    return $data;
}
// Как правило, в $_GET['user_ids'] должна приходить строка
// с номерами пользователей через запятую, например: 1,2,17,48

$data = load_users_data('1,2,3');
foreach ($data as $user_id=>$user) {
    /**
     * echo "<a href=\"/show_user.php?id=$user_id\">$name</a>";
     * проблема переменной в строке, которая была описана мной выше и встречалась в запросе к бд, здесь тоже присутствует
     * решаем ее простой конкатенацией, а так же ошибка состоит в том, что значение элемента массива $name не является строкой, 
     * а является объектом, у которого надо получить этот аттрибут name, т.е. $user->name instead $name
     */
    echo "<a href=\"/show_user.php?id=" . $user_id . "\">" . $user->name . "</a><br>";
}
