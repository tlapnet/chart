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
	 * @param $suffix
	 */
	public function setValueSuffix($suffix)
	{
		$this->valueSuffix = (string) $suffix;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function beforeRender()
	{
		SeriesValidator::assertXSegmentEquality($this->series, function($segment) {
			return $segment->getTitle();
		});

		parent::beforeRender();
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params                      = parent::getTemplateParameters();
		$params['isStacked']         = $this->isStacked;
		$params['valueSuffix']       = $this->valueSuffix;
		$params['decimals']          = $this->decimals;

		return $params;
	}
}
