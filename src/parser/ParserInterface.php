<?php
namespace bert\parser;

interface ParserInterface
{
    /**
     * @param string $data
     */
    public function __construct($data);

    /**
     * @return mixed
     */
    public function parse();

    /**
     * @throws \LogicException
     * @return void
     */
    public function validateStream();
    public function initResource();
}
