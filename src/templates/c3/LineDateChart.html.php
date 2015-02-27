<div id="<?php echo $chartId ?>" style="width: <?php echo $width ?>; height: <?php echo $height ?>;"></div>
<script type="text/javascript">
	var axis = {
		x: {
			type: 'timeseries',
			tick: {
				format: '%d.%m.%Y'
			}
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

		data.xs['data<?php echo $i ?>'] = 'x<?php echo $i ?>';
		data.names['data<?php echo $i ?>'] = '<?php echo $serie->getTitle() ?>';

		<?php if ($serie->getColor() !== null): ?>
			data.colors['data<?php echo $i ?>'] = '<?php echo $serie->getColor() ?>';
		<?php endif ?>

		var columnX = ['x<?php echo $i ?>'];
		var columnY = ['data<?php echo $i ?>'];

		<?php foreach ($serie->getSegments() as $segment): ?>
			columnX.push('<?php echo $segment->getDateTime()->format('Y-m-d') ?>');
			columnY.push(<?php echo $segment->getValue() ?>);
		<?php endforeach ?>

		data.columns.push(columnX);
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
