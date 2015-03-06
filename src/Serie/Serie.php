<?php

namespace Tlapnet\Chart\Serie;

use Tlapnet\Chart\Segment\Segment;


/**
 * @author Ludek Benedik
 */
class Serie extends AbstractSerie
{
	/** @var Segment[] */
	private $segments = [];


	/**
	 * @param Segment $segment
	 */
	public function addSegment(Segment $segment)
	{
		$this->segments[] = $segment;
	}


	/**
	 * @return Segment[]
	 */
	public function getSegments()
	{
		return $this->segments;
	}
}
