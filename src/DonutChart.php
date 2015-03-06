<?php

namespace Tlapnet\Chart;

use Tlapnet\Chart\Segment\DonutSegment;


/**
 * @author Ludek Benedik
 */
class DonutChart extends AbstractChart
{
	/** @var DonutSegment[] */
	private $segments = [];

	/** @var string */
	private $title = '';

	/** @var bool */
	private $enableRatioLabel = false;


	/**
	 * @param DonutSegment $segment
	 */
	public function addSegment(DonutSegment $segment)
	{
		$this->segments[] = $segment;
	}


	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = (string) $title;
	}


	/**
	 */
	public function enableRatioLabel()
	{
		$this->enableRatioLabel = true;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params                     = parent::getTemplateParameters();
		$params['segments']         = $this->segments;
		$params['title']            = $this->title;
		$params['enableRatioLabel'] = $this->enableRatioLabel;

		return $params;
	}
}
