<?php

/**
 * Контроллер для работы с корзиной
 */

class CartController extends Controller{

   public function __construct(){
                 parent::__construct();
   }

    public function index (){

        //Получаем id пользователя из сессии
        $userId = User::checkLog();

        //Получаем всю информацию о пользователе из БД
        $user = User::getUserById($userId);

        $productsInCart = $_POST['val'];
        
        $info = json_decode($_POST['info'], true);

         $userPhone = $info['tel'];
         $userName = $info['name'];
         $userText = $info['comment'];
        // 

        $res = Order::save($userName, $userPhone, $userText, $userId, $productsInCart);

    }


}
