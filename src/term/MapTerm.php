<?php
namespace bert\term;

class MapTerm implements ArrayTermInterface
{
    /**
     * @var array
     */
    private $data = [];

    public function setValue($value)
    {
        $this->data = $value;
    }

    /**
     * @return array
     */
    public function getValue()
    {
        return $this->data;
    }
}
