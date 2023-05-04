<?php

namespace MiloudH\KdenliveBundle\Model;

use MiloudH\KdenliveBundle\Model\Track\Filter;
use SimpleXMLElement;
use Symfony\Component\Serializer\Annotation\SerializedPath;

class Producer
{
    #[SerializedPath("[@id]")]
    private ?string $id = null;

    #[SerializedPath("[@in]")]
    private ?string $in = null;

    #[SerializedPath("[@out]")]
    private ?string $out = null;

    #[SerializedPath("[@title]")]
    private ?string $title = null;

    #[SerializedPath("[@mlt_service]")]
    private ?string $mlt_service = null;

    /**
     * @var Property[]
     */
    #[SerializedPath("[property]")]
    private array $properties = [];

    /**
     * @var Filter[]
     */
    #[SerializedPath("[filter]")]
    private ?array $filters = [];

    public function getMltService(): ?string
    {
        return $this->mlt_service;
    }

    public function setMltService(?string $mlt_service): self
    {
        $this->mlt_service = $mlt_service;

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

    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @param array $properties
     */
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

    public function getFilters(): ?array
    {
        return $this->filters;
    }

    public function setFilters(?array $filters): self
    {
        $this->filters = $filters;

        return $this;
    }

    public function addFilter(Filter $filter): self
    {
        $this->filters[] = $filter;

        return $this;
    }
}
