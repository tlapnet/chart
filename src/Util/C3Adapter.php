<?php

namespace Tlapnet\Chart\Util;

use Tlapnet\Chart\Serie\AbstractSerie;


/**
 * @author Ludek Benedik
 */
class C3Adapter
{
	/**
	 * @param string $libraryType
	 * @return string
	 */
	public function getSerieType($libraryType)
	{
		$bridge = [
			AbstractSerie::AREA_LINE => 'area',
		];

		if (isset($bridge[$libraryType])) {
			return $bridge[$libraryType];
		}

		return str_replace('_', '-', $libraryType);
	}
}
