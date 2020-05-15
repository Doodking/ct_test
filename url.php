<?php

function parseUrl(string $url = 'https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3'){
    //получаем массив параметров ссылки
    $urls = explode('?', $url);
    
    //создаем массив, в который будут входить части ссылки, а именно протокол и хост
    $host = [];
    $i = 0;
    //заполняем этот массив частями ссылки
    while($i != 3){
        $host[] = explode('/', $urls[0], 4)[$i];
        $i++;
    }

    //разбиваем часть ссылки с параметрами на отдельные части
    $params = explode('&', $urls[1]);
    //создаем отдельный массив для валидных параметров
    $sortParams = [];
    foreach($params as $p){
        if(explode('=', $p)[1] != 3){
            $sortParams[] = $p;
        }
    }
    //сортируем его
    rsort($sortParams);

    //создаем части валидной ссылки
    $hostOfValidLink = implode('/', $host) . '/?';
    $paramsOfValidLink = implode('&', $sortParams) . '&url=/';
    $urlOfValidLink = explode('/', $urls[0], 4)[3];
    $validLink = $hostOfValidLink . $paramsOfValidLink . $urlOfValidLink;
    //возвращаем ее
    return $validLink;

}


?>