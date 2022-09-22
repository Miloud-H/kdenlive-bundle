<?php

namespace MiloudH\KdenliveBundle\Model\Track;

use MiloudH\KdenliveBundle\Model\Property;
use SimpleXMLElement;

class Filter
{
    private ?string $id = null;
    private ?string $in = null;
    private ?string $out = null;
    private ?string $mlt_service = null;
    private ?Track $track = null;

    /**
     * @var Property[]
     */
    private array $properties = [];

    public static function createFromXmlElement(SimpleXMLElement $element): self
    {
        $filter = (new self)
            ->setId($element['id'])
            ->setIn($element['in'])
            ->setOut($element['out'])
            ->setMltService($element['mlt_service']);
        //TODO AJouter le track

        foreach ($element->xpath('property') as $propertyElement) {
            $filter->addProperty(Property::createFromXmlElement($propertyElement));
        }

        return $filter;
    }

    public function setTrack(?Track $track): self
    {
        $this->track = $track;

        return $this;
    }

    public function getTrack(): ?Track
    {
        return $this->track;
    }

    public function setMltService(?string $mlt_service): self
    {
        $this->mlt_service = $mlt_service;

        return $this;
    }

    public function getMltService(): ?string
    {
        return $this->mlt_service;
    }

    public function setOut(?string $out): self
    {
        $this->out = $out;

        return $this;
    }

    public function getOut(): ?string
    {
        return $this->out;
    }

    public function setIn(?string $in): self
    {
        $this->in = $in;

        return $this;
    }

    public function getIn(): ?string
    {
        return $this->in;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    private function addProperty(Property $property)
    {
        $this->properties[] = $property;
    }
}
