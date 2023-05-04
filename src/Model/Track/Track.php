<?php


namespace MiloudH\KdenliveBundle\Model\Track;


use MiloudH\KdenliveBundle\Enum\HideType;
use MiloudH\KdenliveBundle\Model\Chain\Chain;
use MiloudH\KdenliveBundle\Model\Playlist;
use MiloudH\KdenliveBundle\Model\Producer;
use Symfony\Component\Serializer\Annotation\SerializedPath;

class Track
{
    /**
     * @var ?string{HideType::VIDEO,HideType::AUDIO,HideType::BOTH}
     */
    #[SerializedPath("[@hide]")]
    private ?string $hide = null;

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
     * @var Filter[]
     */
    #[SerializedPath("[filter]")]
    private array $filters = [];
    /**
     * @var Transition[]
     */
    #[SerializedPath("[transition]")]
    private array $transitions = [];

    /**
     * @var Chain[]
     */
    #[SerializedPath("[chain]")]
    private array $chains = [];

    public function getHide(): ?string
    {
        return $this->hide;
    }

    public function setHide(?string $hide): self
    {
        $this->hide = $hide;

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

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function setFilters(array $filters): self
    {
        $this->filters = $filters;

        return $this;
    }

    public function addFilter(Filter $filter): self
    {
        $this->filters[] = $filter;

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

    public function getTransitions(): array
    {
        return $this->transitions;
    }

    public function setTransitions(array $transitions): self
    {
        $this->transitions = $transitions;

        return $this;
    }

    public function addTransition(Transition $transition): self
    {
        $this->transitions[] = $transition;

        return $this;
    }
}
