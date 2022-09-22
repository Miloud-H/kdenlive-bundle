<?php


namespace MiloudH\KdenliveBundle\Model\Chain;


use MiloudH\KdenliveBundle\Model\Property;
use MiloudH\KdenliveBundle\Model\Track\Filter;
use SimpleXMLElement;

class Chain
{
    private ?string $id = null;
    private ?string $in = null;
    private ?string $out = null;
    private ?string $mlt_service = null;

    /**
     * @var Property[]
     */
    private array $properties = [];
    /**
     * @var Filter[]
     */
    private ?array $filters = [];
    /**
     * @var Link[]
     */
    private ?array $links = [];

    public static function createFromXmlElement(SimpleXMLElement $element): self
    {
        $chain = (new self)
            ->setId($element['id'])
            ->setIn($element['in'])
            ->setOut($element['out'])
            ->setMltService($element['mlt_service']);

        foreach ($element->xpath('property') as $propertyElement) {
            $chain->addProperty(Property::createFromXmlElement($propertyElement));
        }

        foreach ($element->xpath('filter') as $filterElement) {
            $chain->addFilter(Filter::createFromXmlElement($filterElement));
        }

        foreach ($element->xpath('link') as $linkElement) {
            $chain->addLink(Link::createFromXmlElement($linkElement));
        }

        return $chain;
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

    private function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;
    }

    private function addLink(Link $link)
    {
        $this->links[] = $link;
    }
}
