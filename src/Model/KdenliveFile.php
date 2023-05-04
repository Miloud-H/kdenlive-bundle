<?php

namespace MiloudH\KdenliveBundle\Model;

use MiloudH\KdenliveBundle\Model\Chain\Chain;
use MiloudH\KdenliveBundle\Model\Track\MultiTrack;
use MiloudH\KdenliveBundle\Model\Track\Tractor;
use Symfony\Component\Serializer\Annotation\SerializedPath;

class KdenliveFile
{
    #[SerializedPath("[@version]")]
    private ?string $version = null;

    #[SerializedPath("[@root]")]
    private ?string $root = null;

    #[SerializedPath("[@title]")]
    private ?string $title = null;

    #[SerializedPath("[@producer]")]
    private ?string $producer = null;

    #[SerializedPath("[@profile]")]
    private ?string $profile = null;

    /**
     * @var Profile[]
     */
    #[SerializedPath("[profile]")]
    private array $profiles = [];

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
     * @var Consumer[]
     */
    #[SerializedPath("[consumer]")]
    private array $consumers = [];
    /**
     * @var Chain[]
     */
    #[SerializedPath("[chain]")]
    private array $chains = [];

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getRoot(): ?string
    {
        return $this->root;
    }

    public function setRoot(?string $root): self
    {
        $this->root = $root;

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

    public function getProfiles(): array
    {
        return $this->profiles;
    }

    public function setProfiles(array $profiles): self
    {
        $this->profiles = $profiles;

        return $this;
    }

    public function addProfile(Profile $profile): self
    {
        $this->profiles[] = $profile;

        return $this;
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

    public function getProducers(): array
    {
        return $this->producers;
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

    public function setMultiTracks(array $multiTracks): void
    {
        $this->multiTracks = $multiTracks;
    }

    public function addMultiTrack(MultiTrack $multiTrack): void
    {
        $this->multiTracks[] = $multiTrack;
    }

    public function getConsumers(): array
    {
        return $this->consumers;
    }

    public function setConsumers(array $consumers): self
    {
        $this->consumers = $consumers;

        return $this;
    }

    public function addConsumer(Consumer $consumer): self
    {
        $this->consumers[] = $consumer;

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

    public function getProducer(): ?string
    {
        return $this->producer;
    }

    public function setProducer(?string $producer): self
    {
        $this->producer = $producer;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(?string $profile): self
    {
        $this->profile = $profile;

        return $this;
    }
}
