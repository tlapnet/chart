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


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params = parent::getTemplateParameters();
		$params['minTime'] = $this->getMinTime();
		$params['maxTime'] = $this->getMaxTime();

		return $params;
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
