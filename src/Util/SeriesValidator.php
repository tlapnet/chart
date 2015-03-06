<?php

namespace Tlapnet\Chart\Util;

use LogicException;
use Tlapnet\Chart\Serie\BaseSerie;


/**
 * @author Ludek Benedik
 */
class SeriesValidator
{
	/**
	 * @param BaseSerie[] $series
	 * @param callable $getXValueCallback function($segment): mixed
	 */
	public static function assertXSegmentEquality(array $series, callable $getXValueCallback)
	{
		$firstSerieSegmentKeyPositions = null;

		foreach ($series as $serie) {
			$segments = $serie->getSegments();

			if ($firstSerieSegmentKeyPositions === null) {
				$firstSerieSegmentKeyPositions = array();

				foreach ($segments as $position => $segment) {
					$x = $getXValueCallback($segment);
					$firstSerieSegmentKeyPositions[$x] = $position;
				}

				if (count($segments) !== count($firstSerieSegmentKeyPositions)) {
					throw new LogicException("Segments in first serie doesn't have unique titles.");
				}
				continue;
			}

			if (count($segments) !== count($firstSerieSegmentKeyPositions)) {
				throw new LogicException("Serie '{$serie->getTitle()}' doesn't have same number of segments as first serie or doesn't have unigue titles.");
			}

			foreach ($segments as $position => $segment) {
				$x = $getXValueCallback($segment);

				if (!isset($firstSerieSegmentKeyPositions[$x])) {
					throw new LogicException("Serie '{$serie->getTitle()}' doesn't have same titles as first serie.");
				}

				if ($position !== $firstSerieSegmentKeyPositions[$x]) {
					throw new LogicException("Serie '{$serie->getTitle()}' doesn't have same titles positions as first serie.");
				}
			}
		}
	}
}
