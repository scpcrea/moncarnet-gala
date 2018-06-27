<?php $this->start('title');?>
<?= h($article->title) ?> -
<?php foreach($article->categories as $category): ?>
  <?= $category->name; ?> -
<?php endforeach; ?>
<?php $this->end(); ?>

<?php $this->start('carrousel'); ?>
<?= $this->MonCarnet->carrouselFromArticle($article, "carrousel-article");?>
<?php $this->end(); ?>

<main class="article">

  <div class="row">
    <div class="col-md-12">
      <div class="headline">
        <h1 class="article-title"><?= $article->title ?></h1>
        <h2 class="article-subtitle"><?= $article->subtitle ?></h2>
        <p class="auteur">
          <span>GroupeSCP</span>
          <span>Date</span>
        </p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12">
          <p class="intro">
            <?php
            $html = $article->body;
            $start = strpos($html, '<p>');
            $end = strpos($html, '</p>', $start);
            $intro = substr($html, $start, $end-$start+4);
            echo strip_tags($intro, '<br><br/><a><b><strong>');
            ?>
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-9">
          <?= $this->Text->autoParagraph($article->body); ?>
        </div>
        <div class="col-md-3">
          <?= $this->element('div-share-buttons', [
            'page_url' => $this->Url->build(['controller'=>'Articles', 'action'=>'view', $article->slug]),
            'image_url'=>$this->Url->build($article->poster->file, true),
            'share_text'=>META_TITLE.' - '.$article->title.', '.$article->subtitle
          ]); ?>
          <section class="side-images">
            <?php foreach($article->media as $media): ?>
              <?= $this->Html->image($media->file); ?>
            <?php endforeach; ?>
          </section>
        </div>
      </div>

    </div>

    <div class="col-md-4">
      <?= $this->element('section-contact', ['article', $article]); ?>
    </div>
  </div>

</main>

<?php if( (!is_null($article->custom_stylesheet) && $article->custom_stylesheet !='') || (!is_null($article->custom_style) && $article->custom_style !='')
): ?>
<?php $this->append("css"); ?>
<?= $this->Html->css($article->custom_stylesheet) ?>
<style>
<?= $article->custom_style ?>
</style>
<?php $this->end(); ?>
<?php endif; ?>

<?php $this->append('meta'); ?>
<?= $this->element('metas', [
  'title' => h($article->title." - ".META_TITLE),
  'description' => h($article->title.', '.$article->subtitle),
  'url'       => $this->Url->build($this->request->getRequestTarget(), true),
  'created'   => $article->created,
  'updated'   => $article->modified,
  'tags'      => META_TAG_LIST,
  'section'   => h(META_SECTION),
  'image'     => $this->Url->build($article->poster->file, true),
  'tag_list'  => META_TAG_LIST,
]
) ?>
<?php $this->end(); ?>
