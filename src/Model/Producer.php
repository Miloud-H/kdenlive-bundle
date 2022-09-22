<?php

namespace MiloudH\KdenliveBundle\Model;

use MiloudH\KdenliveBundle\Model\Track\Filter;
use SimpleXMLElement;

class Producer
{
    private ?string $id = null;
    private ?string $in = null;
    private ?string $out = null;
    private ?string $title = null;
    private ?string $mlt_service = null;

    /**
     * @var Property[]
     */
    private array $properties = [];

    /**
     * @var Filter[]
     */
    private ?array $filters = [];

    public static function createFromXmlElement(SimpleXMLElement $element): self
    {
        $producer = (new self)
            ->setId($element['id'])
            ->setIn($element['in'])
            ->setOut($element['out'])
            ->setTitle($element['title'])
            ->setMltService($element['mlt_service']);

        foreach ($element->xpath('property') as $propertyElement) {
            $producer->addProperty(Property::createFromXmlElement($propertyElement));
        }

        foreach ($element->xpath('filter') as $filterElement) {
            $producer->addFilter(Filter::createFromXmlElement($filterElement));
        }

        return $producer;
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
    
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

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

    public function getId(): ?int
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

    private function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;
    }
}
