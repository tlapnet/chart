<?php
/**
 * @var int $width
 * @var int $height
 * @var bool $enableRatioLabel
 * @var string $chartId
 * @var string $valueSuffix
 * @var Tlapnet\Chart\Segment\PieSegment[] $segments
 */
?>
<div id="<?php echo $chartId ?>" style="width: <?php echo $width ?>; height: <?php echo $height ?>;">
	<?php if (!$segments): ?>
		<div class="empty-chart-warning">
			Nedostatek dat k realizaci grafu.
		</div>
	<?php endif ?>
</div>

<?php if ($segments): ?>
	<script type="text/javascript">
		(function() {
			'use strict';

			var data = {
				type : 'pie',
				columns: []
			};

			var pie = {
				label: {}
			};

			<?php if (!$enableRatioLabel): ?>
				pie.label.format = function (value, ratio, id) {
					return value + '<?php echo $valueSuffix ?>';
				};
			<?php endif ?>

			<?php $i = 0 ?>
			<?php foreach ($segments as $segment): ?>
				<?php $i++ ?>

				var column = [
					'<?php echo $segment->getTitle() ?>',
					<?php echo $segment->getValue() ?>
				];

				data.columns.push(column);
			<?php endforeach ?>

			var chart = c3.generate({
				bindto: '#<?php echo $chartId ?>',
				data: data,
				pie: pie
			});
			$('#<?php echo $chartId ?>').data('c3-chart', chart);
		})();
	</script>
<?php endif ?>
