<?php

namespace Tlapnet\Chart;

use LogicException;
use Tlapnet\Chart\Segment\CategorySegment;
use Tlapnet\Chart\Serie\CategorySerie;


/**
 * @author Ludek Benedik
 */
class CategoryChart extends AbstractChart
{
	/** @var Category[] */
	private $categories;

	/** @var string[] */
	private $categoryKeys;

	/** @var CategorySerie[] */
	private $series = [];

	/** @var array serie_index => group */
	private $groups = [];


	/**
	 * @param Category[] $categories
	 */
	function __construct(array $categories)
	{
		$this->categories   = $categories;
		$this->categoryKeys = [];

		foreach ($this->categories as $category) {
			$this->categoryKeys[] = $category->getKey();
		}

		$this->assertCategoryKeyUniqueness();
	}


	/**
	 * @throws LogicException When category keys are not unique
	 */
	private function assertCategoryKeyUniqueness()
	{
		$uniqueKeys = array_unique($this->categoryKeys);

		if (count($this->categoryKeys) !== count($uniqueKeys)) {
			throw new LogicException("Category keys have to by unigue.");
		}
	}


	/**
	 * @param CategorySerie $serie
	 * @param mixed $group Valid PHP array key. If NULL then serie is ungrouped
	 */
	public function addSerie(CategorySerie $serie, $group = null)
	{
		$categorizedSegments = $this->getCategorizedSegments($serie);
		$normalizedSerie     = new CategorySerie($serie->getType(), $serie->getTitle(), $serie->getColor());

		foreach ($this->categoryKeys as $key) {
			if (isset($categorizedSegments[$key])) {
				$normalizedSerie->addSegment($categorizedSegments[$key]);
			}
			else {
				$normalizedSerie->addSegment(new CategorySegment($key, 0));
			}
		}

		$this->series[] = $normalizedSerie;
		$this->groups[] = $group;
	}


	/**
	 * @param CategorySerie $serie
	 * @return array key => CategorySegment
	 * @throws LogicException When any serie segment has undefined category
	 */
	private function getCategorizedSegments(CategorySerie $serie)
	{
		$categorizedSegments = [];

		foreach ($serie->getSegments() as $segment) {
			if (!in_array($segment->getKey(), $this->categoryKeys)) {
				throw new LogicException(sprintf(
					'Serie "%s" has segment with undefined category key "%s".', $serie->getTitle(), $segment->getKey()
				));
			}

			$categorizedSegments[$segment->getKey()] = $segment;
		}

		return $categorizedSegments;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params               = parent::getTemplateParameters();
		$params['categories'] = $this->categories;
		$params['series']     = $this->series;
		$params['groups']     = $this->groups;

		return $params;
	}
}
