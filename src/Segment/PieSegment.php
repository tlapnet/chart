<?php

namespace Tlapnet\Chart\Segment;


/**
 * @author Ludek Benedik
 */
class PieSegment
{
	/** @var string */
	private $title;

	/** @var float */
	private $value;


	/**
	 * @param string $title
	 * @param float $value
	 */
	function __construct($title, $value)
	{
		$this->title = (string) $title;
		$this->value = (float) $value;
	}


	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}


	/**
	 * @return float
	 */
	public function getValue()
	{
		return $this->value;
	}
}
