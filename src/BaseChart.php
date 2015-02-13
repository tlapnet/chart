<?php

namespace Tlapnet\Nette\Chart;



abstract class BaseChart extends \Nette\Application\UI\Control
{

	/** @var string CSS value */
	private static $rendersCount = 0;

	/** @var array */
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
		$t->setFile($this->getTemplateFile());

		$t->series = $this->series;
		$t->chartId = 'tlapnet-nette-chart-' . self::$rendersCount++;
		$t->width = $this->width;
		$t->height = $this->height;
		
		$t->render();
	}


	private function getTemplateFile()
	{
		$classRefl  = new \ReflectionClass($this);
		$classDir   = dirname($classRefl->getFileName());
		$classShort = $classRefl->getShortName();

		return "$classDir/templates/jqplot/$classShort.phtml";
	}


	/**
	 */
	protected function beforeRender()
	{
	}
}
