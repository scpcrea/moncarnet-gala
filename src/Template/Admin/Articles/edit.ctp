<?php
/**
* @var \App\View\AppView $this
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $article->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]
            )
            ?></li>
            <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
        </ul>
    </nav>

    <div class="articles form large-9 medium-8 columns content">
        <?= $this->Form->create($article) ?>
        <fieldset>
            <legend><?= __('Edit Article') ?></legend>
            <?php
            echo $this->Form->control('categories._ids', ['options' => $categories]);
            echo $this->Form->radio('online', [
                ['value' => -1, 'text' => 'Brouillon'],
                ['value' => 0, 'text' => 'Offline'],
                ['value' => 1, 'text' => 'Online']
            ], ['default'=> -1]);
            echo $this->Form->control('title');
            echo $this->Form->control('subtitle');
            echo $this->Form->control('published');
            echo $this->Form->control('publication_term');
            echo $this->Form->control('adress');
            echo $this->Form->control('zip_code');
            echo $this->Form->control('city');
            echo $this->Form->control('phone_number');
            echo $this->Form->control('phone_number_2');
            echo $this->Form->control('mail_adress');
            echo $this->Form->control('website_url');
            echo $this->Form->control('facebook_url');
            echo $this->Form->control('instagram_url');
            echo $this->Form->control('tweeter_url');
            echo $this->Form->control('blog_url');
            echo $this->Form->control('pinterest_url');
            echo $this->Form->control('youtube_url');
            echo $this->Form->control('etsy_url');
            echo $this->Form->control('tripadvisor_url');
            echo $this->Form->control('additionnal_informations');
            echo $this->Form->control('focus');
            echo $this->element('custom_style_form');
            echo $this->Media->iframe('Articles', $article->id); //Vidéo Poster sélection

            echo "MEDIA PATH : ". $article->media_path;

            echo "</br>FULL PATH : ". $article->full_media_path;
            echo $this->Ck->input('body');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
