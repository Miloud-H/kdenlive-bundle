<?php


namespace MiloudH\KdenliveBundle\Model\Track;


use MiloudH\KdenliveBundle\Model\Property;
use SimpleXMLElement;

class Transition
{
    private ?string $id = null;
    private ?string $in = null;
    private ?string $out = null;
    private ?string $mlt_service = null;
    private ?int $aTrack = null;
    private ?int $bTrack = null;

    /**
     * @var Property[]
     */
    private array $properties = [];

    public static function createFromXmlElement(SimpleXMLElement $element): self
    {
        $transition = (new self)
            ->setId($element['id'])
            ->setIn($element['in'])
            ->setOut($element['out'])
            ->setMltService($element['mlt_service'])
            ->setATrack(isset($element['a_track']) ? (int) $element['a_track'] : null)
            ->setBTrack(isset($element['b_track']) ? (int) $element['b_track'] : null);

        foreach ($element->xpath('property') as $propertyElement) {
            $transition->addProperty(Property::createFromXmlElement($propertyElement));
        }

        return $transition;
    }

    public function setBTrack(?int $bTrack): self
    {
        $this->bTrack = $bTrack;

        return $this;
    }

    public function getBTrack(): ?int
    {
        return $this->bTrack;
    }

    public function getATrack(): ?int
    {
        return $this->aTrack;
    }

    public function setATrack(?int $aTrack): self
    {
        $this->aTrack = $aTrack;

        return $this;
    }

    public function getMltService(): ?string
    {
        return $this->mlt_service;
    }

    public function setMltService(?string $mlt_service): self
    {
        $this->mlt_service = $mlt_service;

        return $this;
    }

    public function getOut(): ?string
    {
        return $this->out;
    }

    public function setOut(?string $out): self
    {
        $this->out = $out;

        return $this;
    }

    public function getIn(): ?string
    {
        return $this->in;
    }

    public function setIn(?string $in): self
    {
        $this->in = $in;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    private function addProperty(Property $property)
    {
        $this->properties[] = $property;
    }
}
