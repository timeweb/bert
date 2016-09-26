<?php
namespace bert\term;

use bert\parser\BertResource;

class SmallIntegerTermBuilder implements ConcreteTermBuilderInterface
{
    /**
     * @var TermInterface
     */
    private $term;

    public function __construct()
    {
        $this->term = new SmallIntegerTerm();
    }

    /**
     * @param BertResource $bertResource
     * @return SmallIntegerTerm
     */
    public function build(BertResource $bertResource)
    {
        $value = $bertResource->readChar();
        $this->term->setValue($value);

        return $this->term;
    }
}
