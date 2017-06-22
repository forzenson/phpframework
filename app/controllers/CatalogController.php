<?php

/**
 * Class CatalogController
 * Контроллер для работы с каталогом товаров
 */
class CatalogController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    /**
     * Отображает список всех товаров, отсортирован по дате добавления
     *
     * @param int $page текущая страница
     * @return bool
     */
    
    public function index ($vars) {

        $page = 1;
        
        extract($vars);
        
        $page = $page? $page:1;
        
        //Вывод категорий
        $categories = Category::index();

        $latestProducts = Product::getLatestProducts($page);

        //Общее кол-во товаров (для пагинации)
        $total = Product::getTotalProducts();

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');


        $data['title'] = 'Welcome To Catalog ';
        //Последние продукты
        $data['products'] = $latestProducts;
        $data['categories'] = $categories;
        $data['pagination'] = $pagination;
    
        $this->_view->render('catalog/index',$data);
    
    }

}
