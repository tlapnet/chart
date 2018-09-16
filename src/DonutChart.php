<?php declare(strict_types = 1);

namespace Tlapnet\Chart;

use Tlapnet\Chart\Segment\DonutSegment;

class DonutChart extends AbstractChart
{

	/** @var DonutSegment[] */
	private $segments = [];

	/** @var string */
	private $title = '';

	/** @var bool */
	private $enableRatioLabel = false;

	public function addSegment(DonutSegment $segment): void
	{
		$this->segments[] = $segment;
	}

	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	public function enableRatioLabel(): void
	{
		$this->enableRatioLabel = true;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters(): array
	{
		$params = parent::getTemplateParameters();
		$params['title'] = $this->title;
		$params['segments'] = $this->segments;
		$params['enableRatioLabel'] = $this->enableRatioLabel;

		return $params;
	}

}
