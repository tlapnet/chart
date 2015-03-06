<?php

namespace Tlapnet\Chart;

use Tlapnet\Chart\Serie\LineDateTimeSerie;


/**
 * @author Ludek Benedik
 */
class LineDateTimeChart extends BaseLineChart
{
	/**
	 * @param LineDateTimeSerie $serie
	 */
	public function addSerie(LineDateTimeSerie $serie)
	{
		$this->series[] = $serie;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params            = parent::getTemplateParameters();
		$params['minTime'] = $this->getMinTime();
		$params['maxTime'] = $this->getMaxTime();

		return $params;
	}


	/**
	 * @return int
	 */
	private function getMinTime()
	{
		$min = array();

		foreach ($this->series as $serie) {
			$min[] = $serie->getMinTime();
		}

		return min($min);
	}


	/**
	 * @return int
	 */
	private function getMaxTime()
	{
		$max = array();

		foreach ($this->series as $serie) {
			$max[] = $serie->getMaxTime();
		}

		return max($max);
	}
}
