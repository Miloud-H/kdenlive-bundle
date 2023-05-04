<?php


namespace MiloudH\KdenliveBundle\Model\Track;


use MiloudH\KdenliveBundle\Model\Chain\Chain;
use MiloudH\KdenliveBundle\Model\Playlist;
use MiloudH\KdenliveBundle\Model\Producer;
use Symfony\Component\Serializer\Annotation\SerializedPath;

class MultiTrack
{
    #[SerializedPath("[@id]")]
    private ?string $id = null;

    /**
     * @var Track[]
     */
    #[SerializedPath("[track]")]
    private array $tracks = [];
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

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
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

    public function getTracks(): array
    {
        return $this->tracks;
    }

    public function setTracks(array $tracks): self
    {
        $this->tracks = $tracks;

        return $this;
    }

    public function addTrack(Track $track): self
    {
        $this->tracks[] = $track;

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
}
