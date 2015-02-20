<?php

namespace Tlapnet\Nette\Chart;

use LogicException;
use Tlapnet\Nette\Chart\Segment\BarSegment;
use Tlapnet\Nette\Chart\Serie\BarSerie;


/**
 * @author Ludek Benedik
 */
class BarChart extends BaseChart
{
	/** @var bool */
	private $isStacked = false;

	/** @var string */
	private $valueSuffix = '';

	/** @var string */
	private $decimals = 0;

	/** @var bool */
	private $showStackSum = false;

	/** @var callback */
	private $sumFormatCallback;


	/**
	 * @param BarSerie $serie
	 */
	public function addSerie(BarSerie $serie)
	{
		$this->series[] = $serie;
	}


	/**
	 * @param bool $isStacked
	 */
	public function setIsStacked($isStacked)
	{
		$this->isStacked = (bool) $isStacked;
	}


	/**
	 * @param bool $showStackSum
	 */
	public function setShowStackSum($showStackSum)
	{
		$this->showStackSum = $showStackSum;
	}


	/**
	 * @param $suffix
	 */
	public function setValueSuffix($suffix)
	{
		$this->valueSuffix = (string) $suffix;
	}


	/**
	 * @param callback $sumFormatCallback
	 */
	public function setSumFormatCallback($sumFormatCallback)
	{
		$this->sumFormatCallback = $sumFormatCallback;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function beforeRender()
	{
		if ($this->isStacked) {
			if ($this->showStackSum) {
				$this->addStackedSumSerie();
			}
			$this->validateSegmentsInSeries();
		}

		parent::beforeRender();
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params                      = parent::getTemplateParameters();
		$params['isStacked']         = $this->isStacked;
		$params['showStackSum']      = $this->showStackSum;
		$params['valueSuffix']       = $this->valueSuffix;
		$params['decimals']          = $this->decimals;
		$params['sumFormatCallback'] = $this->sumFormatCallback;

		return $params;
	}


	/**
	 */
	private function addStackedSumSerie()
	{
		$sums = array();

		foreach ($this->series as $serie) {
			foreach ($serie->getSegments() as $position => $segment) {
				$sums[$position] = isset($sums[$position]) ? $sums[$position] : 0;
				$sums[$position] += $segment->getValue();
			}
		}

		$sumSerie = new BarSerie('sum', $sums, true);
		foreach ($this->series[0]->getSegments() as $segment) {
			$sumSerie->addSegment(new BarSegment($segment->getTitle(), 0));
		}

		$this->addSerie($sumSerie);
	}


	/**
	 * @throws LogicException
	 */
	private function validateSegmentsInSeries()
	{
		$firstSerieSegmentKeyPositions = null;

		foreach ($this->series as $serie) {
			$segments = $serie->getSegments();

			if ($firstSerieSegmentKeyPositions === null) {
				$firstSerieSegmentKeyPositions = array();
				foreach ($segments as $position => $segment) {
					$firstSerieSegmentKeyPositions[$segment->getTitle()] = $position;
				}

				if (count($segments) !== count($firstSerieSegmentKeyPositions)) {
					throw new LogicException("Segments in first serie doesn't have unique titles.");
				}
				continue;
			}

			if (count($segments) !== count($firstSerieSegmentKeyPositions)) {
				throw new LogicException("Serie '{$serie->getTitle()}' doesn't have same number of segments as first serie or doesn't have unigue titles.");
			}

			foreach ($segments as $position => $segment) {
				$title = $segment->getTitle();

				if (!isset($firstSerieSegmentKeyPositions[$title])) {
					throw new LogicException("Serie '{$serie->getTitle()}' doesn't have same titles as first serie.");
				}

				if ($position !== $firstSerieSegmentKeyPositions[$title]) {
					throw new LogicException("Serie '{$serie->getTitle()}' doesn't have same titles positions as first serie.");
				}
			}
		}
	}
}
