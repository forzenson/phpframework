<?php

class Comment
{
    private $data = array();

    public function __construct($row)
    {
        /*
        /   The constructor
        */

         $this->data = $row;
         
    }

    public static function getCommentById($postId) {

        
        $db =  Connection::make();

        $sql = "
        SELECT id, post_id, user_id, body, DATE_FORMAT(`date`, '%d.%m.%Y %H:%i:%s') AS formated_date, status
          FROM comments
                    WHERE post_id = :id
               ";

        $res = $db->prepare($sql);
        $res->bindParam(':id', $postId, PDO::PARAM_INT);
        $res->execute();

        $comments = $res->fetchAll(PDO::FETCH_ASSOC);

        return $comments;
    }


    public static function save ($post_id, $user_id, $body) {

        $db =  Connection::make();

        $sql = "
                INSERT INTO comments(post_id, user_id, body)
                VALUES (:postId, :userId, :body)
                ";

        $res = $db->prepare($sql);
        $res->bindParam(':postId', $post_id, PDO::PARAM_INT);
        $res->bindParam(':userId', $user_id, PDO::PARAM_INT);
        $res->bindParam(':body', $body, PDO::PARAM_STR);

        return $res->execute();
    }

    public function markup()
    {
        $d = &$this->data;
        $d['date'] = strtotime($d['formated_date']);

        return '
            <div class="comment">
            <div class="date" title="Added at '.date('H:i \o\n d M Y',$d['date']).'">'.date('d M Y',$d['date']).'</div><br />
                <p>'.$d['body'].'</p>
            </div>
        ';
    }

    public static function validate(&$arr)
    {
        $errors = array();
        $data   = array();

        if(!($data['body'] = filter_input(INPUT_POST,'body',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
        {
            $errors['body'] = 'Please enter a comment body.';
        }

        if(!empty($errors)){
            $arr = $errors;
            return false;
        }

        foreach($data as $k=>$v){
            $arr[$k] = $v;
        }
        return true;

    }

    private static function validate_text($str)
    {
        if(mb_strlen($str,'utf8')<1)
            return false;

        $str = nl2br(htmlspecialchars($str));
        $str = str_replace(array(chr(10),chr(13)),'',$str);

        return $str;
    }

}
