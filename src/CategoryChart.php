<?php declare(strict_types = 1);

namespace Tlapnet\Chart;

use LogicException;
use Tlapnet\Chart\Segment\CategorySegment;
use Tlapnet\Chart\Serie\CategorySerie;

class CategoryChart extends AbstractChart
{

	/** @var Category[] */
	private $categories;

	/** @var string[] */
	private $categoryKeys;

	/** @var CategorySerie[] */
	private $series = [];

	/** @var mixed[] serie_index => group */
	private $groups = [];

	/**
	 * @param Category[] $categories
	 */
	public function __construct(array $categories)
	{
		$this->categories = $categories;
		$this->categoryKeys = [];

		foreach ($this->categories as $category) {
			$this->categoryKeys[] = $category->getKey();
		}

		$this->assertCategoryKeyUniqueness();
	}

	private function assertCategoryKeyUniqueness(): void
	{
		$uniqueKeys = array_unique($this->categoryKeys);

		if (count($this->categoryKeys) !== count($uniqueKeys)) {
			throw new LogicException('Category keys have to be unique.');
		}
	}

	/**
	 * @param mixed $group Valid PHP array key. If NULL then serie is ungrouped
	 */
	public function addSerie(CategorySerie $serie, $group = null): void
	{
		$categorizedSegments = $this->getCategorizedSegments($serie);
		$normalizedSerie = new CategorySerie($serie->getType(), $serie->getTitle(), $serie->getColor());

		foreach ($this->categoryKeys as $key) {
			if (isset($categorizedSegments[$key])) {
				$normalizedSerie->addSegment($categorizedSegments[$key]);
			} else {
				$normalizedSerie->addSegment(new CategorySegment($key, 0));
			}
		}

		$this->series[] = $normalizedSerie;
		$this->groups[] = $group;
	}

	/**
	 * @return CategorySegment[]
	 * @throws LogicException When any serie segment has undefined category
	 */
	private function getCategorizedSegments(CategorySerie $serie): array
	{
		$categorizedSegments = [];

		foreach ($serie->getSegments() as $segment) {
			if (!in_array($segment->getKey(), $this->categoryKeys, true)) {
				throw new LogicException(sprintf(
					'Serie "%s" has segment with undefined category key "%s".',
					$serie->getTitle(),
					$segment->getKey()
				));
			}

			$categorizedSegments[$segment->getKey()] = $segment;
		}

		return $categorizedSegments;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters(): array
	{
		$params = parent::getTemplateParameters();
		$params['categories'] = $this->categories;
		$params['series'] = $this->series;
		$params['groups'] = $this->groups;

		return $params;
	}

}
