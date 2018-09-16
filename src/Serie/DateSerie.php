<?php declare(strict_types = 1);

namespace Tlapnet\Chart\Serie;

use Tlapnet\Chart\Segment\DateSegment;

class DateSerie extends AbstractSerie
{

	/** @var DateSegment[] */
	private $segments = [];

	/** @var int */
	private $minTime = PHP_INT_MAX;

	/** @var int */
	private $maxTime = 0;

	public function addSegment(DateSegment $segment): void
	{
		$time = $segment->getDate()->getTimestamp();

		$this->minTime = min($this->minTime, $time);
		$this->maxTime = max($this->maxTime, $time);

		$this->segments[] = $segment;
	}

	/**
	 * @return DateSegment[]
	 */
	public function getSegments(): array
	{
		return $this->segments;
	}

	/**
	 * @return int Timestamp
	 */
	public function getMinTime(): int
	{
		return $this->minTime;
	}

	/**
	 * @return int Timestamp
	 */
	public function getMaxTime(): int
	{
		return $this->maxTime;
	}

}
