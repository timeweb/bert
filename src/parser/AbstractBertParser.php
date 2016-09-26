<?php
namespace bert\parser;

abstract class AbstractBertParser implements ParserInterface
{
    /**
     * @var string
     */
    protected $rawStream;
    /**
     * @var BertResource
     */
    protected $resource;

    /**
     * @param string $data
     */
    public function __construct($data)
    {
        $this->rawStream = $data;
        $this->validateStream();
        $this->initResource();
    }

    abstract public function validateStream();

    public function initResource()
    {
        $this->resource = new BertResource();
    }

    /**
     * @return mixed
     */
    abstract public function parse();
}
