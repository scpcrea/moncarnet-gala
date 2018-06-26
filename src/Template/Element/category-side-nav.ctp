<?= $category->parent_category->name; ?>
<ul>
	<?php foreach($category->parent_category->child_categories as $otherCategory): ?>
	    <li>>
	    <?php if($otherCategory->slug == $category->slug) : ?>
	    	<?= $this->MonCarnet->linkToCategory($otherCategory, ['class'=>'nav-active']);?></li>
	    <?php else: ?>
	    	<?= $this->MonCarnet->linkToCategory($otherCategory);?></li>
	    <?php endif; ?>
	<?php endforeach; ?>
</ul>
