<?php
namespace bert\term;

class IntegerTerm implements TermInterface
{
    /**
     * @var integer
     */
    private $value;

    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }
}
