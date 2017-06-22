<?php

/**
 *Контроллер для просмотра и управления списком всех товаров, имеющихся в базе
 */
class AdminProductController extends Controller {

    /**
     * Admin dashboard
     * @return bool
     */
    public function index () {
        $data['title'] = 'Admin Dashboard Page ';
        $this->_view->render('admin/index', $data);
    }

    /**
     * Просмотр всех товаров
     * @return bool
     */
    public function list () {
        $data['products'] = Product::index();
        $data['title'] = 'Admin Product List Page ';
        $this->_view->render('admin/products/index', $data);
    }

    /**
     * Удаление конкретного товара
     *
     * @param $id товара
     * @return bool
     */
    public function delete ($vars) {

        extract($vars);

        //Проверяем форму
        if (isset($_POST['submit'])) {
            //Если отправлена, то удаляем нужный товар
            Product::deleteProductById($id);
            //и перенаправляем на страницу товаров
            header('Location: /admin/products');
        }

        $data['product_id'] = $id;
        $data['title'] = 'Admin Product Delete Page ';
        
        $this->_view->render('admin/products/delete',$data);
        
    }

    /**
     * Добавление товара
     *
     * @return bool
     */
    public function add () {

        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['code'] = trim(strip_tags($_POST['code']));
            $options['price'] = trim(strip_tags($_POST['price']));
            $options['category'] = trim(strip_tags($_POST['category']));
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['availability'] = trim(strip_tags($_POST['availability']));
            $options['is_new'] = trim(strip_tags($_POST['is_new']));
            $options['status'] = trim(strip_tags($_POST['status']));

            //Если все ок, записываем новый товар
            $id = Product::addProduct($options);
            $dir = $_SERVER['DOCUMENT_ROOT'] ."/media/images/products/".$id."/";
             if (!is_dir($dir)) {
                 mkdir($dir, 0777, true);
             }

            // Если запись добавлена
            if ($id) {
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если загружалось, переместим его в нужную папку, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/media/images/products/{$id}/{$id}.jpg");
                }
            };
            header('Location: /admin/products');
        }
        $data['title'] = 'Admin Product Add Page ';
        $data['categories'] = Category::index();
        $this->_view->render('admin/products/add',$data);
        
    }

    /**
     * Редатирование товара
     *
     * @param $id
     * @return bool
     */
    public function edit ($vars) {
        //Получаем информацию о выбранном товаре
        extract($vars);
        $product = Product::getProductById($id);
        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['code'] = trim(strip_tags($_POST['code']));
            $options['price'] = trim(strip_tags($_POST['price']));
            $options['category'] = trim(strip_tags($_POST['category']));
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['availability'] = trim(strip_tags($_POST['availability']));
            $options['is_new'] = trim(strip_tags($_POST['is_new']));
            $options['status'] = trim(strip_tags($_POST['status']));

            Product::editProduct($id, $options);
            // Если запись существует
            if ($id) {
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/media/images/products/{$id}/{$id}.jpg");
                }
            };

            header('Location: /admin/products');
        }
        $data['product'] = Product::getProductById($id);
        $data['categories'] = Category::index();
        $data['title'] = 'Admin Product Edit Page ';
        
        $this->_view->render('admin/products/edit',$data);
        
    }
}
