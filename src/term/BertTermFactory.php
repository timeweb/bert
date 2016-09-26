<?php
namespace bert\term;

use bert\parser\BertProtocol;
use bert\parser\BertResource;

class BertTermFactory
{
    /**
     * @param BertResource $bertResource
     * @return ConcreteTermBuilderInterface
     */
    public static function builder(BertResource $bertResource)
    {
        $termCode = $bertResource->readChar();
        switch ($termCode) {
            case BertProtocol::MAP_EXT:
                return new MapTermBuilder();
            case BertProtocol::ATOM_EXT:
                return new AtomTermBuilder();
            case BertProtocol::INTEGER_EXT:
                return new IntegerTermBuilder();
            case BertProtocol::SMALL_INTEGER_EXT:
                return new SmallIntegerTermBuilder();
            case BertProtocol::BINARY_EXT:
                return new BinaryTermBuilder();
            default:
                throw new \UnexpectedValueException('bad term code ' . $termCode);
        }
    }
}
