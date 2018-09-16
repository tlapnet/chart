<?php declare(strict_types = 1);

namespace Tlapnet\Chart\Segment;

class CategorySegment
{

	/** @var string */
	private $key;

	/** @var float */
	private $value;

	public function __construct(string $key, float $value)
	{
		$this->key = $key;
		$this->value = $value;
	}

	public function getKey(): string
	{
		return $this->key;
	}

	public function getValue(): float
	{
		return $this->value;
	}

}
