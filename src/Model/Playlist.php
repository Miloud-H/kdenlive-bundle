<?php

namespace MiloudH\KdenliveBundle\Model;

use MiloudH\KdenliveBundle\Model\Chain\Chain;
use MiloudH\KdenliveBundle\Model\Playlist\Blank;
use MiloudH\KdenliveBundle\Model\Playlist\Entry;
use MiloudH\KdenliveBundle\Model\Track\MultiTrack;
use MiloudH\KdenliveBundle\Model\Track\Tractor;
use SimpleXMLElement;

class Playlist
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
     * @var Entry[]
     */
    private array $entries = [];
    /**
     * @var Blank[]
     */
    private array $blanks = [];
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
     * @var Chain[]
     */
    private array $chains = [];

    public static function createFromXmlElement(SimpleXMLElement $element): self
    {
        $playlist = (new self)
            ->setId($element['id'])
            ->setIn($element['in'])
            ->setOut($element['out'])
            ->setTitle($element['title']);

        foreach ($element->xpath('property') as $propertyElement) {
            $playlist->addProperty(Property::createFromXmlElement($propertyElement));
        }

        foreach ($element->xpath('entry') as $entryElement) {
            $playlist->addEntry(Entry::createFromXmlElement($entryElement));
        }

        foreach ($element->xpath('producer') as $producerElement) {
            $playlist->addProducer(Producer::createFromXmlElement($producerElement));
        }

        foreach ($element->xpath('playlist') as $playlistElement) {
            $playlist->addPlaylist(Playlist::createFromXmlElement($playlistElement));
        }

        foreach ($element->xpath('tractor') as $tractorElement) {
            $playlist->addTractor(Tractor::createFromXmlElement($tractorElement));
        }

        foreach ($element->xpath('multitrack') as $multitrackElement) {
            $playlist->addMultiTrack(MultiTrack::createFromXmlElement($multitrackElement));
        }

        foreach ($element->xpath('chain') as $chainElement) {
            $playlist->addChain(Chain::createFromXmlElement($chainElement));
        }

        return $playlist;
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

    private function addProducer(Producer $producer)
    {
        $this->producers[] = $producer;
    }

    private function addEntry(Entry $entry)
    {
        $this->entries[] = $entry;
    }

    private function addPlaylist(Playlist $entry)
    {
        $this->playlists[] = $entry;
    }

    private function addTractor(Tractor $tractor)
    {
        $this->tractors[] = $tractor;
    }

    private function addMultiTrack(MultiTrack $multiTrack)
    {
        $this->multiTracks[] = $multiTrack;
    }

    private function addChain(Chain $chain)
    {
        $this->chains[] = $chain;
    }
}
