<?php

$router->get('', 'IndexController@index');
$router->get('posts', 'PostsController@index');
$router->get('post/{id}', 'PostsController@view');
$router->post('search', 'PostsController@search');
$router->get('admin', 'AdminProductController@index');
$router->get('comment', 'CommentController@index');
$router->post('comment', 'CommentController@index');
$router->get('contact', 'ContactController@index');
$router->post('contact', 'ContactController@index');

//оформление заказа
$router->post('cart', 'CartController@index');
$router->post('check', 'UserController@actionCheck');

$router->get('catalog/page-{page}', 'CatalogController@index');
$router->get('catalog', 'CatalogController@index');

$router->get('admin/posts', 'AdminPostController@index');
$router->get('admin/posts/add', 'AdminPostController@add');
$router->get('admin/posts/edit/{id}', 'AdminPostController@edit');
$router->get('admin/posts/delete/{id}', 'AdminPostController@delete');

$router->get('admin/orders', 'AdminOrderController@index');
$router->get('admin/orders/view/{id}', 'AdminOrderController@view');
$router->get('admin/orders/edit/{id}', 'AdminOrderController@edit');
$router->get('admin/orders/delete/{id}', 'AdminOrderController@delete');
$router->post('admin/orders/edit/{id}', 'AdminOrderController@edit');
$router->post('admin/orders/delete/{id}', 'AdminOrderController@delete');

$router->post('admin/posts/add', 'AdminPostController@add');
$router->post('admin/posts/edit/{id}', 'AdminPostController@edit');
$router->post('admin/posts/delete/{id}', 'AdminPostController@delete');

$router->get('admin/roles', 'AdminRoleController@index');
$router->get('admin/roles/add', 'AdminRoleController@add');
$router->get('admin/roles/edit/{id}', 'AdminRoleController@edit');
$router->get('admin/roles/delete/{id}', 'AdminRoleController@delete');

$router->post('admin/roles/add', 'AdminRoleController@add');
$router->post('admin/roles/edit/{id}', 'AdminRoleController@edit');
$router->post('admin/roles/delete/{id}', 'AdminRoleController@delete');

$router->get('admin/users', 'AdminUserController@index');
$router->get('admin/users/add', 'AdminUserController@add');
$router->post('admin/users/add', 'AdminUserController@add');

$router->get('admin/users/edit/{id}', 'AdminUserController@edit');
$router->post('admin/users/edit/{id}', 'AdminUserController@edit');

$router->get('admin/users/delete/{id}', 'AdminUserController@delete');
$router->post('admin/users/delete/{id}', 'AdminUserController@delete');


$router->get('register', 'UserController@signup');
$router->post('register', 'UserController@signup');

$router->get('login', 'UserController@login');
$router->post('login', 'UserController@login');

$router->get('profile', 'ProfileController@index');

$router->get('profile/edit', 'ProfileController@edit');
$router->post('profile/edit', 'ProfileController@edit');

$router->get('profile/orders', 'ProfileController@ordersList');
$router->post('profile/orders', 'ProfileController@ordersList');

$router->get('logout', 'UserController@logout');
$router->post('logout', 'UserController@logout');


$router->get('admin/products', 'AdminProductController@list');

$router->get('admin/products/add', 'AdminProductController@add');
$router->post('admin/products/add', 'AdminProductController@add');

$router->get('admin/products/edit/{id}', 'AdminProductController@edit');
$router->post('admin/products/edit/{id}', 'AdminProductController@edit');

$router->get('admin/products/delete/{id}', 'AdminProductController@delete');
$router->post('admin/products/delete/{id}', 'AdminProductController@delete');


$router->get('admin/categories', 'AdminCategoryController@index');
$router->get('admin/category/add', 'AdminCategoryController@add');
$router->post('admin/category/add', 'AdminCategoryController@add');

$router->get('admin/category/edit/{id}', 'AdminCategoryController@edit');
$router->post('admin/category/edit/{id}', 'AdminCategoryController@edit');

$router->get('admin/category/delete/{id}', 'AdminCategoryController@delete');
$router->post('admin/category/delete/{id}', 'AdminCategoryController@delete');
