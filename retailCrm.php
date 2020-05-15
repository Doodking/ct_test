<?php

require 'vendor/autoload.php';

/** 
 * @var 'http://b12.skillum.ru/personal/order/make/' (ссылка, по которой осуществляется создание заказа в магазине)
*/

$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];
$method = $_SERVER['REQUEST_METHOD'];


/**
 * Проверяем идет ли запрос от пользователя на создание заказа
 */

if($url == 'http://b12.skillum.ru/personal/order/make/' && $method=='POST'){

    /**
     * @var ApiClient $client - создаем инстанс Api клиента для работы с методами retailCrmApi
     * @param param1,param2 - для создания инстанса необходимо перейти по ссылке $param1, зайти в аккаунт и создать в настройках новый ApiKey
     */
    $client = new \RetailCrm\ApiClient(
        $param1 = 'https://demo.retailcrm.ru',
        $param2 = 'kxAN6Anpq2mRGr4hBD9RpL6s6sZl6oRh',
        \RetailCrm\ApiClient::V5
    );

    try {
        $response = $client->request->ordersCreate(array(
            'externalId' => 'some-shop-order-id',
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'items' => $_POST['items'],
            'delivery' => array(
                'code' => $_POST['code'],
            )
        ));
    } catch (\RetailCrm\Exception\CurlException $e) {
        echo "Connection error: " . $e->getMessage();
    }

    if ($response->isSuccessful() && 201 === $response->getStatusCode()) {
        echo 'Order successfully created. Order ID into retailCRM = ' . $response->id;
            // or $response['id'];
            // or $response->getId();
    } else {
        echo sprintf(
            "Error: [HTTP-code %s] %s",
            $response->getStatusCode(),
            $response->getErrorMsg()
        );
    }
}




