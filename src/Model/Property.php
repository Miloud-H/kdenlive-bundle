<?php

namespace MiloudH\KdenliveBundle\Model;

use Symfony\Component\Serializer\Annotation\SerializedPath;

class Property
{
    #[SerializedPath("[@name]")]
    // TODO Convert value for string all time, there is name="0"
    private mixed $name;

    #[SerializedPath("[#]")]
    private mixed $value;

    public function setName(mixed $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): mixed
    {
        return $this->name;
    }

    public function setValue(mixed $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }
}
