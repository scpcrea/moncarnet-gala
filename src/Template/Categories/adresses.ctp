</div><!-- /.navbar-collapse -->
<?= $this->element('search-bar', ['is_advanced' => false]); ?>
</div><!-- /.container-fluid -->

<?php $this->start('title');?>
<?= $category->name; ?>
<?php $this->end(); ?>

<?php $this->start('breadcrumb');?>
<strong style='font-weight: 500;'><?= $category->name; ?></strong>
<?php $this->end(); ?>

<?php $this->start('social-icons');?>
<?php $this->end(); ?>

<?php $this->start('carrousel'); ?>
<?= $this->MonCarnet->carrouselFromArticles($category->articles, "carrousel-adresses"); ?>
<?php $this->end(); ?>

<div class="container-fluid page-container">
  <div class="row row-eq-height coupdecoeur">

    <div class="col-md-9 col-sm-8 col-xs-12 mix content-coupdecoeur">
      <h1 class="article-title"><?= $category->name ?></h1>
      <h2 class="article-subtitle"></h2>
      <?= $this->Text->autoParagraph($category->description); ?>
    </div>

  </div>
</div>

<?php if(!empty($category->articles)): ?>
  <?= $this->MonCarnet->articlesList($category->articles); ?>
<?php else:?>
  Prochainement...
<?php endif?>
