<?php
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
?>

<?php if(!$articles->count()) : ?>
  <p class="col-md-12 text-center">Aucun résultat</p>
<?php else: ?>

  <?php
  if($articles->count() == 1)
  $containerClass = "col-lg-4 col-md-6 col-sm-6 col-xs-12 center-block mix coupdecoeur-item hidden-div single-row";
  else
  $containerClass = "col-lg-4 col-md-6 col-sm-6 col-xs-12 mix coupdecoeur-item hidden-div";
  ?>

  <?php foreach ($articles as $article): ?>
    <div class="<?= $containerClass; ?>">
      <div class="coupdecoeur-item-content">

        <ul class="coupdecoeur-item-image">

          <li>
            <div class="adress-image">
              <?= $this->Html->link(
                $this->Html->image($article->media[0]->file, ['alt' => 'ALT1', 'class'=>'zoom']),
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

      <?php endforeach; ?>
    <?php endif; ?>

    <?php if(!$isadvanced) : ?>
      <p class="col-md-12 text-center">
        <?= $this->Html->link("+ de résultats...", [
          "controller"  => "articles",
          "action"      => "recherche",
          '?'           => ['keywords' => $keywords, 'field' => $field]
        ]); ?>
      </p>
  <?php endif; ?>
