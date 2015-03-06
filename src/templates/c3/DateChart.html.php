<?php
/**
 * @var int $width
 * @var int $height
 * @var int $minTime
 * @var int $maxTime
 * @var bool $useTimePrecision
 * @var string $chartId
 * @var string $valueSuffix
 * @var array $groups serie_index => string|null
 * @var Tlapnet\Chart\Serie\DateSerie[] $series
 */
?>
<div id="<?php echo $chartId ?>" style="width: <?php echo $width ?>; height: <?php echo $height ?>;"></div>
<script type="text/javascript">
	(function() {
		var valueFormatter = function(value) {
			return (value + '').replace(/(\d)(?=(\d{3})+(\.|$))/g, '$1 ').replace('.', ',') + '<?php echo $valueSuffix ?>';
		}

		var axis = {
			x: {
				type: 'timeseries',
				tick: {
					fit: false,
					format: '%d.%m.%Y'
				}
			},
			y : {
				tick: {
					format: function (d) { return valueFormatter(d); }
				}
			}
		};
		var data = {
			labels: {
				//format: function (v, id, i, j) { return valueFormatter(v); }
			},
			xFormat: '%Y-%m-%d',
			xs: {},
			types: {},
			names: {},
			colors: {},
			groups: [],
			columns: []
		};

		<?php if ($useTimePrecision): ?>
			data.xFormat = '%Y-%m-%d %H:%M:%S';
	
			<?php if (($maxTime - $minTime) > 90000): ?>
				axis.x.height = 50;
				axis.x.tick.format = '%d.%m %H:%M';
			<?php else: ?>
				axis.x.tick.format = '%H:%M';
			<?php endif ?>
		<?php endif ?>

		<?php $i = 0 ?>
		<?php $groupedDataNames = [] ?>
		<?php foreach ($series as $serieIndex => $serie): ?>
			<?php $i++ ?>
			<?php $colX = 'x' . $i ?>
			<?php $colY = 'y' . $i ?>

			<?php if ($groups[$serieIndex] !== null): ?>
				<?php $groupedDataNames[$groups[$serieIndex]][] = $colY ?>
			<?php endif ?>

			data.xs['<?php echo $colY ?>'] = 'x<?php echo $i ?>';
			data.types['<?php echo $colY ?>'] = '<?php echo str_replace('_', '-', $serie->getType()) ?>';
			data.names['<?php echo $colY ?>'] = '<?php echo $serie->getTitle() ?>';

			<?php if ($serie->getColor() !== null): ?>
				data.colors['<?php echo $colY ?>'] = '<?php echo $serie->getColor() ?>';
			<?php endif ?>

			var columnX = ['<?php echo $colX ?>'];
			var columnY = ['<?php echo $colY ?>'];

			<?php foreach ($serie->getSegments() as $segment): ?>
				columnX.push('<?php echo $segment->getDate()->format($useTimePrecision ? 'Y-m-d H:i:s' : 'Y-m-d') ?>');
				columnY.push(<?php echo $segment->getValue() ?>);
			<?php endforeach ?>

			data.columns.push(columnX);
			data.columns.push(columnY);
		<?php endforeach ?>

		<?php foreach ($groupedDataNames as $dataNames): ?>
			var group = [];

			<?php foreach ($dataNames as $name): ?>
				group.push('<?php echo $name ?>');
			<?php endforeach ?>

			data.groups.push(group);
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
	})();
</script>
