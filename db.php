<?php
$db = mysqli_connect('localhost', 'root', '12345', 'database');

$query = mysqli_query($db, 'SELECT `users`.`name`, COUNT(`phone_numbers`.`phone`) as count FROM `users`' . 
'JOIN `phone_numbers` ON `user_id` WHERE `users`.`gender`=2' . 
'AND DATEDIFF(CURDATE(), FROM_UNIXTIME(`users`.`birth_date`)) > 18 OR DATEDIFF(CURDATE(), FROM_UNIXTIME(`users`.`birth_date`)) < 22');