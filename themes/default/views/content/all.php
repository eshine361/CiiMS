<div id="posts">
    <?php foreach($data as $content): ?>
    	<?php $this->renderPartial('//content/_post', array('content' => $content)); ?>
    <?php endforeach; ?>
</div>

<?php if (count($data)): ?>
	<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
	    'url'=>isset($url) ? $url : 'blog',
	    'contentSelector' => '#posts',
	    'pages' => $pages,
	    'defaultCallback' => "js:function(response, data) {
	    	DefaultTheme.infScroll(response, data);			    
 		}"
	)); ?>
	<?php Yii::app()->clientScript->registerScript('unbind-infinite-scroll', "$(document).ready(function() { DefaultTheme.loadAll(); });"); ?>
<?php else: ?>
	<div class="alert alert-info">
		<strong>Woah!</strong> It looks like there isn't any posts in this category yet. Why don't you check out some of our other pages or check back later?
	</div>
<?php endif; ?>