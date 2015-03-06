<?php

namespace Tlapnet\Chart\Serie;

use Tlapnet\Chart\Segment\LineSegment;


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
