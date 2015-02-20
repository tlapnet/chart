<?php

namespace Tlapnet\Nette\Chart;

use Tlapnet\Nette\Chart\Serie\BaseSerie;


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

	
	/*
	 * Nette control
	 */
	public function render()
	{
		$this->beforeRender();

		$t = $this->getTemplate();
		$t->setFile($this->getTemplateFile('jqplot'));

		foreach ($this->getTemplateParameters() as $key => $value) {
			$t->$key = $value;
		}

		$t->render();

		$c3Template = $this->getTemplateFile('c3');

		if (file_exists($c3Template)) {
			echo $this->renderFile($c3Template, $this->getTemplateParameters());
		}
	}


	private function renderFile($file, array $parameters)
	{
		extract($parameters);
		ob_start();
		require $file;
		return ob_get_clean();
	}


	private function getTemplateFile($type)
	{
		$classRefl  = new \ReflectionClass($this);
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
			'width' => $this->width,
			'height' => $this->height,
			'series' => $this->series,
		];
	}


	/**
	 */
	protected function beforeRender()
	{
	}
}
