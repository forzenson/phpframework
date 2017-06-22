<?php

class CommentController extends Controller{

   public function __construct(){
                 parent::__construct();
   }

    public static function index (){

            $arr = array();
            
            $post_id = $_POST['post_id'];
            
            array_push($arr, $post_id);
            $user_id = $_POST['user_id'];
            
            array_push($arr, $user_id);
            $body = trim(strip_tags($_POST['body']));
            
            array_push($arr, $body);
            $res = Comment::save($post_id, $user_id, $body);

            $validates = Comment::validate($arr);

            if($validates) {

                 $arr['formated_date'] = date('r',time());
                 $arr = array_map('stripslashes',$arr);

             	$insertedComment = new Comment($arr);
             	echo json_encode(array('status'=>1,'html'=>$insertedComment->markup()));
             } else  {
                 echo '{"status":0,"errors":'.json_encode($arr).'}';
             }
            
    }
}
