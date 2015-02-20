<?php

namespace Tlapnet\Nette\Chart;


abstract class BaseLineChart extends BaseChart
{


	/** @var string */
	private $valueSuffix = '';

	/** @var string */
	private $decimals = 0;


	/**
	 * @param string $decimals
	 */
	public function setDecimals($decimals)
	{
		$this->decimals = $decimals;
	}


	/**
	 * @return string
	 */
	public function getDecimals()
	{
		return $this->decimals;
	}


	/**
	 * @param string $valueSuffix
	 */
	public function setValueSuffix($valueSuffix)
	{
		$this->valueSuffix = (string)$valueSuffix;
	}


	/**
	 * @return string
	 */
	public function getValueSuffix()
	{
		return $this->valueSuffix;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params = parent::getTemplateParameters();
		$params['valueSuffix'] = $this->valueSuffix;
		$params['decimals'] = $this->decimals;

		return $params;
	}

}
