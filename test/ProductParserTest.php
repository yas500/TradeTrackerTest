<?php

namespace Mg\TradeTracker\Test;

use PHPUnit\Framework\TestCase;
use Mg\TradeTracker\Helpers\ProductsParser;

class ProductParserTest extends TestCase
{

    protected $url = 'http://localhost/tradetraker/productfeed.xml';

    public function testParser()
    {
        $data = $this->getProducts();

        $this->assertNotNull($data);
        $this->assertEquals(1, count($data));
    }

    public function testDataParser()
    {
        $data = $this->getProducts();

        foreach ($data as $array) {
            $this->assertArrayHasKey('productID', $array);
            $this->assertArrayHasKey('name', $array);
            $this->assertArrayHasKey('description', $array);
            $this->assertArrayHasKey('productURL', $array);
            $this->assertArrayHasKey('imageURL', $array);
            $this->assertArrayHasKey('category', $array);
            $this->assertArrayHasKey('price', $array);
            $this->assertArrayHasKey('brand', $array);
            $this->assertArrayHasKey('producttype', $array);
            $this->assertArrayHasKey('SKU', $array);
            $this->assertArrayHasKey('stock', $array);
            $this->assertArrayHasKey('imageURL_large', $array);
        }
    }

    /**
     * get products parsed
     * 
     * @return array
     */
    protected function getProducts()
    {
        $parser = ProductsParser::withDefaults($this->url);
        return $parser->getData(1);
    }

}
