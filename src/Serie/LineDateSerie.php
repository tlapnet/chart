<?php

namespace Tlapnet\Nette\Chart\Serie;

use Tlapnet\Nette\Chart\Segment\LineDateSegment;


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
