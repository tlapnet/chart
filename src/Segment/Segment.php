<?php

namespace Tlapnet\Chart\Segment;

use LogicException;


/**
 * @author Ludek Benedik
 */
class Segment
{
	/** @var float */
	private $x;

	/** @var float */
	private $y;


	/**
	 * @param float $x
	 * @param float $y
	 */
	function __construct($x, $y)
	{
		$this->x = (float) $x;
		$this->y = (float) $y;
	}


	/**
	 * @return float
	 */
	public function getX()
	{
		return $this->x;
	}


	/**
	 * @return float
	 */
	public function getY()
	{
		return $this->y;
	}
}
