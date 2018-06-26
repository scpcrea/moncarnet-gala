<?php
use Cake\ORM\TableRegistry;

$categories = TableRegistry::get('Categories');

$query = $categories
->find('all',[
    'order'     =>  ['menu_order' => 'ASC']
])
->toArray();
?>

<div class="example3">
    <nav class="navbar navbar-inverse navbar-fixed-top header-fixed">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <?= $this->Html->image('moncarnetdadresse-logo.svg'); ?>
                </a>
            </div>

            <div id="navbar3" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php foreach ($query as $category): ?>
                        <?php if($category->name != 'archives'): ?>
                            <li><?= $this->Html->link($category->name, ['controller' => 'Categories', 'action' => 'adresses', $category->slug]) ?></li>
                        <?php endif ?>
                    <?php endforeach; ?>

                </ul>
                <?= $this->element('search-bar', ['is_advanced' => false]); ?>
            </div>

            <!--/.nav-collapse -->
        </div>
        <?= $this->fetch('submenu'); ?>
        <!--/.container-fluid -->
    </nav>
</div>

<?php $this->append('end-script') ?>
<script>
$( "#menu-search-icon" ).click(function(event) {
    if( ! $( event.target).is('input') && ! $( event.target).is('select') ) {
        $("#menu-search").slideDown(300);
    }
});
</script>
<?php $this->end(); ?>
