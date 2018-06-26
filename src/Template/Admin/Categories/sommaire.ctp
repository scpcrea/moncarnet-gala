<?php $this->start('script');?>
    <?= $this->Html->script("//code.jquery.com/jquery-1.11.0.min.js")?>
    <?= $this->Html->script("//code.jquery.com/jquery-migrate-1.2.1.min.js")?>
    <?= $this->Html->script('jquery.cookiebar.min.js')?>
    <?= $this->Html->script('jquery.mixitup.min.js')?>
    <?= $this->Html->script('app.js')?>
<?php $this->end(); ?>

<?php $this->start('coupdecoeur');?>
    <div class="container">
        <div style="padding-top: 100px;">
            <div style="width:18px;height:18px; margin:auto;"><?= $this->Html->image('coeur1.png') ?></div>
            <h2 style="text-align:center;font-size:70px;"><?= h($parent->name) ?></h3>
            <h3 style="text-align:center;"><?= h($parent->subtitle) ?></h3>
            <br/>
            <br/>
        </div>
    </div>
<?php $this->end(); ?>

<?php $this->start('videax');?>
        <div class="background-wrapper" style="width: 100%;height: 100%;object-fit:cover;"> 
          <div class="background" data-parallax="" data-stellar-ratio="0.4" style="height:500px;overflow:hidden;transform: translate3d(0px, 0px, 0px);">                    
              <?= $this->Html->image("upload/categories/mariage_full.jpg", ['alt' => 'Mariage', 'style' => 'width:100%']) ?>
          </div>
      </div>
<?php $this->end(); ?>

<h5><?= $parent->name ?></h5>

  <?php foreach ($categories as $category): ?>
        <div class="col-md-3 col-sm-6 col-xs-12 mix" style="height:100px;box-sizing: border-box;margin-bottom: 25px;">
          <div style="width:100%;height:100%;vertical-align: center;background-color:#ccc;text-align:center;border:1px solid;"">
            <?= $this->Html->link(__($category->name), ['action' => 'adresses', $category->id]) ?>
          </div>
        </div>
  <?php endforeach; ?>
