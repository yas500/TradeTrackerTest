<?php

namespace Mg\TradeTracker\Helpers\Parser;

/**
 * @author Mohamed Ghareeb <mohamedigm@gmail.com>
 */
class FieldParser extends TextParser
{
    protected $id_name;


    public function __construct($tag_name, $id_name)
    {
        parent::__construct($tag_name);
        $this->id_name= $id_name;
    }

    /**
     * parse xml node
     * 
     * @param \XMLReader $xml
     */
    public function parse($xml)
    {
        if($xml->getAttribute('name') == $this->id_name) {
            $this->data[$this->id_name] = $this->sanitize($xml->readString());
        }
    }
}
