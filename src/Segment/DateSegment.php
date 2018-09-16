<?php declare(strict_types = 1);

namespace Tlapnet\Chart\Segment;

use DateTimeImmutable;
use DateTimeInterface;

class DateSegment
{

	/** @var DateTimeInterface */
	private $date;

	/** @var float */
	private $value;

	/**
	 * @param DateTimeInterface|int|string $date
	 */
	public function __construct($date, float $value)
	{
		if ($date instanceof DateTimeInterface) {
			$this->date = $date;
		} elseif (is_numeric($date)) {
			$this->date = new DateTimeImmutable();
			$this->date->setTimestamp($date);
		} else {
			$this->date = new DateTimeImmutable($date);
		}

		$this->value = $value;
	}

	public function getDate(): DateTimeInterface
	{
		return $this->date;
	}

	public function getValue(): float
	{
		return $this->value;
	}

}
