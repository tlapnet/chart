<?php declare(strict_types = 1);

namespace Tlapnet\Chart\Serie;

use LogicException;
use Tlapnet\Chart\Segment\CategorySegment;

class CategorySerie extends AbstractSerie
{

	/** @var CategorySegment[] */
	private $segments = [];

	/** @var string[] */
	private $usedCategoryKeys = [];

	/**
	 * @throws LogicException When category key alredy have another segment
	 */
	public function addSegment(CategorySegment $segment): void
	{
		if (in_array($segment->getKey(), $this->usedCategoryKeys, true)) {
			throw new LogicException(sprintf('Category key "%s" has another segment.', $segment->getKey()));
		}

		$this->segments[] = $segment;
		$this->usedCategoryKeys[] = $segment->getKey();
	}

	/**
	 * @return CategorySegment[]
	 */
	public function getSegments(): array
	{
		return $this->segments;
	}

}
