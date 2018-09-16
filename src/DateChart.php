<?php declare(strict_types = 1);

namespace Tlapnet\Chart;

use Tlapnet\Chart\Serie\DateSerie;

class DateChart extends AbstractChart
{

	/** @var DateSerie[] */
	private $series = [];

	/** @var mixed[] serie_index => group */
	private $groups = [];

	/** @var bool */
	private $useTimePrecision = false;

	/**
	 * @param mixed $group Valid PHP array key. If NULL then serie is ungrouped
	 */
	public function addSerie(DateSerie $serie, $group = null): void
	{
		$this->series[] = $serie;
		$this->groups[] = $group;
	}

	public function enableTimePrecision(): void
	{
		$this->useTimePrecision = true;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters(): array
	{
		$params = parent::getTemplateParameters();
		$params['series'] = $this->series;
		$params['groups'] = $this->groups;
		$params['minTime'] = $this->getMinTime();
		$params['maxTime'] = $this->getMaxTime();
		$params['useTimePrecision'] = $this->useTimePrecision;

		return $params;
	}

	private function getMinTime(): int
	{
		$min = [];

		foreach ($this->series as $serie) {
			$min[] = $serie->getMinTime();
		}

		return min($min);
	}

	private function getMaxTime(): int
	{
		$max = [];

		foreach ($this->series as $serie) {
			$max[] = $serie->getMaxTime();
		}

		return max($max);
	}

}
