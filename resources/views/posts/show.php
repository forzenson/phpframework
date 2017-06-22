<?php
include_once VIEWS.'/includes/head.php';
include_once VIEWS.'/includes/header.php';
?>
        <div class="page-content">
        <div class="wrapper">
            <div class="breadcrumb"><?= $breadcrumb;?></div>

            
              
              <div class="content-wrap__main-content">
              <div class="wrapper--white wrapper--footer-bottom">


              <div class="one-col">
              <div class="rich-text">

        
              <h1 class="heading-a u-align-center"><?= $post['title'];?></h1>

            <p>
            <div>
                <?= $post['content'];?>
            </div>
                            Create At: <?= $post['formated_date'];?>
            </p>


            </div>
             <div class="comment">
                    <?php
                    /*
                    / Output the comments one by one:
                    */
                    echo "<h2>All Comments</h2><p>";


                    foreach($data['comments'] as $c){
                        echo $c->markup();
                    }

                    ?>
                    </p>
                    <?php if(!User::isGuest()):?>
                    <div id="addCommentContainer">
                        <p>
                            Hello <?php echo User::getName();?>!
                        </p>
                      <p>Add a Comment</p>
                      <form id="addCommentForm" method="post" action="">
                          <div>

                              <input type="hidden" name="post_id" id="post_id" value="<?php echo $data['post']['id'];?>"/>

                                <input type="hidden" name="user_id" id="user_id" value="<?php echo Session::get('userId');?>" />

                                <label for="body">Comment Body</label>
                                <textarea name="body" id="body" cols="20" rows="5"></textarea>

                                <input type="submit" id="submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                    <?php endif;?>

                </div>
        </div>
        </div>
        </div>
        </div>
        </div>
       

<?php

include_once VIEWS.'/includes/footer.php';
            