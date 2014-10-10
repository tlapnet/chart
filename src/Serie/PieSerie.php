<?php

namespace Tlapnet\Nette\Chart\Serie;

use Tlapnet\Nette\Chart\Segment;



class PieSerie extends BaseSerie
{
	
	/**
	 * @param Segment\PieSegment $segment 
	 */
	public function addSegment(Segment\PieSegment $segment)
	{
		$this->segments[] = $segment;
	}

}
