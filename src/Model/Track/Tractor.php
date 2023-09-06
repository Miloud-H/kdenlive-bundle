<?php
namespace MiloudH\KdenliveBundle\Model\Track;

use MiloudH\KdenliveBundle\Model\Property;
use MiloudH\KdenliveBundle\Trait\TimecodedTrait;
use Symfony\Component\Serializer\Annotation\SerializedPath;

class Tractor
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
     * @var MultiTrack[]
     */
    #[SerializedPath("[multitrack]")]
    private array $multiTracks = [];

    /**
     * @var Track[]
     */
    #[SerializedPath("[track]")]
    private array $tracks = [];

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

    public function getTransitions(): array
    {
        return $this->transitions;
    }

    public function setTransitions(array $transitions): void
    {
        $this->transitions = $transitions;
    }

    public function addTransition(Transition $transition): self
    {
        $this->transitions[] = $transition;

        return $this;
    }
}
