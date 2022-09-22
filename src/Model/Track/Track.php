<?php


namespace MiloudH\KdenliveBundle\Model\Track;


use MiloudH\KdenliveBundle\Enum\HideType;
use MiloudH\KdenliveBundle\Model\Chain\Chain;
use MiloudH\KdenliveBundle\Model\Playlist;
use MiloudH\KdenliveBundle\Model\Producer;
use SimpleXMLElement;

class Track
{

    /**
     * @var ?string{HideType::VIDEO,HideType::AUDIO,HideType::BOTH}
     */
    private ?string $hide = null;

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
        $track = ( new self)
            ->setHide($element['hide']);

        foreach ($element->xpath('producer') as $producerElement) {
            $track->addProducer(Producer::createFromXmlElement($producerElement));
        }

        foreach ($element->xpath('playlist') as $playlistElement) {
            $track->addPlaylist(Playlist::createFromXmlElement($playlistElement));
        }

        foreach ($element->xpath('tractor') as $tractorElement) {
            $track->addTractor(Tractor::createFromXmlElement($tractorElement));
        }

        foreach ($element->xpath('multitrack') as $multitrackElement) {
            $track->addMultiTrack(MultiTrack::createFromXmlElement($multitrackElement));
        }

        foreach ($element->xpath('filter') as $filterElement) {
            $track->addFilter(Filter::createFromXmlElement($filterElement));
        }

        foreach ($element->xpath('transition') as $transitionElement) {
            $track->addTransition(Transition::createFromXmlElement($transitionElement));
        }

        foreach ($element->xpath('chain') as $chainElement) {
            $track->addChain(Chain::createFromXmlElement($chainElement));
        }

        return $track;
    }


    public function getHide(): ?string
    {
        return $this->hide;
    }

    public function setHide(?string $hide): self
    {
        $this->hide = $hide;

        return $this;
    }

    private function addProducer(Producer $producer)
    {
        $this->producers[] = $producer;
    }

    private function addPlaylist(Playlist $playlist)
    {
        $this->playlists[] = $playlist;
    }

    private function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;
    }

    private function addTransition(Transition $transition)
    {
        $this->transitions[] = $transition;
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
