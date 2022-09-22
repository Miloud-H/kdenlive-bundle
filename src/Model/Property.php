<?php

namespace MiloudH\KdenliveBundle\Model;

use SimpleXMLElement;

class Property
{
    private string $name;
    private ?string $value;

    public static function createFromXmlElement(SimpleXMLElement $element): self
    {
        return (new self)
            ->setName($element['name'])
            ->setValue($element->__toString());
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}
