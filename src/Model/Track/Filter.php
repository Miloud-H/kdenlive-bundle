<?php

namespace MiloudH\KdenliveBundle\Model\Track;

use MiloudH\KdenliveBundle\Model\Property;
use Symfony\Component\Serializer\Annotation\SerializedPath;

class Filter
{
    #[SerializedPath("[@id]")]
    private ?string $id = null;

    #[SerializedPath("[@in]")]
    private ?string $in = null;

    #[SerializedPath("[@out]")]
    private ?string $out = null;

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
