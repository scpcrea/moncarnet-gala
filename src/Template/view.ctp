<?php
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Article $article
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articles view large-9 medium-8 columns content">
    <h3><?= h($article->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <ul>
        <?php
            $path="upload/articles/".$article->diapos_path;
            $dir = new Folder("img/".$path);
            $files = $dir->find('.*\.jpg', true);
        ?>
        <?php foreach($files as $diapo): ?>
            <li>
                <?= $this->Html->image($path.'/'.$diapo, ['alt' => 'ALT1']);?>
            </li>
        <?php endforeach; ?>
        </ul>
        <?= $this->Text->autoParagraph($article->body); ?>
    </div>
</div>