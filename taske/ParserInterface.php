<?php


namespace taske;


interface ParserInterface
{
    public function __construct(string $source);

    public function parse();

    public function get(): array;
}