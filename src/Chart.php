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


	/**
	 * @param Serie $serie
	 * @param mixed $group Valid PHP array key. If NULL then serie is ungrouped
	 */
	public function addSerie(Serie $serie, $group = null)
	{
		$this->series[] = $serie;
		$this->groups[] = $group;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params           = parent::getTemplateParameters();
		$params['series'] = $this->series;
		$params['groups'] = $this->groups;

		return $params;
	}
}
