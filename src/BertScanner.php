<?php
namespace bert;

use bert\parser\BertParserFactory;
use bert\term\TermInterface;

class BertScanner
{
    /**
     * @param string $stream
     * @return TermInterface
     */
    public static function scan($stream)
    {
        $parserFactory = new BertParserFactory();
        $parser = $parserFactory->buildParser($stream);
        return $parser->parse();
    }
}
