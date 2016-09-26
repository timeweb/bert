<?php
namespace bert\parser;

class BertResource
{
    const CHAR_LENGTH = 1;
    const UNSIGNED_SHORT_LENGTH = 2;
    const UNSIGNED_LONG_LENGTH = 4;

    /**
     * @var resource
     */
    protected $resource;

    public function __construct()
    {
        $this->resource = fopen('php://memory', 'w+');
    }

    public function __destruct()
    {
        is_resource($this->resource) && fclose($this->resource);
    }

    public function set($data)
    {
        fwrite($this->resource, $data);
        rewind($this->resource);
    }

    /**
     * @param integer $position
     * @return integer
     */
    private function toPosition($position)
    {
        return fseek($this->resource, $position);
    }

    /**
     * @return mixed
     */
    public function readChar()
    {
        return $this->read(self::CHAR_LENGTH, 'C');
    }

    /**
     * @return integer
     */
    public function readUnsignedShort()
    {
        return $this->read(self::UNSIGNED_SHORT_LENGTH, 'n');
    }

    /**
     * @return integer
     */
    public function readUnsignedLong()
    {
        return $this->read(self::UNSIGNED_LONG_LENGTH, 'N');
    }

    /**
     * @param integer $numberOfBytes
     * @return string
     */
    public function readAscii($numberOfBytes)
    {
        return fread($this->resource, $numberOfBytes);
    }

    /**
     * @param integer $numberOfBytes
     * @param string $format
     * @return mixed
     */
    private function read($numberOfBytes, $format)
    {
        $data = fread($this->resource, $numberOfBytes);
        return unpack($format, $data)[1];
    }
}
