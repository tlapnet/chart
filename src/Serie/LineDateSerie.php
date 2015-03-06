<?php

namespace Tlapnet\Chart\Serie;

use Tlapnet\Chart\Segment\LineDateSegment;


/**
 * @author Ludek Benedik
 */
class LineDateSerie extends BaseSerie
{
	/**
	 * @param LineDateSegment $segment
	 */
	public function addSegment(LineDateSegment $segment)
	{
		$this->segments[] = $segment;
	}
}
