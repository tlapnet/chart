<?php

namespace Tlapnet\Nette\Chart;



abstract class BaseChart extends \Tlapnet\Nette\Control\BaseJsControl
{
	
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
		$t->chartId = $this->getUniqueControlId();
		$t->width = $this->width;
		$t->height = $this->height;
		
		$t->render();
		$this->afterRender();
	}
}
