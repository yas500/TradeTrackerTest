<?php

namespace Mg\TradeTracker\Helpers;

use Illuminate\Support\Collection;

/**
 * @author Mohamed Ghareeb <mohamedigm@gmail.com>
 */
class ProductsParser
{

    /**
     *
     * @var \XMLReader
     */
    protected $xml;

    /**
     * array map of parsers
     * 
     * @var array
     */
    protected $parsers = [];

    public function __construct($url)
    {
        $this->xml = new \XMLReader();
        $this->xml->open($url);
    }

    /**
     * add parser object by tag
     * 
     * @param Parser\BaseParser $parser
     * @return $this
     */
    public function addParser($parser)
    {
        $this->parsers[$parser->getTagName()][] = $parser;
        return $this;
    }

    /**
     * get products data collection
     * 
     * @param int $limit
     * @param int $skip
     * @return Collection
     */
    public function getData($limit = 50, $skip = 0)
    {
        // get limited data
        $data = $this->fetchData($limit, $skip);
        return new Collection($data);
    }

    /**
     * stream read with callback function
     * 
     * @param \Closure $callback
     */
    public function stream($callback)
    {
        $x = 0;

        // start read 
        while ($this->xml->read()) {
            // parse by element product as start & end
            if ($this->xml->nodeType == \XMLReader::ELEMENT) {
                if ($this->xml->name == 'product' && $x > 0) {
                    call_user_func($callback, $this->loadParsersData());
                } else if (array_key_exists($this->xml->name, $this->parsers)) {
                    /* @var $parser BaseParser */
                    foreach ($this->parsers[$this->xml->name] as $parser) {
                        $parser->parse($this->xml);
                    }
                }
            } else if ($this->xml->nodeType == \XMLReader::END_ELEMENT && $this->xml->name == 'product') {
                $x++;
            }
        }
    }

    /**
     * close xml instance
     */
    public function close()
    {
        $this->xml->close();
    }

    /**
     * get product parser object with default parsers
     * 
     * @param type $url
     * @return \Mg\TradeTracker\Helpers\ProductsParser
     */
    public static function withDefaults($url)
    {
        $parser = new ProductsParser($url);

        $parser->addParser(new Parser\TextParser('productID'))
                ->addParser(new Parser\TextParser('name'))
                ->addParser(new Parser\TextParser('description'))
                ->addParser(new Parser\UrlParser('productURL'))
                ->addParser(new Parser\UrlParser('imageURL'))
                ->addParser(new Parser\CategoryParser('category'))
                ->addParser(new Parser\PriceParser('price'))
                ->addParser(new Parser\FieldParser('field','brand'))
                ->addParser(new Parser\FieldParser('field','producttype'))
                ->addParser(new Parser\FieldParser('field','SKU'))
                ->addParser(new Parser\FieldParser('field','stock'))
                ->addParser(new Parser\FieldParser('field','imageURL_large'));

        return $parser;
    }

    /**
     * fetch xml data
     * 
     * @param type $limit
     * @param type $skip
     */
    protected function fetchData($limit, $skip)
    {
        $data = [];
        $x = 0;
        $count = 0;

        // start read 
        while ($this->xml->read()) {
            // parse by element product as start & end
            if ($this->xml->nodeType == \XMLReader::ELEMENT) {
                if ($this->xml->name == 'product' && $x > $skip) {
                    $data[] = $this->loadParsersData();
                } else if (array_key_exists($this->xml->name, $this->parsers) && $x >= $skip) {
                    /* @var $parser BaseParser */
                    foreach ($this->parsers[$this->xml->name] as $parser) {
                        $parser->parse($this->xml);
                    }
                }
            } else if ($this->xml->nodeType == \XMLReader::END_ELEMENT && $this->xml->name == 'product') {
                if ($x >= $skip) {
                    $count++;
                }

                $x++;
            }

            if ($limit && $count > $limit) {
                break;
            }
        }

        return $data;
    }

    /**
     * get parsers data & flush
     */
    protected function loadParsersData()
    {
        $info = [];
        foreach ($this->parsers as $parsers_list) {
            /* @var $parser BaseParser */
            foreach ($parsers_list as $parser) {
                $info = array_merge($info, $parser->getData());
                $parser->flush();
            }
        }

        return $info;
    }

}
