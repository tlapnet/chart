<?php

namespace Tlapnet\Nette\Chart\Serie;

use Tlapnet\Nette\Chart\Segment\LineSegment;


/**
 * @author Ludek Benedik
 */
class LineSerie extends BaseSerie
{
	/**
	 * @param LineSegment $segment
	 */
	public function addSegment(LineSegment $segment)
	{
		$this->segments[] = $segment;
	}
}
