<?php
namespace bert\term;

use bert\parser\BertResource;

class BinaryTermBuilder implements ConcreteTermBuilderInterface
{
    /**
     * @var TermInterface
     */
    private $term;

    public function __construct()
    {
        $this->term = new BinaryTerm();
    }

    /**
     * @param BertResource $bertResource
     * @return BinaryTerm
     */
    public function build(BertResource $bertResource)
    {
        $nameLength = $bertResource->readUnsignedLong();
        $value = $bertResource->readAscii($nameLength);
        $this->term->setValue($value);

        return $this->term;
    }
}
