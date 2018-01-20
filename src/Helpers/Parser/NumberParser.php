<?php

namespace Mg\TradeTracker\Helpers\Parser;

/**
 * @author Mohamed Ghareeb <mohamedigm@gmail.com>
 */
class NumberParser extends AbstractParser
{

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
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
