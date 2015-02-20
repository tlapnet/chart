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

		$t->series = $this->series;
		$t->width = $this->width;
		$t->height = $this->height;

		$t->setFile($this->getTemplateFile('jqplot'));
		$t->chartId = 'tlapnet-nette-chart-' . self::$rendersCount++;
		$t->render();

		$c3Template = $this->getTemplateFile('c3');
		if (file_exists($c3Template)) {
			$t->setFile($this->getTemplateFile('c3'));
			$t->chartId = 'tlapnet-nette-chart-' . self::$rendersCount++;
			$t->render();
		}
	}


	private function getTemplateFile($type)
	{
		$classRefl  = new \ReflectionClass($this);
		$classDir   = dirname($classRefl->getFileName());
		$classShort = $classRefl->getShortName();

		return "$classDir/templates/$type/$classShort.phtml";
	}


	/**
	 */
	protected function beforeRender()
	{
	}
}
