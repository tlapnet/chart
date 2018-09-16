<?php declare(strict_types = 1);

namespace Tlapnet\Chart;

use LogicException;
use ReflectionClass;
use Tlapnet\Chart\Util\C3Adapter;

abstract class AbstractChart
{

	/** @var int CSS value */
	private static $rendersCount = 0;

	/** @var string CSS value */
	private $width = '100%';

	/** @var string CSS value */
	private $height = 'auto';

	/** @var string */
	private $valueSuffix = '';

	public function setValueSuffix(string $suffix): void
	{
		$this->valueSuffix = $suffix;
	}

	public function __toString(): string
	{
		return $this->render();
	}

	public function render(): string
	{
		extract($this->getTemplateParameters());
		ob_start();
		require $this->getTemplateFile();

		return (string) ob_get_clean();
	}

	/**
	 * @return mixed[]
	 */
	protected function getTemplateParameters(): array
	{
		return [
			'c3Adapter' => new C3Adapter(),
			'chartId' => 'tlapnet-chart-' . self::$rendersCount++,
			'width' => $this->width,
			'height' => $this->height,
			'valueSuffix' => $this->valueSuffix,
		];
	}

	private function getTemplateFile(): string
	{
		$classReflection = new ReflectionClass($this);
		$classDir = dirname($classReflection->getFileName());
		$classShort = $classReflection->getShortName();

		$file = sprintf('%s/templates/c3/%s.phtml', $classDir, $classShort);

		if (!file_exists($file)) {
			throw new LogicException(sprintf('Template file for "%s" not found.', $classShort));
		}

		return $file;
	}

}
