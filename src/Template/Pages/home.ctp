<?php
use Cake\ORM\TableRegistry;

$cat = TableRegistry::get('Categories');

$categories = $cat
->find('all',[
    'order'     =>  ['menu_order' => 'ASC']
])
->toArray();
?>

<?php $this->start('title');?>
Gala
<?php $this->end(); ?>

<?php $this->start('breadcrumb');?>
Bienvenue
<?php $this->end(); ?>

<div class="container-fluid home-categories">
    <h1 class="home-title">Mon carnet d'adresses</h1>
    <h3>Découvrez <span>tous nos focus</span></h3>
    <p class="sous-titre">
        Découvrez LE carnet d'adresses. Sur-mesure, surprenant, efficace, nous l'avons concocté pour vous, pour toutes les femmes Gala ! Que vous soyez parisienne, lyonnaise, marseillaise, lilloise, nantaise, bordelaise, d'une grande ville, d'un petit village, d'ici ou d'ailleurs, vous trouverez ici une sélection de vos adresses incontournables !
    </p>
</div>

<?= $this->element('search-bar', ['is_advanced' => false]); ?>

<div class="container-fluid home-categories">
    <?php foreach ($categories as $category): ?>
        <?php if($category->name != 'archives' && $category->illustration!=""): ?>

            <div class="col-md-4 rubrique-home">
                <div class="col-md-12 adress-image">
                    <a href=<?= $this->Url->build(['controller'=>'categories', 'action'=>'adresses', $category->slug]) ?> >
                        <?= $this->Html->image($category->illustration, ['alt' => $category->name, 'class'=>'img-responsive']);?>
                    </a>
                </div>
                <div class="col-md-12 category-content">
                    <a href=<?= $this->Url->build(['controller'=>'categories', 'action'=>'adresses', $category->slug]) ?> >
                        <h2><?=h($category->name);?></h2>
                    </a>
                </div>
            </div>

        <?php endif ?>
    <?php endforeach;?>
</div>

<div class="container-fluid home-bandeau-2">
    <h3>Quelques <span>coups de coeur</span></h3>
</div>
<?= $this->element('carrousel-random-articles') ?>
<?php $this->append('css') ?>
<style>
.focus-home {
    max-width: 750px;
    /* margin-top: 45px; */
    display: block;
    margin: 75px auto;
    /* border: 0.1em solid #d8d8d8; */
    /* border-radius: 10px; */
    background-color: #fff;
}
</style>
<?php $this->end(); ?>
