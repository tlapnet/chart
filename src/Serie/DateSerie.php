<?php

namespace Tlapnet\Chart\Serie;

use Tlapnet\Chart\Segment\DateSegment;


/**
 * @author Ludek Benedik
 */
class DateSerie extends AbstractSerie
{
	/** @var DateSegment[] */
	private $segments = [];

	/** @var int */
	private $minTime = PHP_INT_MAX;

	/** @var int */
	private $maxTime = 0;


	/**
	 * @param DateSegment $segment
	 */
	public function addSegment(DateSegment $segment)
	{
		$t = $segment->getDate()->format('U');

		$this->minTime = min($this->minTime, $t);
		$this->maxTime = max($this->maxTime, $t);

		$this->segments[] = $segment;
	}


	/**
	 * @return DateSegment[]
	 */
	public function getSegments()
	{
		return $this->segments;
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