<?php declare(strict_types = 1);

namespace Tlapnet\Chart\Serie;

use Tlapnet\Chart\Segment\Segment;

class Serie extends AbstractSerie
{

	/** @var Segment[] */
	private $segments = [];

	public function addSegment(Segment $segment): void
	{
		$this->segments[] = $segment;
	}

	/**
	 * @return Segment[]
	 */
	public function getSegments(): array
	{
		return $this->segments;
	}

}
