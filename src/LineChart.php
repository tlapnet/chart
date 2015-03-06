<?php

namespace Tlapnet\Chart;

use Tlapnet\Chart\Serie\LineSerie;
use Tlapnet\Chart\Util\SeriesValidator;


/**
 * @author Ludek Benedik
 */
class LineChart extends BaseLineChart
{
	private $isXAxisCategorized;


	/**
	 * @param LineSerie $serie
	 */
	public function addSerie(LineSerie $serie)
	{
		$this->series[] = $serie;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function beforeRender()
	{
		$this->isXAxisCategorized = false;

		foreach ($this->series as $serie) {
			foreach ($serie->getSegments() as $segment) {
				if (!is_numeric($segment->getX())) {
					SeriesValidator::assertXSegmentEquality($this->series, function($segment) {
						return $segment->getX();
					});
					$this->isXAxisCategorized = true;
					break;
				}
			}
		}

		parent::beforeRender();
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params                       = parent::getTemplateParameters();
		$params['isXAxisCategorized'] = $this->isXAxisCategorized;

		return $params;
	}
}
