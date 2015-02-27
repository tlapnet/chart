<div id="<?php echo $chartId ?>" style="width: <?php echo $width ?>; height: <?php echo $height ?>;">
	<?php if (!$segments): ?>
		<div class="empty-chart-warning">
			nedostatek dat k realizaci grafu...
		</div>
	<?php endif ?>
</div>

<?php if ($segments): ?>
	<script type="text/javascript">
		var data = {
			type : '<?php echo $type ?>',
			colors: {},
			columns: []
		};

		var pie = {
			label: {}
		};

		<?php if ($dataLabelType === 'value'): ?>
			pie.label.format = function (value, ratio, id) {
				return value;
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

		c3.generate({
			bindto: '#<?php echo $chartId ?>',
			data: data,
			pie
		});
	</script>
<?php endif ?>
