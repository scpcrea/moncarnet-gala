<div class="container-fluid light-grey-background">
  <div class="row articles-list">
  	<?php if(!empty($title)):?>
  	<h1 class="articles-list-title"><?= $title ?></h1>
  	<?php endif;?>
  	<?php if(!empty($subtitle)):?>
  	  	<h2 class="articles-list-subtitle"><?= $subtitle ?></h2>
  	<?php endif;?>

      <?php foreach($articles as $article): ?>
        <?= $this->element('coupdecoeur-item', ['article'=>$article]); ?>
      <?php endforeach;?>
  </div>

</div>