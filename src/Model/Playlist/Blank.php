<?php


namespace MiloudH\KdenliveBundle\Model\Playlist;


use Symfony\Component\Serializer\Annotation\SerializedPath;

class Blank
{
    #[SerializedPath("[@length]")]
    private string $length;

    public function getLength(): string
    {
        return $this->length;
    }

    public function setLength(string $length): self
    {
        $this->length = $length;

        return $this;
    }
}
