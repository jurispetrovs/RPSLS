<?php

abstract class AbstractElement
{
    protected array $beatable = [];

    protected string $elementName;

    public function __construct(string $elementName)
    {
        $this->elementName = $elementName;
    }

    public function getElementName(): string
    {
        return $this->elementName;
    }

    public function beats(ElementInterface $element): Result
    {
        if (in_array(get_class($element), $this->beatable)) {
            return new WinResult();
        }

        if ($this instanceof $element) {
            return new TieResult();
        }

        return new LoseResult();
    }
}