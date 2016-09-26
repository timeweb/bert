<?php
namespace bert\term;

use bert\parser\BertResource;

class AtomTermBuilder implements ConcreteTermBuilderInterface
{
    /**
     * @var TermInterface
     */
    private $term;

    public function __construct()
    {
        $this->term = new AtomTerm;
    }

    /**
     * @param BertResource $bertResource
     * @return AtomTerm
     */
    public function build(BertResource $bertResource)
    {
        $nameLength = $bertResource->readUnsignedShort();
        $this->term->setValue($bertResource->readAscii($nameLength));

        return $this->term;
    }
}
