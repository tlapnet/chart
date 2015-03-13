# Chart

## Load Assets

	<!-- Load c3.css -->
	<link href="/path/to/c3.css" rel="stylesheet" type="text/css">
	
	<!-- Load d3.js and c3.js -->
	<script src="/path/to/d3.v3.min.js" charset="utf-8"></script>
	<script src="/path/to/c3.min.js"></script>


## Available charts

 * Chart - x: float, y: float
 * CategoryChart - x: string (key), y: float
 * DateChart - x: DateTime, y: float
 * PieChart
 * DonutChart


### Chart, CategoryChart and DateChart serie types

 * area
 * area spline
 * area step
 * bar
 * line
 * spline
 * step


### CategoryChart

	use Nette\Chart\Category;
	use Nette\Chart\CategoryChart;
	use Nette\Chart\CategorySerie;
	use Nette\Chart\CategorySegment;
	
	// Order of 
	$chart = new CategoryChart([
		new Category(1, 'January'),
		new Category(2, 'February'),
		new Category(3, 'March'),
	]);
	
	$serie = new CategorySerie(CategorySerie::BAR, 'Company 1', 'red');
	$serie->addSegment(new CategorySegment(1, 0));
	$serie->addSegment(new CategorySegment(2, 4000));
	$serie->addSegment(new CategorySegment(3, 1000));
	$chart->addSerie($serie, 'group1');

	$serie = new CategorySerie(CategorySerie::BAR, 'Company 2', 'green');
	$serie->addSegment(new CategorySegment(1, 3000));
	// We can skip segment for any category (default falue is zero)
	$serie->addSegment(new CategorySegment(3, 500));
	$chart->addSerie($serie, 'group1');

	// We can omit serie color. Library choose color atomatically
	$serie = new CategorySerie(CategorySerie::LINE, 'Summary');
	$serie->addSegment(new CategorySegment(1, 3000));
	// No matter the order of registered segments
	$serie->addSegment(new CategorySegment(3, 1500));
	$serie->addSegment(new CategorySegment(2, 4000));
	$chart->addSerie($serie);

	echo $chart;
