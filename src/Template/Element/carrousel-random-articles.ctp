<?php
use Cake\ORM\TableRegistry;
$articles = TableRegistry::get('Articles');
$randomArticles = $articles->find('all', [
  'contain' => [
    'Media'  => [
      'strategy' => 'select',
      'queryBuilder' => function ($q) {
        return $q->order(['position' => 'ASC']);
      }
    ]
  ]
]
)
->order('rand()')
->limit(5)
->where(['Articles.focus' => true]);
?>

<div class="container-fluid carrousel">
  <div class="coupdecoeur-slick">
    <?php foreach($randomArticles as $article): ?>

      <div class="coupdecoeur-slide">

        <?= $this->Html->image($article->media[0]->file, ['alt' => $article->title]); ?>

        <div class="col-md-12 slide-caption">
          <div class="row">
            <div class ="col-md-6">
              <?php
              $colorclass="";
              if($article->carrousel_grey) $colorclass="color-grey";
              ?>
              <?= $this->Html->link($this->Html->image('social_icon_moncarnet.svg', ['alt' => 'Coup de Coeur', 'class'=>'zoom']) . "<span class=".$colorclass.">".$article->title. "</span>", ['controller'=>'Articles', 'action'=>'view', $article->slug], ['escapeTitle' => false]);
              ?>
            </div>
            <div class="col-md-6 hidden-xs pull-right">
              <?= $this->MonCarnet->socialIcons($article); ?>
            </div>
          </div>
        </div>
      </div>

    <?php endforeach; ?>
  </div>
</div>

<?php $this->start('css2'); ?>
<?= $this->Html->css('slick/slick.css') ?>
<?= $this->Html->css('slick/slick-theme.css') ?>
<?php $this->end(); ?>

<?php $this->start('end-script2'); ?>
<?= $this->Html->script('slick/slick.min.js') ?>
<script>
$('.coupdecoeur-slick').slick({
  arrows:false,
  dots:false,
  centerMode: true,
  centerPadding: '0',
  slidesToShow: 1,
  autoplay:true,
  adaptiveHeight:true,
  infinite:true,
  variableWidth:true,
  zIndex:-1,
  responsive:
  [
    {
      breakpoint: 768,
      settings: {
        variableWidth:false,
      }
    },
    {
      breakpoint: 480,
      settings: {
        variableWidth:false,
      }
    }
  ]
});
</script>
<?php $this->end();?>
