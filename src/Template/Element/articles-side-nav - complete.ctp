

<br/>
<?= $this->MonCarnet->linkToCategory($article->category, ['style'=>'font-weight:500']);?>

<?php foreach ($article->category->articles as $other_article): ?>
	<?php if($other_article->slug == $article->slug): ?>
		<li>&nbsp; > <?=$this->Moncarnet->linkToArticle($other_article, ['class'=>'nav-active']); ?><li>
	<?php else: ?>
		<li>&nbsp;   > <?=$this->Moncarnet->linkToArticle($other_article); ?><li>
	<?php endif; ?>
<?php endforeach; ?>


<br/><br/>
<?= $this->MonCarnet->linkToCategory($article->category->parent_category, ['style'=>'font-weight:300; text-transform:uppercase']);?>
<ul>
	<?php foreach($categories as $parent_category): ?>

	    <li>
	    	> <?= $this->MonCarnet->linkToCategory($parent_category, ['style'=>'font-weight:300;']);?>
	    </li>

	    	<?php if($parent_category->slug == $article->category->parent_category->slug) : ?>
	    		<ul>
	    		<?php foreach($parent_category->children as $other_category):?>
	    			<?php if($other_category->slug == $article->category->slug): ?>
	    				<li>> <?= $this->MonCarnet->linkToCategory($other_category, ['style'=>'font-weight:500;']); ?></li>
	    				<ul>
	    				</ul>
		    		<?php else: ?>
		    			<li>> <?= $this->MonCarnet->linkToCategory($other_category, ['style'=>'font-weight:500;']);?></li>
		    		<?php endif;?>
	    		<?php endforeach; ?>
	    		</ul>

	    	<?php endif; ?>

	<?php endforeach;?>
</ul>
