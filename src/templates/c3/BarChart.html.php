<div id="<?php echo $chartId ?>" style="width: <?php echo $width ?>; height: <?php echo $height ?>;"></div>
<script type="text/javascript">
	var axis = {
		x: {
			type: 'category'
		},
		y : {
			tick: {
                format: function (d) { return d + '<?php echo $valueSuffix ?>'; }
			}
		}
	};
	var data = {
		type: 'bar',
		labels: {
			format: function (v, id, i, j) { return v + '<?php echo $valueSuffix ?>'; }
		},
		names: {},
		colors: {},
		groups: [[]],
		columns: []
	};

	<?php $i = 0 ?>
	<?php foreach ($series as $serie): ?>
		<?php $i++ ?>

		data.names['data<?php echo $i ?>'] = '<?php echo $serie->getTitle() ?>';

		<?php if ($serie->getColor() !== null): ?>
			data.colors['data<?php echo $i ?>'] = '<?php echo $serie->getColor() ?>';
		<?php endif ?>

		<?php if ($isStacked): ?>
			data.groups[0].push('data<?php echo $i ?>');
		<?php endif ?>

		var columnX = [];
		var columnY = ['data<?php echo $i ?>'];

		<?php foreach ($serie->getSegments() as $segment): ?>
			columnX.push('<?php echo $segment->getTitle() ?>');
			columnY.push(<?php echo $segment->getValue() ?>);
		<?php endforeach ?>

		<?php if ($i === 1): ?>
			axis.x.categories = columnX;
		<?php endif ?>

		data.columns.push(columnY);
	<?php endforeach ?>

	c3.generate({
		bindto: '#<?php echo $chartId ?>',
		grid: {
			x: {
				show: false
			},
			y: {
				show: true
			}
		},
		axis: axis,
		data: data
	});
</script>
