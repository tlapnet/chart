<?php

namespace Tlapnet\Chart;

use Tlapnet\Chart\Serie\LineDateSerie;


/**
 * @author Ludek Benedik
 */
class LineDateChart extends BaseLineChart
{
	/** @var bool */
	private $useTimePrecision = false;


	/**
	 * @param LineDateSerie $serie
	 */
	public function addSerie(LineDateSerie $serie)
	{
		$this->series[] = $serie;
	}


	public function enableTimePrecision()
	{
		$this->useTimePrecision = true;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params                     = parent::getTemplateParameters();
		$params['useTimePrecision'] = $this->useTimePrecision;
		$params['minTime']          = $this->getMinTime();
		$params['maxTime']          = $this->getMaxTime();

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
