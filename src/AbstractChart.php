<?php

namespace Tlapnet\Chart;

use ReflectionClass;


/**
 * @author Ludek Benedik
 */
abstract class AbstractChart
{
	/** @var string CSS value */
	private static $rendersCount = 0;

	/** @var string CSS value */
	private $width = '100%';

	/** @var string CSS value */
	private $height = 'auto';


	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->render();
	}


	/**
	 * @return string
	 */
	public function render()
	{
		extract($this->getTemplateParameters());
		ob_start();
		require $this->getTemplateFile();

		return ob_get_clean();
	}


	/**
	 * @return array
	 */
	protected function getTemplateParameters()
	{
		return [
			'chartId' => 'tlapnet-chart-' . self::$rendersCount++,
			'width'   => $this->width,
			'height'  => $this->height,
		];
	}


	/**
	 * @return string
	 */
	private function getTemplateFile()
	{
		$classRefl  = new ReflectionClass($this);
		$classDir   = dirname($classRefl->getFileName());
		$classShort = $classRefl->getShortName();

		$file = "$classDir/templates/c3/$classShort.html.php";

		if (!file_exists($file)) {
			throw new \LogicException(sprintf('Template file for "%s" not found.', $classShort));
		}

		return $file;
	}
}
