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

        
              <h1 class="heading-a u-align-center"><?= $title;?></h1>
                
                <ul>
                    <?php foreach($posts as $singleItem): ?>
                    <li>
                        <h2 class="sub-heading-a u-align-center"><?php echo $singleItem['title']?></h3>
                        <p  class="body-a u-align-center"><?php echo $singleItem['formated_date'];?></p>
                        <a href="/post/<?php echo $singleItem['id']; ?>">Read More</a>
                    </li>

                    <?php endforeach; ?>
                </ul> <!-- gallery-items -->
            </div>
          </div>
         </div>
        </div>
       </div>
      </div>

<?php

include_once VIEWS.'/includes/footer.php';