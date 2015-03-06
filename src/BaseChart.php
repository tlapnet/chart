<?php

namespace Tlapnet\Chart;

use ReflectionClass;
use Tlapnet\Chart\Serie\BaseSerie;


/**
 * @author Ludek Benedik
 */
abstract class BaseChart extends \Nette\Application\UI\Control
{
	/** @var string CSS value */
	private static $rendersCount = 0;

	/** @var BaseSerie[] */
	protected $series = array();

	/** @var string CSS value */
	private $width = '100%';

	/** @var string CSS value */
	private $height = 'auto';


	/**
	 * todo: Remove after make Chart Module
	 * Nette control
	 */
	public function render()
	{
		$this->beforeRender();
		$this->renderOldTemplate();

		$c3Template = $this->getTemplateFile('c3');

		if (file_exists($c3Template)) {
			echo $this->renderFile($c3Template, $this->getTemplateParameters());
		}
	}


	/**
	 * todo: Delete after remove jqplot
	 */
	private function renderOldTemplate()
	{
		$t = $this->getTemplate();
		$t->setFile($this->getTemplateFile('jqplot'));

		foreach ($this->getTemplateParameters() as $key => $value) {
			$t->$key = $value;
		}

		$t->render();
	}


	/**
	 * @param string $file
	 * @param array $parameters
	 * @return string
	 */
	private function renderFile($file, array $parameters)
	{
		extract($parameters);
		ob_start();
		require $file;
		return ob_get_clean();
	}


	/**
	 * @param string $type
	 * @return string
	 */
	private function getTemplateFile($type)
	{
		$classRefl  = new ReflectionClass($this);
		$classDir   = dirname($classRefl->getFileName());
		$classShort = $classRefl->getShortName();
		$ext        = $type === 'c3' ? 'html.php' : 'phtml';

		return "$classDir/templates/$type/$classShort.$ext";
	}


	/**
	 * @return array
	 */
	protected function getTemplateParameters()
	{
		return [
			'chartId' => 'tlapnet-nette-chart-' . self::$rendersCount++,
			'width'   => $this->width,
			'height'  => $this->height,
			'series'  => $this->series,
		];
	}


	/**
	 */
	protected function beforeRender()
	{
	}
}
