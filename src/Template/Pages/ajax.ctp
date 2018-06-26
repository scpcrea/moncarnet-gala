<?php
use Cake\ORM\TableRegistry;

$cat = TableRegistry::get('Categories');

$categories = $cat
->find('threaded',
['contain' => ['ChildCategories']])
->toArray();
?>

<?php $this->start('title');?>
Les essentiels
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
<?= $this->element('recherche2'); ?>
<br/><br/>
