<?php

namespace MiloudH\KdenliveBundle\Model;

use InvalidArgumentException;
use MiloudH\KdenliveBundle\Model\Chain\Chain;
use MiloudH\KdenliveBundle\Model\Track\MultiTrack;
use MiloudH\KdenliveBundle\Model\Track\Tractor;
use SimpleXMLElement;

class KdenliveFile
{
    private ?string $version = null;
    private ?string $root = null;
    private ?string $title = null;
    private ?Profile $profile = null;

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
    private array $multiTrack = [];
    /**
     * @var Consumer[]
     */
    private array $consumers = [];
    /**
     * @var Chain[]
     */
    private array $chains = [];

    public function loadFromString(string $xmlContent): bool
    {
        $document = new SimpleXMLElement($xmlContent);

        $mlt = $document->xpath('/mlt')[0];
        $this->version = $mlt['version'] ?? null;
        $this->root = $mlt['root'] ?? null;
        $this->title = $mlt['title'] ?? null;

        $profile = $mlt->xpath('profile');
        if (count($profile) > 1) {
            throw new InvalidArgumentException('It can have only one melt profile');
        }
        if (isset($profile[0])) {
            $this->profile = Profile::createFromXmlElement($profile[0]);
        }

        foreach ($mlt->xpath('producer') as $producer) {
            $this->producers[] = Producer::createFromXmlElement($producer);
        }

        foreach ($mlt->xpath('playlist') as $playlist) {
            $this->playlists[] = Playlist::createFromXmlElement($playlist);
        }

        foreach ($mlt->xpath('tractor') as $tractor) {
            $this->tractors[] = Tractor::createFromXmlElement($tractor);
        }

        foreach ($mlt->xpath('multitrack') as $multitrack) {
            $this->multiTrack[] = MultiTrack::createFromXmlElement($multitrack);
        }

        foreach ($mlt->xpath('consumer') as $consumer) {
            $this->consumers[] = Consumer::createFromXmlElement($consumer);
        }

        foreach ($mlt->xpath('chain') as $chain) {
            $this->chains[] = Chain::createFromXmlElement($chain);
        }

        dump($this);
        return true;
    }
}
