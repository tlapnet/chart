<?php

namespace Tlapnet\Chart\Segment;


/**
 * @author Ludek Benedik
 */
class CategorySegment
{
	/** @var string */
	private $key;

	/** @var float */
	private $value;


	/**
	 * @param string $key
	 * @param float $value
	 */
	function __construct($key, $value)
	{
		$this->key   = (string) $key;
		$this->value = (float) $value;
	}


	/**
	 * @return string
	 */
	public function getKey()
	{
		return $this->key;
	}


	/**
	 * @return float
	 */
	public function getValue()
	{
		return $this->value;
	}
}
