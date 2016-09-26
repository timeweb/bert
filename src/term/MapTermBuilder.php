<?php
namespace bert\term;

use bert\parser\BertResource;

class MapTermBuilder implements ConcreteTermBuilderInterface
{
    /**
     * @var TermInterface
     */
    private $term;

    public function __construct()
    {
        $this->term = new MapTerm();
    }

    public function build(BertResource $bertResource)
    {
        $arity = $bertResource->readUnsignedLong();
        for ($i = 0, $data = []; $i < $arity; $i++) {
            $keyTermFactory = BertTermFactory::builder($bertResource);
            $key = $keyTermFactory->build($bertResource);
            $valueTermFactory = BertTermFactory::builder($bertResource);
            $value = $valueTermFactory->build($bertResource);
            $data[$key->getValue()] = $value->getValue();
        }
        $this->term->setValue($data);

        return $this->term;
    }
}
