<?php

namespace Mg\TradeTracker\Helpers\Parser;

/**
 * @author Mohamed Ghareeb <mohamedigm@gmail.com>
 */
class CategoryParser extends TextParser
{

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    /**
     * parse xml node
     * 
     * @param \XMLReader $xml
     */
    public function parse($xml)
    {
        $this->data[$this->sanitize($xml->getAttribute('path'))] = $this->sanitize($xml->readString());
    }

    /**
     * get data parsed
     * 
     * @return array
     */
    public function getData()
    {
        return ['category' => $this->data];
    }

}
