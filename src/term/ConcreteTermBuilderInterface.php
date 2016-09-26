<?php
namespace bert\term;

use bert\parser\BertResource;

interface ConcreteTermBuilderInterface
{

    /**
     * @param BertResource $bertResource
     * @return TermInterface
     */
    public function build(BertResource $bertResource);
}
