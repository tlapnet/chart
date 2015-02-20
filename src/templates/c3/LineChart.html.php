<div id="<?php echo $chartId ?>" style="width: <?php echo $width ?>; height: <?php echo $height ?>;"></div>
<script type="text/javascript">
	var axis = {
		x: {
			type: 'indexed'
		}
	};
	var xs = {};
	var names = {};
	var colors = {};
	var columns = [];

	<?php $i = 0 ?>
	<?php foreach ($series as $serie): ?>
		<?php $i++ ?>

		<?php if (!$isXAxisCategorized): ?>
			xs['data<?php echo $i ?>'] = 'x<?php echo $i ?>';
		<?php endif ?>

		names['data<?php echo $i ?>'] = '<?php echo $serie->getTitle() ?>';

		<?php if ($serie->getColor() !== null): ?>
			colors['data<?php echo $i ?>'] = '<?php echo $serie->getColor() ?>';
		<?php endif ?>

		var columnX = ['x<?php echo $i ?>'];
		var columnY = ['data<?php echo $i ?>'];

		<?php foreach ($serie->getSegments() as $segment): ?>
			columnX.push('<?php echo $segment->getX() ?>');
			columnY.push(<?php echo $segment->getY() ?>);
		<?php endforeach ?>

		<?php if (!$isXAxisCategorized): ?>
			columns.push(columnX);
		<?php elseif ($isXAxisCategorized && $i === 1): ?>
			columnX.shift();
			axis.x.type = 'category';
			axis.x.categories = columnX;
		<?php endif ?>

		columns.push(columnY);
		//series.push({ color: '<?php echo $serie->getColor() ?>', label: '<?php echo $serie->getTitle() ?>' });
	<?php endforeach ?>

	c3.generate({
		bindto: '#<?php echo $chartId ?>',
		axis: axis,
		data: {
			xs: xs,
			names: names,
			colors: colors,
			columns: columns
		}
	});
</script>
