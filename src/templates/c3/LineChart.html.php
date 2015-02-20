<div id="<?php echo $chartId ?>" style="width: <?php echo $width ?>; height: <?php echo $height ?>;"></div>
<script type="text/javascript">
	var xs = {};
	var names = {};
	var colors = {};
	var columns = [];

	<?php $i = 0 ?>
	<?php foreach ($series as $serie): ?>
		<?php $i++ ?>

		xs['data<?php echo $i ?>'] = 'x<?php echo $i ?>';
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

		columns.push(columnX);
		columns.push(columnY);
		//series.push({ color: '<?php echo $serie->getColor() ?>', label: '<?php echo $serie->getTitle() ?>' });
	<?php endforeach ?>

	console.log(columns);

	c3.generate({
		bindto: '#<?php echo $chartId ?>',
		data: {
			xs: xs,
			names: names,
			colors: colors,
			columns: columns
		}
	});
</script>
