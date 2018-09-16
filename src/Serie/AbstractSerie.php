<?php declare(strict_types = 1);

namespace Tlapnet\Chart\Serie;

use InvalidArgumentException;

abstract class AbstractSerie
{

	public const AREA_LINE = 'area_line';

	public const AREA_SPLINE = 'area_spline';

	public const AREA_STEP = 'area_step';

	public const BAR = 'bar';

	public const LINE = 'line';

	public const SPLINE = 'spline';

	public const STEP = 'step';

	public const TYPES = [
		self::AREA_LINE,
		self::AREA_SPLINE,
		self::AREA_STEP,
		self::BAR,
		self::LINE,
		self::SPLINE,
		self::STEP,
	];

	/** @var string */
	private $type;

	/** @var string|null Css color */
	private $color;

	/** @var string */
	private $title;

	/**
	 * @see Color names http://www.w3schools.com/cssref/css_colornames.asp
	 * @param string      $type  bar|line
	 * @param string|null $color Valid CSS color
	 */
	public function __construct(string $type, string $title, ?string $color = null)
	{
		$this->assertType($type);

		$this->type = $type;
		$this->title = $title;
		$this->color = $color;
	}

	/**
	 * @throws InvalidArgumentException When type is undefined
	 */
	private function assertType(string $type): void
	{
		if (!in_array($type, self::TYPES, true)) {
			throw new InvalidArgumentException(sprintf('Undefined type "%s".', $type));
		}
	}

	public function getType(): string
	{
		return $this->type;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getColor(): ?string
	{
		return $this->color;
	}

}
