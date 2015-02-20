<?php

namespace Tlapnet\Nette\Chart;



class PieChart extends BaseChart
{
	
	const TYPE_PIE = 'pie';
	const TYPE_DONUT = 'donut';

	const DATA_LABEL_TYPE_VALUE = 'value';
	const DATA_LABEL_TYPE_PERCENTAGE = 'percent';

	
	
	/** @var string */
	private $type = self::TYPE_PIE;
	
	/** @var string */
	private $dataLabelType = self::DATA_LABEL_TYPE_PERCENTAGE;
	

	
	
	
	/**
	 * @param Serie\PieSerie $serie 
	 */
	public function addSerie(Serie\PieSerie $serie)
	{
		$this->series[] = $serie;
	}
	
	
	
	public function setDataLabelType($type)
	{
		static $allowedTypes = array(
			self::DATA_LABEL_TYPE_VALUE,
			self::DATA_LABEL_TYPE_PERCENTAGE,
		);
		
		if (!in_array($type, $allowedTypes, true)) {
			throw new \LogicException("Undefined data label type '$type'.");
		}
		
		$this->dataLabelType = $type;
	}


	/**
	 * {@inheritdoc}
	 */
	protected function getTemplateParameters()
	{
		$params = parent::getTemplateParameters();
		$params['type'] = count($this->series) > 1 ? self::TYPE_DONUT : $this->type;
		$params['dataLabelType'] = $this->dataLabelType;

		return $params;
	}

}
