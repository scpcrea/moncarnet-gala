<?php $this->start('script');?>
    <?= $this->Html->script("//code.jquery.com/jquery-1.11.0.min.js")?>
    <?= $this->Html->script("//code.jquery.com/jquery-migrate-1.2.1.min.js")?>
    <?= $this->Html->script('jquery.cookiebar.min.js')?>
    <?= $this->Html->script('jquery.mixitup.min.js')?>
    <?= $this->Html->script('app.js')?>
<?php $this->end(); ?>

<div class="container-fluid home-image" style='background-image:$this->Html->image("intro.jpg");width: 100%;height: 100%;object-fit:cover;>                   
        <?= $this->Html->image('intro.jpg') ?>
        <div class="main-text hidden-xs">
            <div class="col-md-12 text-center">
                <h1 class="home-title">Mon carnet d'adresse</h1>
                <h3 class="home-subtitle">La sélection coup de coeur</h3>
            </div>
        </div>
</div>

<div class="container-fluid home-bandeau">
    <h1 style="
    text-align: center;
    color: white;
    font-family: Montserrat;
    font-weight: 100;
    /* margin: 35px; */
    font-size: 2em;"><?= $this->Html->image('heart-blanc.png'); ?> Sur-mesure,icace... pour toutes les femmes Gala !
    </h1>
</div>


<div class="container-fluid home-categories" style="padding-right: 350px;
    padding-left: 350px;
    /* margin-right: auto; */
    /* margin-left: auto; */
    box-sizing: border-box;
    padding-bottom: 50px;
    padding-top: 50px;
    background-color: white;">
    
    <h3>Découvrez tous nos <span>focus</span></h3>

<?php foreach ($categories as $category): ?>
    <?php switch(empty($category->parent_id)):
        case true: ?>
            <?php if(!empty($category->child_categories)):?>
            <div class="col-md-4 col-sm-6 col-xs-12 mix box home-box" style="padding: 0;">
                <div class="box home-box">
                    <div class="mask">
                        <h2>Nibler</h2>
                        <p>$14.00</p>
                        <a href="#" class="more">More info</a>
                    </div>

                    <div class="adress-image">
                        <?= $this->Html->image($category->illustration, ['alt' => 'ALT1', 'class'=>'zoom']);?>
                    </div>
                    <h2 style=""><?=h($category->name);?></h2>
                <?php endif;?>
                <?php break;?>
                <?php case false: ?>
                            
                <?php if($category->rght+1 >= $category->parent_category->rght):?>
                </div>
            </div>
            <?php endif;?>
        <?php break;?>
    <?php endswitch;?>
<?php endforeach; ?>
</div>
    
    