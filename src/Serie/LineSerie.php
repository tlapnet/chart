<?php

namespace Tlapnet\Nette\Chart\Serie;

use Tlapnet\Nette\Chart\Segment;



class LineSerie extends BaseSerie
{
	
	/**
	 * @param Segment\LineSegment $segment 
	 */
	public function addSegment(Segment\LineSegment $segment)
	{
		$this->segments[] = $segment;
	}

}
