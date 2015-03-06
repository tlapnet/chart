<?php

namespace Tlapnet\Nette\Chart\Serie;


/**
 * @author Ludek Benedik
 */
abstract class BaseSerie
{
	/** @var array */
	protected $segments = array();

	/** @var null|string Css color */
	private $color = null;

	/** @var null|string */
	private $title = null;


	/**
	 * @param string $title
	 * @param string|null $color
	 */
	function __construct($title, $color = null)
	{
		$this->title = (string) $title;
		$this->color = $color === null ? null : (string) $color;
	}


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
	 * @return null|string
	 */
	public function getColor()
	{
		return $this->color;
	}
}
