<?php $this->start('title');?>
<?= h($article->title) ?> -
<?php foreach($article->categories as $category): ?>
    <?= $category->name; ?> -
<?php endforeach; ?>
<?php $this->end(); ?>

<?php $this->start('submenu'); ?>
<div class="container-fluid submenu">
    <div class="col-md-12 hidden-xs" style="border-top: 2px dotted #ea9191;">
        <div class="col-md-8 col-sm-6 col-xs-hidden text-left menu-details">
            <h1 class="breadcrumb-links">
                <strong style='font-weight: 500;'><?= $article->title; ?></strong>
            </h1>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-4 pull-right menu-details-social-icons">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 menu-details-social-icons">
                    <?= $this->MonCarnet->socialIcons($article); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->end(); ?>

<?php $this->start('carrousel'); ?>
<?= $this->MonCarnet->carrouselFromArticle($article, "carrousel-article");?>
<?php $this->end(); ?>

<div class="container-fluid page-container">
    <div class="row row-eq-height coupdecoeur">

        <div class="col-md-3 hidden-sm hidden-xs coupdecoeur-nav">
            <?= $this->element('articles-side-nav', ['article'=>$article, 'categories'=>$article->categories]); ?>
        </div>

        <div class="col-md-9 col-sm-8 col-xs-12 mix content-coupdecoeur">
            <div class="col-sm-4 coupdecoeur-details">
                <?= $this->element('contact-item', ['article', $article]); ?>
            </div>

            <div class="document-body">
                <h1 class="article-title"><?= $article->title ?></h1>
                <h2 class="article-subtitle"><?= $article->subtitle ?></h2>

                <?= $this->Text->autoParagraph($article->body); ?>

                <?= $this->element('div-share-buttons', [
                    'page_url' => $this->Url->build(['controller'=>'Articles', 'action'=>'view', $article->slug]),
                    'image_url'=>$this->Url->build($article->poster->file, true),
                    'share_text'=>META_TITLE.' - '.$article->title.', '.$article->subtitle
                ]); ?>
            </div>

        </div>
    </div>
</div>

</div>
<?php $this->start("coordonnees"); ?>
<div class="container" style="padding:0;background-color:#d62828; width:100%;padding-top: 50px;padding-bottom: 75px">
    <span class="infos-title"><?= h($article->title) ?></span>
    <span class="infos-text"><?= h($article->adress) ?></span>
    <span class="infos-text"><?= h($article->zip_code)." ".h($article->city) ?></span>
    <span class="infos-text"><?= h($article->phone_number) ?></span>
    <span class="infos-text"><?= h($article->mail_adress) ?></span>
    <span class="infos-text"><?= $this->Html->link($article->website_url,$article->website_url,['target'=>'_blank'])?></span>
    <span class="infos-text"><?= $this->Html->link($article->facebook_url,$article->facebook_url,['target'=>'_blank'])?></span>
    <span class="infos-text"><?= $this->Html->link($article->instagram_url,$article->instagram_url,['target'=>'_blank'])?></span>
    <span class="infos-text"><?= $this->Html->link($article->blog_url,$article->blog_url,['target'=>'_blank'])?></span>
</div>
<?php $this->end(); ?>

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
