<div class="container-fluid carrousel <?= $class ?>">
	<div class="coupdecoeur-slick">
		<?php foreach($articles as $slide): ?>

			<div class="coupdecoeur-slide">

				<?php if($slide['caption']): ?>
					<?= $this->Html->image($slide['image_url'], ['alt' => $slide['article']->title]);?>

					<div class="col-md-12 slide-caption">
						<div class="row">
						<div class ="col-md-6">
							<?php
								$colorclass="";
								if($slide['article']->carrousel_grey) $colorclass="color-grey";
							?>
							<?= $this->Html->link(
				              $this->Html->image('social_icon_moncarnet.svg', ['alt' => 'Coup de Coeur', 'class'=>'zoom']) . "<span class=".$colorclass.">".$slide['article']->title. "</span>",
				              ['controller'=>'Articles', 'action'=>'view', $slide['article']->slug],
				              ['escapeTitle' => false]);
				            ?>
						</div>
						<div class="col-md-6 hidden-xs pull-right">
							<?= $this->MonCarnet->socialIcons($slide['article']); ?>
						</div>
					</div>
					</div>
				<?php else: ?>
					<?= $this->Html->image($slide['image_url'], ['alt' => 'Coup de coeur']);?>
				<?php endif; ?>
			</div>

		<?php endforeach; ?>
	</div>
</div>

<?php $this->start('css'); ?>
    <?= $this->Html->css('slick/slick.css') ?>
    <?= $this->Html->css('slick/slick-theme.css') ?>
<?php $this->end(); ?>

	<?php $this->start('end-script');?>
	<?= $this->Html->script('slick/slick.min.js') ?>

    <script type="text/javascript">
        $('.coupdecoeur-slick').slick({
            arrows:false,
            dots:false,
			centerMode: true,
			centerPadding: '0',
			slidesToShow: 1,
			autoplay:true,
			adaptiveHeight:true,
			infinite:true,
			variableWidth:true,
			zIndex:-1,
			responsive: [
			{
			  breakpoint: 768,
			  settings: {
				variableWidth:false,
			  }
			},
			{
			  breakpoint: 480,
			  settings: {

			variableWidth:false,

			  }
			}
          ]
        });
    </script>
<?php $this->end();?>
