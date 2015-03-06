<?php

namespace Tlapnet\Chart\Serie;

use Tlapnet\Chart\Segment\LineDateSegment;


/**
 * @author Ludek Benedik
 */
class LineDateSerie extends BaseSerie
{
	/** @var int */
	private $minTime = PHP_INT_MAX;

	/** @var int */
	private $maxTime = 0;


	/**
	 * @param LineDateSegment $segment
	 */
	public function addSegment(LineDateSegment $segment)
	{
		$t = $segment->getDate()->format('U');

		$this->minTime = min($this->minTime, $t);
		$this->maxTime = max($this->maxTime, $t);

		$this->segments[] = $segment;
	}


	/**
	 * @return int Timestamp
	 */
	public function getMinTime()
	{
		return $this->minTime;
	}


	/**
	 * @return int Timestamp
	 */
	public function getMaxTime()
	{
		return $this->maxTime;
	}
}
