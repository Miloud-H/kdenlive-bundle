<?php


namespace MiloudH\KdenliveBundle\Model\Track;


use MiloudH\KdenliveBundle\Model\Property;
use SimpleXMLElement;

class Tractor
{
    private ?string $id = null;
    private ?string $in = null;
    private ?string $out = null;
    private ?string $title = null;

    /**
     * @var Property[]
     */
    private array $properties = [];

    /**
     * @var MultiTrack[]
     */
    private array $multiTracks = [];
    /**
     * @var Track[]
     */
    private array $tracks = [];
    /**
     * @var Filter[]
     */
    private array $filters = [];
    /**
     * @var Transition[]
     */
    private array $transitions = [];

    public static function createFromXmlElement(SimpleXMLElement $element): self
    {
        $tractor = (new self)
            ->setId($element['id'])
            ->setIn($element['in'])
            ->setOut($element['out'])
            ->setTitle($element['title']);

        foreach ($element->xpath('property') as $propertyElement) {
            $tractor->addProperty(Property::createFromXmlElement($propertyElement));
        }

        foreach ($element->xpath('multitrack') as $multitrackElement) {
            $tractor->addMultiTrack(MultiTrack::createFromXmlElement($multitrackElement));
        }

        foreach ($element->xpath('track') as $trackElement) {
            $tractor->addTrack(Track::createFromXmlElement($trackElement));
        }

        foreach ($element->xpath('filter') as $filterElement) {
            $tractor->addFilter(Filter::createFromXmlElement($filterElement));
        }

        foreach ($element->xpath('transition') as $transitionElement) {
            $tractor->addTransition(Transition::createFromXmlElement($transitionElement));
        }

        return $tractor;

    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
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

    private function addMultiTrack(MultiTrack $multiTrack)
    {
        $this->multiTracks[] = $multiTrack;
    }

    private function addTrack(Track $track)
    {
        $this->tracks[] = $track;
    }

    private function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;
    }

    private function addTransition(Transition $transition)
    {
        $this->transitions[] = $transition;
    }
}
