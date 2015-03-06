<?php

namespace Tlapnet\Chart;

use Tlapnet\Chart\Serie\Serie;


/**
 * @author Ludek Benedik
 */
class Chart extends AbstractChart
{
	/** @var Serie[] */
	private $series = [];

	/** @var array serie_index => group */
	private $groups = [];

	/** @var string */
	private $valueSuffix = '';


	/**
	 * @param Serie $serie
	 * @param mixed $group If NULL then serie is ungrouped
	 */
	public function addSerie(Serie $serie, $group = null)
	{
		$this->series[] = $serie;
		$this->groups[] = $group;
	}


	/**
	 * @param $suffix
	 */
	public function setValueSuffix($suffix)
	{
		$this->valueSuffix = (string) $suffix;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params                = parent::getTemplateParameters();
		$params['series']      = $this->series;
		$params['groups']      = $this->groups;
		$params['valueSuffix'] = $this->valueSuffix;

		return $params;
	}
}
