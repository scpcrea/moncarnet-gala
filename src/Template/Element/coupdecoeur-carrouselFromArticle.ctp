<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Category $category
  */
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
?>

  <?php
    $slidesToShow=array();

      foreach($article->all_images as $image){
        array_push($slidesToShow, ['image_url'=>$article->full_media_path . DS . $image,'caption'=>false]);
      }

  ?> 

  <?= $this->element('coupdecoeur-carrousel', ['cdc_slides'=>$slidesToShow]);?> 