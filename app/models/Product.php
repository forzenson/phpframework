<?php

/**
 * Модель для работы с товарами
 */
class Product {

    //Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 4;

    /**
     * Выводит списко всех товраов
     *
     * @return array
     */

    public static function index() {

        $con = Connection::make();
        $con->exec("set names utf8");

        $sql = "
                SELECT id, name, code, price, description FROM product
                ORDER BY id ASC
                ";

        $res = $con->query($sql);

        $products = $res->fetchAll(PDO::FETCH_ASSOC);
        return $products;

    }


    /**
     * Получаем последние товары
     *
     * @param int $page
     * @return array
     */
    public static function getLatestProducts ($page = 1) {

        $limit = self::SHOW_BY_DEFAULT;

        //Задаем смещение
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $con = Connection::make();

        $sql = "
                SELECT id, name, price, is_new, description
                  FROM product
                    WHERE status = 1
                      ORDER BY id DESC
                        LIMIT :limit OFFSET :offset
                ";

        //Подготавливаем данные
        $res = $con->prepare($sql);
        $res->bindParam(':limit', $limit, PDO::PARAM_INT);
        $res->bindParam(':offset', $offset, PDO::PARAM_INT);

        //Выполняем запрос
        $res->execute();

        //Получаем и возвращаем результат
        $productsList = $res->fetchAll(PDO::FETCH_ASSOC);

        return $productsList;
    }

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage ($id) {

        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = "/media/images/products/";

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '/' . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    /**
     * Выбираем товар по идентификатору
     *
     * @param $productId
     * @return mixed
     */
    public static function getProductById ($productId) {

        $con = Connection::make();

        $sql = "
               SELECT id, name, code, price, availability, brand,
                description, is_new, category_id, status FROM product
                    WHERE id = :id
               ";

        $res = $con->prepare($sql);
        $res->bindParam(':id', $productId, PDO::PARAM_INT);
        $res->execute();

        $products = $res->fetch(PDO::FETCH_ASSOC);

        return $products;
    }
    /**
     * Выборка товаров по массиву id
     *
     * @param $arrayIds
     * @return array
     */
    public static function getProductsByIds ($arrayIds) {

        $con = Connection::make();

        //Разбиваем пришедший массив в строку
        $stringIds = implode(',', $arrayIds);

        $sql = "
                SELECT id, name, code, price FROM product
                WHERE status = 1 AND id IN ($stringIds)
                ";

        $res = $con->query($sql);

        $products = $res->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }


    /**
     * Добавление продукта
     *
     * @param $options - характеристики товара
     * @return int|string
     */
    public static function addProduct ($options) {

        $con = Connection::make();

        $sql = "
                INSERT INTO product(name, category_id, code, price, availability,
                                    brand, description, is_new, status)
                VALUES (:name, :category_id, :code, :price, :availability,
                        :brand, :description, :is_new, :status)
                ";

        $res = $con->prepare($sql);

        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':category_id', $options['category'], PDO::PARAM_INT);
        $res->bindParam(':code', $options['code'], PDO::PARAM_INT);
        $res->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $res->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $res->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $res->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $res->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);

        //Если запрос выполнен успешно
        if ($res->execute()) {
            //Возвращаем id последней записи, позже, в контроллере переходим на страницу этого товара, если все успешно
            return $con->lastInsertId();
        } else {
            return 0;
        }
    }
    /**
     * Изменение товара
     *
     * @param $id
     * @param $options
     * @return bool
     */
    public static function editProduct ($id, $options) {

        $con = Connection::make();

        $sql = "
                UPDATE product
                SET
                    name = :name,
                    category_id = :category,
                    code = :code,
                    price = :price,
                    availability = :availability,
                    brand = :brand,
                    description = :description,
                    is_new = :is_new,
                    status = :status
                WHERE id = :id
                ";

        $res = $con->prepare($sql);

        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':category', $options['category'], PDO::PARAM_INT);
        $res->bindParam(':code', $options['code'], PDO::PARAM_INT);
        $res->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $res->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $res->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $res->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $res->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $res->bindParam(':id', $id, PDO::PARAM_INT);

        return $res->execute();
    }
    /**
     * Удаление товара(админка)
     *
     * @param $id
     * @return bool
     */
    public static function deleteProductById ($id) {
        $con = Connection::make();

        $sql = "
                DELETE FROM product WHERE id = :id
                ";

        $res = $con->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

        /**
     * Общее кол-во товаров в магазине
     *
     * @return mixed
     */
    public static function getTotalProducts () {

        // Соединение с БД
        $db = Connection::make();

        // Текст запроса к БД
        $sql = "SELECT count(id) AS count FROM product WHERE status=1 ";

        // Выполнение коменды
        $res = $db->query($sql);

        // Возвращаем значение count - количество
        $row = $res->fetch();
        return $row['count'];
    }


}
