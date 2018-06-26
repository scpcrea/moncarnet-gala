<?php
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
?>

<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mix coupdecoeur-item">
  <div class="coupdecoeur-item-content">

    <ul class="coupdecoeur-item-image">

      <li>
        <div class="adress-image">
          <?= $this->Html->link(
                $this->Html->image($article->media[0]->file, ['alt' => $article->title, 'class'=>'zoom']),
                ['controller'=>'Articles', 'action'=>'view', $article->slug],
                ['escapeTitle' => false]);
          ?>
        </div>
      </li>

    </ul>

    <div class="row coupdecoeur-item-description">
      <h1><?= $article->title; ?></h1>
      <h2><?= $article->subtitle; ?></h2>
    </div>

    <div class="row coupdecoeur-item-actions">
      <div class="col-md-5 col-xs-5 col-sm-5 coupdecoeur-item-actions-left">
        <?= $this->Html->link(
          $this->Html->image('social_icon_moncarnet.svg', ['alt' => 'Coup de Coeur', 'class'=>'zoom']) . " Decouvrir",
          ['controller'=>'Articles', 'action'=>'view', $article->slug],
          ['escapeTitle' => false]);
        ?>
      </div>
      <div class="col-md-7 col-xs-7 col-sm-5 coupdecoeur-item-actions-right">
        <div class="col-md-12 item-social-icons">
          <?= $this->MonCarnet->socialIcons($article, "zoom", "item-icon"); ?>
        </div>
      </div>
    </div>

  </div>

</div>
