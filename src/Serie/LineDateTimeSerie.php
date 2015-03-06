<?php

namespace Tlapnet\Nette\Chart\Serie;

use Tlapnet\Nette\Chart\Segment\LineDateTimeSegment;


/**
 * @author Ludek Benedik
 */
class LineDateTimeSerie extends BaseSerie
{
	/** @var int */
	private $minTime = PHP_INT_MAX;

	/** @var int */
	private $maxTime = 0;


	/**
	 * @param LineDateTimeSegment $segment
	 */
	public function addSegment(LineDateTimeSegment $segment)
	{
		$t = $segment->getDateTime()->format('U');

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
