<?php
namespace bert\term;

use bert\parser\BertResource;

class IntegerTermBuilder implements ConcreteTermBuilderInterface
{
    /**
     * @var TermInterface
     */
    private $term;

    public function __construct()
    {
        $this->term = new IntegerTerm();
    }

    /**
     * @param BertResource $bertResource
     * @return IntegerTerm
     */
    public function build(BertResource $bertResource)
    {
        $value = $bertResource->readUnsignedLong();
        $this->term->setValue($value);

        return $this->term;
    }
}
