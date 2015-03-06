<?php
/**
 * @var int $width
 * @var int $height
 * @var string $chartId
 * @var string $valueSuffix
 * @var array $groups serie_index => string|null
 * @var Tlapnet\Chart\Serie\CategorySerie[] $series
 * @var Tlapnet\Chart\Category[] $categories
 */
?>
<div id="<?php echo $chartId ?>" style="width: <?php echo $width ?>; height: <?php echo $height ?>;"></div>
<script type="text/javascript">
	(function() {
		'use strict';

		var valueFormatter = function(value) {
			return (value + '').replace(/(\d)(?=(\d{3})+(\.|$))/g, '$1 ').replace('.', ',') + '<?php echo $valueSuffix ?>';
		};
		var axis = {
			x: {
				type: 'category',
				categories: []
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
			types: {},
			names: {},
			colors: {},
			groups: [],
			columns: []
		};

		<?php foreach ($categories as $category): ?>
			axis.x.categories.push('<?php echo $category->getTitle() ?>');
		<?php endforeach ?>

		<?php $i = 0 ?>
		<?php $groupedDataNames = [] ?>
		<?php foreach ($series as $serieIndex => $serie): ?>
			<?php $i++ ?>
			<?php $colY = 'y' . $i ?>

			<?php if ($groups[$serieIndex] !== null): ?>
				<?php $groupedDataNames[$groups[$serieIndex]][] = $colY ?>
			<?php endif ?>

			data.types['<?php echo $colY ?>'] = '<?php echo str_replace('_', '-', $serie->getType()) ?>';
			data.names['<?php echo $colY ?>'] = '<?php echo $serie->getTitle() ?>';

			<?php if ($serie->getColor() !== null): ?>
				data.colors['<?php echo $colY ?>'] = '<?php echo $serie->getColor() ?>';
			<?php endif ?>

			var columnY = ['<?php echo $colY ?>'];

			<?php foreach ($serie->getSegments() as $segment): ?>
				columnY.push(<?php echo $segment->getValue() ?>);
			<?php endforeach ?>

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
