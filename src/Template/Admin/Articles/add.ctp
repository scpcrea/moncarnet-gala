<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
       	<li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
    </ul>
</nav>


<div class="articles form large-9 medium-8 columns content">
<h1>Add Article</h1>
<?php

echo $this->Form->create($article);

// Ajout des input (via la méthode "control") liés aux catégories
echo $this->Form->control('categories._ids', ['options' => $categories]);
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
echo $this->Form->control('pinterest_url');
echo $this->Form->control('youtube_url');
echo $this->Form->control('blog_url');
echo $this->Form->control('etsy_url');
echo $this->Form->control('tripadvisor_url');
echo $this->Form->control('additionnal_informations');
echo $this->Form->control('focus');
echo $this->Form->control('carrousel_grey');

//echo $this->Form->control('body', ['rows' => '3']);
echo $this->Ck->input('body');
echo $this->Form->button(__('Save Article'));
echo $this->Form->end();

?>
</div>
