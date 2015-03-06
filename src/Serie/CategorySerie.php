<?php

namespace Tlapnet\Chart\Serie;

use LogicException;
use Tlapnet\Chart\Segment\CategorySegment;


/**
 * @author Ludek Benedik
 */
class CategorySerie extends AbstractSerie
{
	/** @var CategorySegment[] */
	private $segments = [];

	/** @var string[] */
	private $usedCategoryKeys = [];


	/**
	 * @param CategorySegment $segment
	 * @throws LogicException When category key alredy have another segment
	 */
	public function addSegment(CategorySegment $segment)
	{
		if (in_array($segment->getKey(), $this->usedCategoryKeys)) {
			throw new LogicException(sprintf('Category key "%s" has another segment.', $segment->getKey()));
		}

		$this->segments[]         = $segment;
		$this->usedCategoryKeys[] = $segment->getKey();
	}


	/**
	 * @return CategorySegment[]
	 */
	public function getSegments()
	{
		return $this->segments;
	}
}
