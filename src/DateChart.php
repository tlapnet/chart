<?php

namespace Tlapnet\Chart;

use Tlapnet\Chart\Serie\DateSerie;


/**
 * @author Ludek Benedik
 */
class DateChart extends AbstractChart
{
	/** @var DateSerie[] */
	private $series = [];

	/** @var array serie_index => group */
	private $groups = [];

	/** @var bool */
	private $useTimePrecision = false;


	/**
	 * @param DateSerie $serie
	 * @param mixed $group Valid PHP array key. If NULL then serie is ungrouped
	 */
	public function addSerie(DateSerie $serie, $group = null)
	{
		$this->series[] = $serie;
		$this->groups[] = $group;
	}


	/**
	 */
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
		$params['series']           = $this->series;
		$params['groups']           = $this->groups;
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
