<?php

namespace Tlapnet\Nette\Chart;

use Tlapnet\Nette\Chart\Serie\LineSerie;


/**
 * @author Ludek Benedik
 */
class LineChart extends BaseLineChart
{
	/**
	 * @param LineSerie $serie
	 */
	public function addSerie(LineSerie $serie)
	{
		$this->series[] = $serie;
	}
}
