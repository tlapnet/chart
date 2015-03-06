<?php

namespace Tlapnet\Chart;


/**
 * @author Ludek Benedik
 */
class Category
{
	/** @var string */
	private $key;

	/** @var string */
	private $title;


	/**
	 * @param string $key
	 * @param string $title
	 */
	public function __construct($key, $title)
	{
		$this->key   = (string) $key;
		$this->title = (string) $title;
	}


	/**
	 * @return string
	 */
	public function getKey()
	{
		return $this->key;
	}


	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}
}
