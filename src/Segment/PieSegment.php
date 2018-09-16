<?php declare(strict_types = 1);

namespace Tlapnet\Chart\Segment;

class PieSegment
{

	/** @var string */
	private $title;

	/** @var float */
	private $value;

	public function __construct(string $title, float $value)
	{
		$this->title = $title;
		$this->value = $value;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getValue(): float
	{
		return $this->value;
	}

}
