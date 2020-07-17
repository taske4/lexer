<?php

namespace taske;


interface LexerInterface
{
    public function __construct(array $arContents);

    public function lexer(): array;
}