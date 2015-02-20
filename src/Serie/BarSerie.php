<?php

namespace Tlapnet\Nette\Chart\Serie;

use Tlapnet\Nette\Chart\Segment\BarSegment;


/**
 * @author Ludek Benedik
 */
class BarSerie extends BaseSerie
{
	/** @var array */
	private $pointLabels;

	/** @var bool */
	private $isSumSerie;


	/**
	 * @param string $title
	 * @param array $pointLabels
	 * @param bool $isSumSerie
	 */
	public function __construct($title, $pointLabels = array(), $isSumSerie = false)
	{
		$this->title       = (string) $title;
		$this->pointLabels = $pointLabels;
		$this->isSumSerie  = $isSumSerie;
	}


	/**
	 * @param BarSegment $segment
	 */
	public function addSegment(BarSegment $segment)
	{
		$this->segments[] = $segment;
	}


	/**
	 * @return boolean
	 */
	public function isSumSerie()
	{
		return $this->isSumSerie;
	}


	/**
	 * @return array
	 */
	public function getPointLabels()
	{
		// fix for https://bitbucket.org/cleonello/jqplot/issue/402/, after fix change BarChart (remove labels: {!= json_encode($serie->getPointLabels())} from line 37)
		if (empty($this->pointLabels)) {
			$arr = array();
			foreach ($this->getSegments() as $segment) {
				$arr[] = $segment->getValue();
			}
			return $arr;
		}
		else {
			return $this->pointLabels;
		}
	}
}
