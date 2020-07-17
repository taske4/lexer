<?php

namespace taske;


class Lexer implements LexerInterface
{
    protected $arContents = [];
    protected $arTokens = [];

    public function __construct(array $arContents)
    {
        $this->arTokens = [
            'variable' => '#\w+',
            'operator' => '=',
            'match operator' => '\+|-|\*|%',
            'function' => '\w+\((.+\))',
            'int' => '\d+',
            'float' => '\d+\.\d+',
            'bool' => 'true|false',
            'unknown' => '.+',
        ];

        $this->arContents = $arContents;
        if (empty($this->arContents)) {
            throw new \Exception('Contents is empty');
        }
    }

    public function lexer(): array
    {
        $arResult = [];

        foreach ($this->arContents as $index => $arInstruction) {
            foreach ($arInstruction as $piece) {
                foreach ($this->arTokens as $token => $pattern) {
                    if (preg_match("/^${pattern}$/", trim($piece)) === 1) {
                        $arResult[$index][] = [
                            $token => trim($piece)
                        ];
                        break;
                    }
                }
            }
        }

        return $arResult;
    }
}