<?php

namespace Tlapnet\Nette\Chart;


/**
 * @author Ludek Benedik
 */
abstract class BaseLineChart extends BaseChart
{
	/** @var int */
	private $decimals = 0;

	/** @var string */
	private $valueSuffix = '';


	/**
	 * @param int $decimals
	 */
	public function setDecimals($decimals)
	{
		$this->decimals = $decimals;
	}


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
		$params['decimals']    = $this->decimals;

		return $params;
	}
}
