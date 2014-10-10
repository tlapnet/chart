<?php

namespace Tlapnet\Nette\Chart;



class LineDateChart extends BaseLineChart
{
	
	/**
	 * @param Serie\LineDateSerie $serie 
	 */
	public function addSerie(Serie\LineDateSerie $serie)
	{
		$this->series[] = $serie;
	}

}
