<?php

namespace Tlapnet\Nette\Chart\Serie;

use Tlapnet\Nette\Chart\Segment\PieSegment;


/**
 * @author Ludek Benedik
 */
class PieSerie extends BaseSerie
{
	/**
	 * @param PieSegment $segment
	 */
	public function addSegment(PieSegment $segment)
	{
		$this->segments[] = $segment;
	}
}
