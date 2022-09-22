<?php

namespace MiloudH\KdenliveBundle\Model\Chain;

use MiloudH\KdenliveBundle\Model\Property;
use SimpleXMLElement;

class Link
{
    private ?string $id = null;
    private ?string $in = null;
    private ?string $out = null;
    private ?string $mlt_service = null;

    /**
     * @var Property[]
     */
    private array $properties = [];


    public function getMltService(): ?string
    {
        return $this->mlt_service;
    }

    public function setMltService(?string $mlt_service): self
    {
        $this->mlt_service = $mlt_service;

        return $this;
    }

    public function getOut(): ?string
    {
        return $this->out;
    }

    public function setOut(?string $out): self
    {
        $this->out = $out;

        return $this;
    }

    public function getIn(): ?string
    {
        return $this->in;
    }

    public function setIn(?string $in): self
    {
        $this->in = $in;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    private function addProperty(Property $property)
    {
        $this->properties[] = $property;
    }

    public static function createFromXmlElement(SimpleXMLElement $element): self
    {
        $link = (new self)
            ->setId($element['id'])
            ->setIn($element['in'])
            ->setOut($element['out'])
            ->setMltService($element['mlt_service']);

        foreach ($element->xpath('property') as $propertyElement) {
            $link->addProperty(Property::createFromXmlElement($propertyElement));
        }

        return $link;
    }
}
