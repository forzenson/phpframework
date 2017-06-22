<?php

class IndexController extends Controller
{
	public function index()
	{	
        $this->_view->render('home/index', ['title'=>'SHOPAHOLIC HOME PAGE']);
	}
	
}