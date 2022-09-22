<?php


namespace MiloudH\KdenliveBundle\Model\Playlist;


use MiloudH\KdenliveBundle\Model\Chain\Chain;
use MiloudH\KdenliveBundle\Model\Playlist;
use MiloudH\KdenliveBundle\Model\Producer;
use MiloudH\KdenliveBundle\Model\Property;
use MiloudH\KdenliveBundle\Model\Track\Filter;
use MiloudH\KdenliveBundle\Model\Track\MultiTrack;
use MiloudH\KdenliveBundle\Model\Track\Tractor;
use MiloudH\KdenliveBundle\Model\Track\Transition;
use SimpleXMLElement;

class Entry
{
    private ?string $producer = null;
    private ?string $in = null;
    private ?string $out = null;

    /**
     * @var Property[]
     */
    private array $properties = [];

    /**
     * @var Producer[]
     */
    private array $producers = [];
    /**
     * @var Playlist[]
     */
    private array $playlists = [];
    /**
     * @var Tractor[]
     */
    private array $tractors = [];
    /**
     * @var MultiTrack[]
     */
    private array $multiTracks = [];
    /**
     * @var Filter[]
     */
    private array $filters = [];
    /**
     * @var Transition[]
     */
    private array $transitions = [];
    /**
     * @var Chain[]
     */
    private array $chains = [];

    public static function createFromXmlElement(SimpleXMLElement $element): self
    {
        $entry = (new self)
            ->setProducer($element['producer'])
            ->setIn($element['in'])
            ->setOut($element['out']);

        foreach ($element->xpath('property') as $propertyElement) {
            $entry->addProperty(Property::createFromXmlElement($propertyElement));
        }

        foreach ($element->xpath('playlist') as $playlistElement) {
            $entry->addPlaylist(Playlist::createFromXmlElement($playlistElement));
        }

        foreach ($element->xpath('tractor') as $tractorElement) {
            $entry->addTractor(Tractor::createFromXmlElement($tractorElement));
        }

        foreach ($element->xpath('multitrack') as $multitrackElement) {
            $entry->addMultiTrack(MultiTrack::createFromXmlElement($multitrackElement));
        }

        foreach ($element->xpath('filter') as $filterElement) {
            $entry->addFilter(Filter::createFromXmlElement($filterElement));
        }

        foreach ($element->xpath('transition') as $transitionElement) {
            $entry->addTransition(Transition::createFromXmlElement($transitionElement));
        }

        foreach ($element->xpath('chain') as $chainElement) {
            $entry->addChain(Chain::createFromXmlElement($chainElement));
        }

        return $entry;
    }

    public function getProducer(): ?string
    {
        return $this->producer;
    }

    public function setProducer(?string $producer): self
    {
        $this->producer = $producer;

        return $this;
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

    public function setOut(?string $out): self
    {
        $this->out = $out;

        return $this;
    }

    public function getOut(): ?string
    {
        return $this->out;
    }

    private function addProperty(Property $property)
    {
        $this->properties[] = $property;
    }

    private function addPlaylist(Playlist $playlist)
    {
        $this->playlists[] = $playlist;
    }

    private function addTractor(Tractor $tractor)
    {
        $this->tractors[] = $tractor;
    }

    private function addMultiTrack(MultiTrack $multiTrack)
    {
        $this->multiTracks[] = $multiTrack;
    }

    private function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;
    }

    private function addTransition(Transition $transition)
    {
        $this->transitions[] = $transition;
    }

    private function addChain(Chain $chain)
    {
        $this->chains[] = $chain;
    }
}
