<?php
include_once VIEWS.'/includes/head.php';
include_once VIEWS.'/includes/header.php';
?>
<div class="page-content">
    <div class="wrapper">
    <h1><?= $title;?></h1>

        <ul class="grid cards"><!-- gallery-items -->

            <?php foreach($data['products'] as $singleItem): ?>
                <li><figure class="product" id="<?php echo $singleItem['id']?>">
                        <img alt="" src="<?php echo Product::getImage($singleItem['id']); ?>" />
                        
                         <figcaption>
                             <h2><?php echo $singleItem['name']?></h2>
                             <a href="#"><i class="add"><span class="fa fa-shopping-cart"></span></i></a>
                             <p><?php echo $singleItem['description'];?></p>
                             <p class="price">
                               <?php echo $singleItem['price'] ?>&nbspгрн
                             </p>

                       </figcaption>
                       
                </figure></li>
            <?php endforeach; ?>
        </ul> <!-- gallery-items -->
     
     <div class="middle">
        <?php echo $data['pagination']->get();?>
     </div>
</div>
</div>

<?php
include_once VIEWS.'/includes/cart.php';
include_once VIEWS.'/includes/footer.php';