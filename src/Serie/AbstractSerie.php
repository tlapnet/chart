<?php

namespace Tlapnet\Chart\Serie;

use InvalidArgumentException;


/**
 * @author Ludek Benedik
 */
abstract class AbstractSerie
{
	const AREA_LINE   = 'area_line';
	const AREA_SPLINE = 'area_spline';
	const AREA_STEP   = 'area_step';
	const BAR         = 'bar';
	const LINE        = 'line';
	const SPLINE      = 'spline';
	const STEP        = 'step';


	/** @var string */
	private $type;

	/** @var null|string Css color */
	private $color;

	/** @var string */
	private $title;


	/**
	 * @see Color names http://www.w3schools.com/cssref/css_colornames.asp
	 *
	 * @param string $type bar|line
	 * @param string $title
	 * @param string|null $color Valid CSS color
	 */
	function __construct($type, $title, $color = null)
	{
		$this->assertType($type);

		$this->type  = (string) $type;
		$this->title = (string) $title;
		$this->color = $color === null ? null : (string) $color;
	}


	/**
	 * @param string $type
	 * @throws InvalidArgumentException When type is undefined
	 */
	private function assertType($type)
	{
		static $allowedTypes = [self::AREA_LINE, self::AREA_SPLINE, self::AREA_STEP, self::BAR, self::LINE, self::SPLINE, self::STEP];

		if (!in_array($type, $allowedTypes)) {
			throw new InvalidArgumentException(sprintf('Undefined type "%s".', $type));
		}
	}


	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}


	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}


	/**
	 * @return string|null
	 */
	public function getColor()
	{
		return $this->color;
	}
}
