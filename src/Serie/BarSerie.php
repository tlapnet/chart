<?php

namespace Tlapnet\Nette\Chart\Serie;

use Tlapnet\Nette\Chart\Segment\BarSegment;


/**
 * @author Ludek Benedik
 */
class BarSerie extends BaseSerie
{
	/**
	 * @param BarSegment $segment
	 */
	public function addSegment(BarSegment $segment)
	{
		$this->segments[] = $segment;
	}
}
