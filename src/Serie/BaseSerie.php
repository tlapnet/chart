<?php

namespace Tlapnet\Nette\Chart\Serie;


abstract class BaseSerie extends \Nette\Object
{


	/** @var array */
	protected $segments = array();

	/** @var null|string color */
	protected $color = null;

	/** @var null|string */
	private $title = null;


	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}


	/**
	 * @return array
	 */
	public function getSegments()
	{
		return $this->segments;
	}


	/**
	 */
	public function clear()
	{
		$this->segments = array();
	}


	/**
	 * @return null|string
	 */
	public function getColor()
	{
		return $this->color;
	}


	/**
	 * @param null|string $color
	 * @return static
	 */
	public function setColor($color)
	{
		$this->color = $color;
		return $this;
	}


	/**
	 * @param null|string $title
	 * @return static
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

}
