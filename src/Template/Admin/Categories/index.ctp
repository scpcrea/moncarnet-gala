<?php
?>

<div class="actions large-2 medium-3 columns">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Nouvelle Categorie'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="categories index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr><th width="50px">#</th>
            <th width="50px">Id</th>
            <th width="50px">Parent Id</th>
            <th width="50px">Lft</th>
            <th width="50px">Rght</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Created</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category->menu_order ?></td>
            <td><?= $category->id ?></td>
            <td><?= $category->parent_id ?></td>
            <td><?= $category->lft ?></td>
            <td><?= $category->rght ?></td>
            <td><?= h($category->name) ?></td>
            <td><?= h($category->slug) ?></td>
            <td><?= h($category->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Voir'), ['action' => 'view', $category->id]) ?>
                <?= $this->Html->link(__('Editer'), ['action' => 'edit', $category->id]) ?>
                <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $category->id], ['confirm' => __('Etes vous sur de vouloir supprimer # {0}?', $category->id)]) ?>
                <?= $this->Form->postLink(__('Descendre'), ['action' => 'moveDown', $category->id], ['confirm' => __('Etes vous sur de vouloir descendre # {0}?', $category->id)]) ?>
                <?= $this->Form->postLink(__('Monter'), ['action' => 'moveUp', $category->id], ['confirm' => __('Etes vous sur de vouloir monter # {0}?', $category->id)]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>
