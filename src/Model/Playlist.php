<?php

namespace MiloudH\KdenliveBundle\Model;

use MiloudH\KdenliveBundle\Model\Chain\Chain;
use MiloudH\KdenliveBundle\Model\Playlist\Blank;
use MiloudH\KdenliveBundle\Model\Playlist\Entry;
use MiloudH\KdenliveBundle\Model\Track\MultiTrack;
use MiloudH\KdenliveBundle\Model\Track\Tractor;
use MiloudH\KdenliveBundle\Trait\TimecodedTrait;
use Symfony\Component\Serializer\Annotation\SerializedPath;

class Playlist
{
    use TimecodedTrait;

    #[SerializedPath("[@id]")]
    private ?string $id = null;

    #[SerializedPath("[@title]")]
    private ?string $title = null;

    /**
     * @var Property[]
     */
    #[SerializedPath("[property]")]
    private array $properties = [];

    /**
     * @var Entry[]
     */
    #[SerializedPath("[entry]")]
    private array $entries = [];
    /**
     * @var Blank[]
     */
    #[SerializedPath("[blank]")]
    private array $blanks = [];

    /**
     * @var Producer[]
     */
    #[SerializedPath("[producer]")]
    private array $producers = [];

    /**
     * @var Playlist[]
     */
    #[SerializedPath("[playlist]")]
    private array $playlists = [];

    /**
     * @var Tractor[]
     */
    #[SerializedPath("[tractor]")]
    private array $tractors = [];

    /**
     * @var MultiTrack[]
     */
    #[SerializedPath("[multitrack]")]
    private array $multiTracks = [];

    /**
     * @var Chain[]
     */
    #[SerializedPath("[chain]")]
    private array $chains = [];

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPlaylists(): array
    {
        return $this->playlists;
    }

    public function setPlaylists(array $playlists): self
    {
        $this->playlists = $playlists;

        return $this;
    }

    public function addPlaylist(Playlist $playlist): self
    {
        $this->playlists[] = $playlist;

        return $this;
    }

    public function getProducers(): array
    {
        return $this->producers;
    }

    public function setProducers(array $producers): self
    {
        $this->producers = $producers;

        return $this;
    }

    public function addProducer(Producer $producer): self
    {
        $this->producers[] = $producer;

        return $this;
    }

    public function getTractors(): array
    {
        return $this->tractors;
    }

    public function setTractors(array $tractors): self
    {
        $this->tractors = $tractors;

        return $this;
    }

    public function addTractor(Tractor $tractor): self
    {
        $this->tractors[] = $tractor;

        return $this;
    }

    public function getMultiTracks(): array
    {
        return $this->multiTracks;
    }

    public function setMultiTracks(array $multiTracks): self
    {
        $this->multiTracks = $multiTracks;

        return $this;
    }

    public function addMultiTrack(MultiTrack $multiTrack): self
    {
        $this->multiTracks[] = $multiTrack;

        return $this;
    }

    public function getChains(): array
    {
        return $this->chains;
    }

    public function setChains(array $chains): self
    {
        $this->chains = $chains;

        return $this;
    }

    public function addChain(Chain $chain): self
    {
        $this->chains[] = $chain;

        return $this;
    }

    public function getEntries(): array
    {
        return $this->entries;
    }

    public function setEntries(array $entries): self
    {
        $this->entries = $entries;

        return $this;
    }

    public function addEntry(Entry $entry): self
    {
        $this->entries[] = $entry;

        return $this;
    }

    public function getBlanks(): array
    {
        return $this->blanks;
    }

    public function setBlanks(array $blanks): self
    {
        $this->blanks = $blanks;

        return $this;
    }

    public function addBlank(Blank $blank): self
    {
        $this->blanks[] = $blank;

        return $this;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties(array $properties): self
    {
        $this->properties = $properties;

        return $this;
    }

    public function addProperty(Property $property): self
    {
        $this->properties[] = $property;

        return $this;
    }
}
