<?php

class ElementCollection
{
    private array $elements = [];

    public function addElement(AbstractElement $element): void
    {
        $this->elements[] = $element;
    }

    public function getAllElements(): array
    {
        return $this->elements;
    }

    public function getElement(string $elementName): ?AbstractElement
    {
        foreach ($this->elements as $element) {
            if ($elementName === $element->getElementName()) {
                return $element;
            }
        }
        return null;
    }
}