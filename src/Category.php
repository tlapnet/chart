<?php declare(strict_types = 1);

namespace Tlapnet\Chart;

class Category
{

	/** @var string */
	private $key;

	/** @var string */
	private $title;

	public function __construct(string $key, string $title)
	{
		$this->key = $key;
		$this->title = $title;
	}

	public function getKey(): string
	{
		return $this->key;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

}
