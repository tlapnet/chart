<div id="<?php echo $chartId ?>" style="width: <?php echo $width ?>; height: <?php echo $height ?>;"></div>
<script type="text/javascript">
	var axis = {
		x: {
			type: 'indexed'
		},
		y : {
			tick: {
                format: function (d) { return d + '<?php echo $valueSuffix ?>'; }
			}
		}
	};
	var data = {
		//labels: true,
		xs: {},
		names: {},
		colors: {},
		columns: []
	};

	<?php $i = 0 ?>
	<?php foreach ($series as $serie): ?>
		<?php $i++ ?>

		<?php if (!$isXAxisCategorized): ?>
			data.xs['data<?php echo $i ?>'] = 'x<?php echo $i ?>';
		<?php endif ?>

		data.names['data<?php echo $i ?>'] = '<?php echo $serie->getTitle() ?>';

		<?php if ($serie->getColor() !== null): ?>
			data.colors['data<?php echo $i ?>'] = '<?php echo $serie->getColor() ?>';
		<?php endif ?>

		var columnX = ['x<?php echo $i ?>'];
		var columnY = ['data<?php echo $i ?>'];

		<?php foreach ($serie->getSegments() as $segment): ?>
			columnX.push('<?php echo $segment->getX() ?>');
			columnY.push(<?php echo $segment->getY() ?>);
		<?php endforeach ?>

		<?php if (!$isXAxisCategorized): ?>
			data.columns.push(columnX);
		<?php elseif ($isXAxisCategorized && $i === 1): ?>
			columnX.shift();
			axis.x.type = 'category';
			axis.x.categories = columnX;
		<?php endif ?>

		data.columns.push(columnY);
	<?php endforeach ?>

	c3.generate({
		bindto: '#<?php echo $chartId ?>',
		grid: {
			x: {
				show: true
			},
			y: {
				show: true
			}
		},
		axis: axis,
		data: data
	});
</script>
