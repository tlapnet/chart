<?php

namespace Tlapnet\Nette\Chart\Serie;

use Tlapnet\Nette\Chart\Segment;


class LineDateTimeSerie extends BaseSerie
{


	/** @var int */
	private $minTime = 999999999999999;

	/** @var int */
	private $maxTime = 0;





	/**
	 * @param Segment\LineDateSegment $segment
	 */
	public function addSegment(Segment\LineDateTimeSegment $segment)
	{
		$t = $segment->getDateTime()->format('U');

		$this->minTime = min($this->minTime, $t);
		$this->maxTime = max($this->maxTime, $t);

		$this->segments[] = $segment;
	}


	/**
	 * @return int
	 */
	public function getMinTime()
	{
		return $this->minTime;
	}


	/** @return int */
	public function  getMaxTime()
	{
		return $this->maxTime;
	}

}
