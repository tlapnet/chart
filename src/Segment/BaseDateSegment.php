<?php

namespace Tlapnet\Chart\Segment;

use DateTime;


/**
 * @author Ludek Benedik
 */
abstract class BaseDateSegment
{
	/** @var DateTime */
	private $dateTime;

	/** @var float */
	private $value;


	/**
	 * @param DateTime|int|string $time
	 * @param float $value
	 */
	function __construct($time, $value)
	{
		if ($time instanceof DateTime) {
			$this->dateTime = $time;
		}
		elseif (is_numeric($time)) {
			$this->dateTime = new DateTime();
			$this->dateTime->setTimestamp($time);
		}
		else {
			$this->dateTime = new DateTime($time);
		}

		$this->value = (float) $value;
	}


	/**
	 * @return DateTime
	 */
	public function getDateTime()
	{
		return $this->dateTime;
	}


	/**
	 * @return float
	 */
	public function getValue()
	{
		return $this->value;
	}
}
