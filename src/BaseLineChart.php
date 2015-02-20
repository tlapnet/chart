<?php

namespace Tlapnet\Nette\Chart;


/**
 * @author Ludek Benedik
 */
abstract class BaseLineChart extends BaseChart
{
	/** @var string */
	private $valueSuffix = '';


	/**
	 * @param string $valueSuffix
	 */
	public function setValueSuffix($valueSuffix)
	{
		$this->valueSuffix = (string) $valueSuffix;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params                = parent::getTemplateParameters();
		$params['valueSuffix'] = $this->valueSuffix;

		return $params;
	}
}
