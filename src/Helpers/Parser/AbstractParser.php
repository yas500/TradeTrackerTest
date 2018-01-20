<?php

namespace Mg\TradeTracker\Helpers\Parser;

/**
 * @author Mohamed Ghareeb <mohamedigm@gmail.com>
 */
abstract class AbstractParser implements BaseParser
{

    /**
     * parser tag name
     * 
     * @var string
     */
    protected $tag_name;

    /**
     * parsed data
     * 
     * @var array
     */
    protected $data = [];

    public function __construct($tag_name)
    {
        $this->tag_name = $tag_name;
    }

    /**
     * get xml tag name
     */
    public function getTagName()
    {
        return $this->tag_name;
    }

    /**
     * parse xml node
     * 
     * @param \XMLReader $xml
     */
    public function parse($xml)
    {
        $this->data[$this->getTagName()] = $this->sanitize($xml->readString());
    }

    /**
     * get data parsed
     * 
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * flush current data
     */
    public function flush()
    {
        $this->data = [];
    }

    /**
     * sanitize string
     */
    protected function sanitize($text)
    {
        return filter_var($text, FILTER_SANITIZE_STRING);
        /* return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text); */
    }

}
