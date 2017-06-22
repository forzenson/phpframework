<?php

class PostsController extends Controller
{
	public function index()
	{		

		$posts = Post::index();
		$data['posts'] = $posts;
        $data['title'] = 'Post Page ';
        
        $breadcrumb = new Breadcrumb();

        $data['breadcrumb'] = $breadcrumb->build(array(
           'Blog Post List' => 'posts',
        ));

        $this->_view->render('posts/index',$data);
	
	}


	public function view($vars)
	{
		extract($vars);
		$post = Post::view($id);
		$data['post'] = $post;
        $data['title'] = 'Post Page ';

        $res = Comment::getCommentById($post['id']);

        $comments = array();

        foreach ($res as $row) {
            $comments[] = new Comment($row);
        }

        
        $data['comments'] = $comments;


        $breadcrumb = new Breadcrumb();

        $data['breadcrumb'] = $breadcrumb->build(array(
           'Blog Post List' => 'posts',
            $post['title'] => '#',
        ));
       
        $this->_view->render('posts/show',$data);
	}

    public function search($vars)
    {
        //Флаг ошибок
        $data['errors'] = false;
        $result = false;
        
        if (isset($_POST) and !empty($_POST)) {
            
            $query = trim(strip_tags($_POST['query']));

            if (strlen($query) < 3) {
                $data['errors'][] = 'Слишком короткий поисковый запрос.';
            } else if (strlen($query) > 128) {
                $data['errors'][] = 'Слишком длинный поисковый запрос.';
            } else { 
                    $posts = Post::searchPost($query);
                    $num_rows = count($posts);
            
                if ($num_rows > 0) { 
                    $data['num_rows'] = 'По запросу <b>'.$query.'</b> найдено совпадений: '.$num_rows;
                    
                } else {
                    $data['errors'][] = 'По вашему запросу ничего не найдено.';
                    }
                } 
            } else {
                $data['errors'][] = 'Задан пустой поисковый запрос.';
            }

            if ($data['errors'] == false) {
                        $result = true;
                        $data['posts'] = $posts;
                    }
            $data['success'] = $result;
            
            $data['title'] = 'Search Post Page ';
            
            $breadcrumb = new Breadcrumb();

            $data['breadcrumb'] = $breadcrumb->build(array(
               'Blog Post List' => 'posts',
               'Blog Post Search Result' => '#',
            ));
           
            $this->_view->render('posts/search',$data);
        
    }
}