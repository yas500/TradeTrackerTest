<?php

namespace Mg\TradeTracker\Helpers\Parser;

/**
 * @author Mohamed Ghareeb <mohamedigm@gmail.com>
 */
class PriceParser extends TextParser
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
        $this->data['currency'] = parent::sanitize($xml->getAttribute('currency'));
        $this->data[$this->getTagName()] = $this->sanitize($xml->readString());
    }

    /**
     * sanitize as number
     * 
     * @param string $text
     * @return flot
     */
    public function sanitize($text)
    {
        return filter_var($text, FILTER_SANITIZE_NUMBER_FLOAT);
    }

}
