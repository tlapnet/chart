<?php

namespace Tlapnet\Chart;

use Tlapnet\Chart\Segment\PieSegment;


/**
 * @author Ludek Benedik
 */
class PieChart extends AbstractChart
{
	/** @var PieSegment[] */
	private $segments = [];

	/** @var bool */
	private $enableRatioLabel = false;

	/** @var string */
	private $valueSuffix = '';


	/**
	 * @param PieSegment $segment
	 */
	public function addSegment(PieSegment $segment)
	{
		$this->segments[] = $segment;
	}


	/**
	 */
	public function enableRatioLabel()
	{
		$this->enableRatioLabel = true;
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
		$params                     = parent::getTemplateParameters();
		$params['segments']         = $this->segments;
		$params['enableRatioLabel'] = $this->enableRatioLabel;
		$params['valueSuffix']      = $this->valueSuffix;

		return $params;
	}
}
