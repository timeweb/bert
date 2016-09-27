<?php
namespace bert\term;

interface ArrayTermInterface extends TermInterface
{
    /**
     * @return \Traversable
     */
    public function getValue();
}
