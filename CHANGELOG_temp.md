# Zmeny, ktere je treba aplikovat na stavajici pouziti

 * Zruseni zavislosti serii a segmentu na Nette\Object. Tim padem nelze pouzit magicky get/set pristup
 * Zruseni public metod BaseLineChart::getDecimals(), BaseLineChart::getValueSuffix(), LineDateTimeChart::getMinTime(), LineDateTimeChart::getMaxTime()
 * Zruseni public metody BaseLineChart::setDecimals()
 * Zruseni tridy PieSerie, metody PieChart::addSerie() a pridani metody PieChart::addSegment()
 * Zruseni metod BarChart::setShowStackSum() a BarChart::setSumFormatCallback()
 * Zruseni metod BarSerie::isSumSerie() a BarSerie::getPointLabels()


# TODO

 * Sloucit LineDate and LineDateTime a nastavovat u chartu typ
 * Zrusit BaseSerie::clear()
 * Rozdelit LineChart na LineValueChart and LineCategoryChart
