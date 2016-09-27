<?php
namespace bert\tests;

use bert\BertScanner;
use bert\term\ArrayTermInterface;
use bert\term\TermInterface;
use PHPUnit\Framework\TestCase;

class BertScannerTest extends TestCase
{
    const COMPRESSED_MAP = "\x83P\x00\x00\x00\xf8x\x9c-\x8e;N\xc40\x14E\xdf\x88\xcf\x10\xaai\xa6\xa0\x82\x82\x0eY\xb2\xe38\x16\x91\xe8f\r\xd01z\x1e?\x825\x8a\x1d\xd9F\xc0\x02\xd8\x03\xeb\xa1\xa1ABSe\x1dH,\x80\x04h\x8f\xce\xb9\xba\x19\x00\n\x0b\xc7\xf4\xd4\xbbHi\xed\xbc\xd9{ka$-y\x8a\x98]\xf08\xb3p\xd4cJ\x8f!\xdan\x0c\x16/\xcb\xed\xfb\xb0\xfbx\xfd\n\xc3-\xbf>\xbd\xb2\xb0\x88\xd4\xba\x94\xff\x82\x15f\x9a\xbc\x93\x92\x8b\x9aq\xc9Jy&D\xa3\xcaF\x89\x0b.\x1b\xce-\x14\xd9u\x942v\xbd\xb9\x19>\xbf-\x1c\xe4\xb0%?e\xe7\xb5\xbc\xe4\x06\xa5f5\x8a;ViA\x0c7\x9a\x98,5\x1aS)%\xa5\x1c\x1f\xfe\x06\xeb\xfc\xdc\x93\x85CC\x18)Z\xd8\x7fH\x14\xa7\x95\xf9\xc6h^\xa9Q,&\xf4\xef\xcd\xefC\xca\xce\xb7?\xc1\x1fLK";
    const COMPRESSED_ZERO_INT = "\x83a\x00";
    const COMPRESSED_ONE_INT = "\x83a\x01";

    public function testMap()
    {
        $term = BertScanner::scan(self::COMPRESSED_MAP);
        $this->assertInstanceOf(ArrayTermInterface::class, $term);
        $value = $term->getValue();
        $this->assertInternalType('array', $value);
        $this->assertEquals(63072000, $value['expires_in']);
        $this->assertEquals(1, $value['generation']);
        $this->assertInternalType('string', $value['password']);
        $this->assertEquals('2016-03-23 11:52:51+03:00', $value['registrationDate']);
        $this->assertEquals(1473761268, $value['timestamp']);
        $this->assertEquals('6390ba37-6a1f-471e-ac7e-327abb455333', $value['token']);
        $this->assertEquals('bearer', $value['token_type']);
        $this->assertEquals('cb70453', $value['user']);
        $this->assertEquals('hosting', $value['user_type']);
    }

    public function intDataProvider()
    {
        return [
            [self::COMPRESSED_ZERO_INT, 0],
            [self::COMPRESSED_ONE_INT, 1]
        ];
    }

    /**
     * @dataProvider intDataProvider
     * @param string $number
     * @param integer $expectedValue
     */
    public function testInt($number, $expectedValue)
    {
        $term = BertScanner::scan($number);
        $this->assertInstanceOf(TermInterface::class, $term);
        $this->assertEquals($expectedValue, $term->getValue());
    }
}
