<?php

namespace Tlapnet\Nette\Chart;

use LogicException;
use Tlapnet\Nette\Chart\Segment\BarSegment;
use Tlapnet\Nette\Chart\Serie\BarSerie;
use Tlapnet\Nette\Chart\Util\SeriesValidator;


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

			SeriesValidator::assertXSegmentEquality($this->series, function($segment) {
				return $segment->getTitle();
			});
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
}
