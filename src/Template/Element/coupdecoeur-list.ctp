<div class="container-fluid light-grey-background">
  <div class="row coupdecoeur-adresses">
    <?php foreach($articles as $article): ?>
      <?= $this->element('coupdecoeur-item', ['article'=>$article, 'category'=>$category]); ?>
    <?php endforeach;?>
  </div>
</div>
