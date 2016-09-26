<?php
namespace bert\parser;

class BertParserFactory
{
    const V_131 = 131;

    /**
     * @param string $stream
     * @return ParserInterface
     * @throws \UnexpectedValueException
     */
    public function buildParser($stream)
    {
        switch (ord($stream[BertProtocol::VERSION_BYTE_POS])) {
            case self::V_131:
                return new BertParser131($stream);
                break;
            default:
                $allowedVersions = implode(',', $this->getAllowedVersions());
                $msg = sprintf("Unexpected external term format version. [%s] allowed.", $allowedVersions);
                throw new \UnexpectedValueException($msg);
        }
    }

    /**
     * @return array
     */
    public function getAllowedVersions()
    {
        return [self::V_131];
    }
}
