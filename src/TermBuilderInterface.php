<?php
namespace bert;

interface TermBuilderInterface
{
    public function genList();
    public function genMap();
    public function genBinary();
}
