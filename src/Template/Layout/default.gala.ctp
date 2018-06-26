<?php
/**
* CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
* @link          https://cakephp.org CakePHP(tm) Project
* @since         0.10.0
* @license       https://opensource.org/licenses/mit-license.php MIT License
*/
$cakeDescription = "Mon carnet d'adresses Gala";
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-54695597-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-54695597-1');
  </script>

  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?= $this->fetch('title') ?>
    - <?= $cakeDescription ?>
  </title>

  <?= $this->Html->meta(
    'moncarnet-icon.ico',
    '/img/moncarnet-icon.ico',
    ['type' => 'icon']
  );
  ?>

  <?= $this->Html->css('bootstrap.css') ?>
  <?= $this->Html->css('plugins.min.css') ?>
  <link rel="stylesheet" href="/css/main.min.css"/>
  <link rel="stylesheet" href="/css/main.menu.css"/>
  <?= $this->Html->css('search-bar.css') ?>

  <?= $this->Html->css('https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700,800&subset=cyrillic,greek,latin') ?>
  <?= $this->Html->css('https://fonts.googleapis.com/css?family=Lily+Script+One') ?>
  <?= $this->Html->css('https://fonts.googleapis.com/css?family=Playfair+Display') ?>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700,800' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet'>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqQzcZTEqQNQx0L3824xkRDcwF_5d3xYQ&callback=initMap"
  async defer></script>
  <?= $this->Html->css('scp/social_links') ?>
  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('css2') ?>
  <?= $this->fetch('script') ?>
  <?= $this->fetch('script2') ?>
</head>

<body class="header-fixed">
    <?= $this->element('svg/vectos') ?>
  <?= $this->element('menu'); ?>
  <?php if($this->request->action != 'display' && $this->request->action != 'home2' && $this->request->action != 'recherche'): ?>
    <?= $this->element('menu-search'); ?>
  <?php endif; ?>
  <?= $this->fetch('carrousel')?>
  <?= $this->fetch('bandeau') ?>
  <?= $this->fetch('coupdecoeur') ?>
  <?= $this->Flash->render() ?>

  <?= $this->fetch('content') ?>
  <footer style="background-color: #000;"></footer>

  <?= $this->Html->script("https://code.jquery.com/jquery-3.2.1.min.js")?>
  <?= $this->Html->script("https://code.jquery.com/jquery-migrate-3.0.0.js")?>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?= $this->fetch('end-script') ?>
</body>
</html>
