<?php

namespace MiloudH\KdenliveBundle\Model\Track;

use MiloudH\KdenliveBundle\Model\Property;
use MiloudH\KdenliveBundle\Trait\TimecodedTrait;
use Symfony\Component\Serializer\Annotation\SerializedPath;

class Filter
{
    use TimecodedTrait;

    #[SerializedPath("[@id]")]
    private ?string $id = null;

    #[SerializedPath("[@mlt_service]")]
    private ?string $mlt_service = null;

    #[SerializedPath("[@track]")]
    private ?string $track = null;

    /**
     * @var Property[]
     */
    #[SerializedPath("[property]")]
    private array $properties = [];

    public function setTrack(?string $track): self
    {
        $this->track = $track;

        return $this;
    }

    public function getTrack(): ?string
    {
        return $this->track;
    }

    public function setMltService(?string $mlt_service): self
    {
        $this->mlt_service = $mlt_service;

        return $this;
    }

    public function getMltService(): ?string
    {
        return $this->mlt_service;
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
