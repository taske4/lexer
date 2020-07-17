<?php

namespace taske;


class Main
{
    public function __construct(string $fileName)
    {
        if (!$source = file_get_contents($fileName)) {
            throw new \Exception('Cant get source');
        }

        $this->main($source);
    }

    private function main(string $source): bool
    {
        $parser = new Parser($source);
        $parser->parse();
        $arResult = $parser->get();

        if (empty($arResult)) {
            throw new \Exception('Err: 1');
        }

        $lexer = new Lexer($arResult);
        $arResult = $lexer->lexer();

//        var_dump($arResult);

        return true;
    }
}