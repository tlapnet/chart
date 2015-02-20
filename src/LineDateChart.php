<?php

namespace Tlapnet\Nette\Chart;

use Tlapnet\Nette\Chart\Serie\LineDateSerie;


/**
 * @author Ludek Benedik
 */
class LineDateChart extends BaseLineChart
{
	/**
	 * @param LineDateSerie $serie
	 */
	public function addSerie(LineDateSerie $serie)
	{
		$this->series[] = $serie;
	}
}
