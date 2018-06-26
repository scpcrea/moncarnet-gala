<?php
    $slidesToShow=array();

    foreach($category->articles as $article){
      array_push($slidesToShow, ['image_url'=>$article->full_media_path.DS.$article->first_image, 'article'=>$article, 'caption'=>true]);
    }
?> 

<?= $this->element('coupdecoeur-carrousel', ['cdc_slides'=>$slidesToShow]);?> 