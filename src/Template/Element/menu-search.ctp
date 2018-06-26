<div class="menu-search" id="menu-search">
  <?= $this->element('search-bar', ['is_advanced' => false]); ?>

  <div class="close-cross" id='close-cross'>
    <?= $this->Html->image('icon_cross.svg');?>
  </div>

</div>

<?= $this->append('end-script') ?>
<script>
$( "#menu-search" ).click(function(event) {
  if( ! $( event.target).is('input') && ! $( event.target).is('select') ) {
           $("#menu-search").slideUp(300);
      }
});
</script>
<?= $this->end(); ?>
