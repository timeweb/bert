<?php
namespace bert\term;

class SmallIntegerTerm implements TermInterface
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
