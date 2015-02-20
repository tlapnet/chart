<?php

namespace Tlapnet\Nette\Chart\Segment;



abstract class BaseTitleValueSegment
{
	
	/** @var string */
	private $title;
	
	/** @var float */
	private $value;
	
	
	
	/**
	 * @param string $title
	 * @param float $value 
	 */
	function __construct($title, $value)
	{
		$this->title = (string) $title;
		$this->value = (float) $value;
	}
	
	
	
	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	
	
	/**
	 * @return float
	 */
	public function getValue()
	{
		return $this->value;
	}

}
