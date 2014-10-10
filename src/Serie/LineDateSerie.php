<?php

namespace Tlapnet\Nette\Chart\Serie;

use Tlapnet\Nette\Chart\Segment;



class LineDateSerie extends BaseSerie
{
	
	/**
	 * @param Segment\LineDateSegment $segment 
	 */
	public function addSegment(Segment\LineDateSegment $segment)
	{
		$this->segments[] = $segment;
	}

}
