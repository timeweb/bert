<?php
namespace bert\parser;

use bert\term\BertTermFactory;

class BertParser131 extends AbstractBertParser
{
    const UNCOMPRESSED_DATA_OFFSET = 2;
    const COMPRESSED_DATA_OFFSET = 6;
    const MIN_STREAM_LENGTH = self::UNCOMPRESSED_DATA_OFFSET;

    public function parse()
    {
        $termBuilder = BertTermFactory::builder($this->resource);
        return $termBuilder->build($this->resource);
    }

    public function validateStream()
    {
        if (strlen($this->rawStream) < self::MIN_STREAM_LENGTH) {
            $msg = sprintf('Min stream length is %s.', self::MIN_STREAM_LENGTH);
            throw new \LengthException($msg);
        }
    }

    public function initResource()
    {
        parent::initResource();

        if (ord($this->rawStream[BertProtocol::COMPRESSED_BYTE_POS]) == BertProtocol::COMPRESSED_FLAG) {
            $stream = substr($this->rawStream, self::COMPRESSED_DATA_OFFSET);
            $this->resource->set(zlib_decode($stream));
        } else {
            $stream = substr($this->rawStream, self::UNCOMPRESSED_DATA_OFFSET);
            $this->resource->set($stream);
        }
    }
}
