<?php


namespace MiloudH\KdenliveBundle\Model\Playlist;


use Symfony\Component\Serializer\Annotation\SerializedPath;

class Blank
{
    #[SerializedPath("[@length]")]
    private int $length;

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }
}
