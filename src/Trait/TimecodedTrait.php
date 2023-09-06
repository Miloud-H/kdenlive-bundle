<?php


namespace MiloudH\KdenliveBundle\Trait;


use Symfony\Component\Serializer\Annotation\SerializedPath;

trait TimecodedTrait
{
    #[SerializedPath("[@in]")]
    private ?string $in = null;

    #[SerializedPath("[@out]")]
    private ?string $out = null;

    public function getIn(): ?string
    {
        return $this->in;
    }

    public function setIn(?string $in): self
    {
        $this->in = $in;

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
}
