<?php $this->start('title');?>
Recherche
<?php $this->end(); ?>

<div class="container-fluid top-container">
  <?= $this->element('search-bar', ['is_advanced' => true]); ?>
</div>
