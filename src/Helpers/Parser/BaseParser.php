<?php

namespace Mg\TradeTracker\Helpers\Parser;

/**
 * @author Mohamed Ghareeb <mohamedigm@gmail.com>
 */
interface BaseParser
{

    /**
     * get xml tag name
     */
    function getTagName();

    /**
     * parse xml node
     * 
     * @param \XMLReader $xml
     */
    function parse($xml);

    /**
     * get array data
     */
    function getData();

    /**
     * flush current data
     */
    function flush();
}
