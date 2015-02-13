<?php

namespace Tlapnet\Nette\Chart;


abstract class BaseLineChart extends BaseChart
{


	/** @var string */
	private $valueSuffix = '';

	/** @var string */
	private $decimals = 0;


	protected function beforeRender()
	{
		parent::beforeRender();
		$t              = $this->getTemplate();
		$t->valueSuffix = $this->valueSuffix;
		$t->decimals    = $this->decimals;
	}


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

}
