<?php

namespace Tlapnet\Nette\Chart;


class LineChart extends BaseLineChart
{


	/**
	 * @param Serie\LineSerie $serie
	 */
	public function addSerie(Serie\LineSerie $serie)
	{
		$this->series[] = $serie;
	}


}
