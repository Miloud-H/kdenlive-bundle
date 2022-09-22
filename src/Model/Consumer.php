<?php

namespace MiloudH\KdenliveBundle\Model;

use SimpleXMLElement;

class Consumer
{
    private ?string $id = null;
    private ?string $mlt_service = null;

    /**
     * @var Property[]
     */
    private array $properties = [];

    public static function createFromXmlElement(SimpleXMLElement $element): self
    {
        $consumer = (new self)
            ->setId($element['id'])
            ->setMltService($element['mlt_service']);

        foreach ($element->xpath('property') as $propertyElement) {
            $consumer->addProperty(Property::createFromXmlElement($propertyElement));
        }

        return $consumer;
    }

    public function getMltService(): ?string
    {
        return $this->mlt_service;
    }

    public function setMltService(?string $mlt_service): self
    {
        $this->mlt_service = $mlt_service;

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
}
