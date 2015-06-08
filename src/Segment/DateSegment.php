<?php

namespace Tlapnet\Chart\Segment;

use DateTime;


/**
 * @author Ludek Benedik
 */
class DateSegment
{
	/** @var DateTime */
	private $date;

	/** @var float */
	private $value;


	/**
	 * @param DateTime|int|string $date
	 * @param float $value
	 */
	function __construct($date, $value)
	{
		if ($date instanceof DateTime) {
			$this->date = $date;
		}
		elseif (is_numeric($date)) {
			$this->date = new DateTime();
			$this->date->setTimestamp($date);
		}
		else {
			$this->date = new DateTime($date);
		}

		$this->value = (float) $value;
	}


	/**
	 * @return DateTime
	 */
	public function getDate()
	{
		return $this->date;
	}


	/**
	 * @return float
	 */
	public function getValue()
	{
		return $this->value;
	}
}
