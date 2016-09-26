<?php
namespace bert\parser;

class BertProtocol
{
    const VERSION_BYTE_POS = 0;
    const COMPRESSED_BYTE_POS = 1;

    const COMPRESSED_FLAG = 80;
    const SMALL_INTEGER_EXT = 97;
    const INTEGER_EXT = 98;
    const ATOM_EXT = 100;
    const BINARY_EXT = 109;
    const MAP_EXT = 116;
}
