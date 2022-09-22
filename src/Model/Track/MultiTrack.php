<?php


namespace MiloudH\KdenliveBundle\Model\Track;


use MiloudH\KdenliveBundle\Model\Chain\Chain;
use MiloudH\KdenliveBundle\Model\Playlist;
use MiloudH\KdenliveBundle\Model\Producer;
use SimpleXMLElement;

class MultiTrack
{
    private ?string $id = null;

    /**
     * @var Track[]
     */
    private array $tracks = [];
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
        $multiTrack = ( new self)
            ->setId($element['id']);

        foreach ($element->xpath('track') as $trackElement) {
            $multiTrack->addTrack(Track::createFromXmlElement($trackElement));
        }

        foreach ($element->xpath('producer') as $producerElement) {
            $multiTrack->addProducer(Producer::createFromXmlElement($producerElement));
        }

        foreach ($element->xpath('playlist') as $playlistElement) {
            $multiTrack->addPlaylist(Playlist::createFromXmlElement($playlistElement));
        }

        foreach ($element->xpath('tractor') as $tractorElement) {
            $multiTrack->addTractor(Tractor::createFromXmlElement($tractorElement));
        }

        foreach ($element->xpath('multitrack') as $multitrackElement) {
            $multiTrack->addMultiTrack(MultiTrack::createFromXmlElement($multitrackElement));
        }

        foreach ($element->xpath('chain') as $chainElement) {
            $multiTrack->addChain(Chain::createFromXmlElement($chainElement));
        }

        return $multiTrack;
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

    private function addProducer(Producer $producer)
    {
        $this->producers[] = $producer;
    }

    private function addPlaylist(Playlist $playlist)
    {
        $this->playlists[] = $playlist;
    }

    private function addTractor(Tractor $tractor)
    {
        $this->tractors[] = $tractor;
    }

    private function addTrack(Track $track)
    {
        $this->tracks[] = $track;
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
