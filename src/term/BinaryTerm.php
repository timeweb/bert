<?php
namespace bert\term;

class BinaryTerm implements TermInterface
{
    /**
     * @var string
     */
    private $value;

    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
