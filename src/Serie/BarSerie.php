<?php

namespace Tlapnet\Nette\Chart\Serie;

use Tlapnet\Nette\Chart\Segment\BarSegment;


/**
 * @author Ludek Benedik
 */
class BarSerie extends BaseSerie
{
	/**
	 * @param string $title
	 */
	public function __construct($title)
	{
		$this->title = (string) $title;
	}


	/**
	 * @param BarSegment $segment
	 */
	public function addSegment(BarSegment $segment)
	{
		$this->segments[] = $segment;
	}
}
