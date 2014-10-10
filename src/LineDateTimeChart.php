<?php

namespace Tlapnet\Nette\Chart;


class LineDateTimeChart extends BaseLineChart
{


	/**
	 * @param Serie\LineDateSerie $serie
	 */
	public function addSerie(Serie\LineDateTimeSerie $serie)
	{
		$this->series[] = $serie;
	}


	protected function beforeRender()
	{
		parent::beforeRender();

		$t          = $this->getTemplate();
		$t->minTime = $this->getMinTime();
		$t->maxTime = $this->getMaxTime();
	}


	/**
	 * @return int
	 */
	public function getMinTime()
	{
		$min = array();

		foreach($this->series as $serie){
			$min[] = $serie->getMinTime();
		}

		return min($min);
	}


	/**
	 * @return int
	 */
	public function getMaxTime()
	{
		$max = array();

		foreach($this->series as $serie){
			$max[] = $serie->getMaxTime();
		}

		return max($max);
	}

}
