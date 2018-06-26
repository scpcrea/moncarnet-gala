<br/>
<?php foreach($categories as $category): ?>
	<ul>
		<?= $this->MonCarnet->linkToCategory($category, ['style'=>'font-weight:500']);?>

		<?php foreach ($category->articles as $other_article): ?>
			<?php if($other_article->slug == $article->slug): ?>
				<li>&nbsp; > <?=$this->Moncarnet->linkToArticle($other_article, ['class'=>'nav-active']); ?></li>
			<?php else: ?>
				<li>&nbsp; > <?=$this->Moncarnet->linkToArticle($other_article); ?></li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>

<?php endforeach; ?>
