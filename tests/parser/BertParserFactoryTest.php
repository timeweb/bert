<?php
namespace bert\tests\parser;

use bert\parser\BertParserFactory;
use bert\parser\ParserInterface;
use PHPUnit\Framework\TestCase;

class BertParserFactoryTest extends TestCase
{
    /** @var BertParserFactory */
    private $factory;

    public function setUp()
    {
        $this->factory = new BertParserFactory();

        return parent::setUp();
    }

    public function testBuildParser()
    {
        $onlyOneVersion = pack("CC", BertParserFactory::V_131, 0);
        $this->assertInstanceOf(ParserInterface::class, $this->factory->buildParser($onlyOneVersion));
    }

    /**
     * @expectedException \LengthException
     */
    public function testBuildParserWithSmallLength()
    {
        $onlyOneVersion = pack("C", BertParserFactory::V_131);
        $this->factory->buildParser($onlyOneVersion);
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testBuildParserUnknownVersion()
    {
        $unknownVersion = '00';
        $this->factory->buildParser($unknownVersion);
    }
}
