<?php


namespace taske;


class Parser implements ParserInterface
{
    protected $source;
    protected $arInstructions = [];

    public function __construct(string $source)
    {
        $this->source = $source;
    }

    public function parse()
    {
        $arInstructions = explode(';', $this->source);

        foreach ($arInstructions as $arInstruction) {
            $this->arInstructions[] = explode(' ', $arInstruction);
        }
    }

    public function get(): array
    {
        return $this->arInstructions;
    }
}