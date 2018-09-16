<?php declare(strict_types = 1);

namespace Tlapnet\Chart;

use Tlapnet\Chart\Serie\Serie;

class Chart extends AbstractChart
{

	/** @var Serie[] */
	private $series = [];

	/** @var mixed[] serie_index => group */
	private $groups = [];

	/**
	 * @param mixed $group Valid PHP array key. If NULL then serie is ungrouped
	 */
	public function addSerie(Serie $serie, $group = null): void
	{
		$this->series[] = $serie;
		$this->groups[] = $group;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters(): array
	{
		$params = parent::getTemplateParameters();
		$params['series'] = $this->series;
		$params['groups'] = $this->groups;

		return $params;
	}

}
