<?php


namespace MiloudH\KdenliveBundle\Model\Playlist;


class Blank
{
    private float $blank;

    public function getBlank(): float
    {
        return $this->blank;
    }

    public function setBlank(float $blank): self
    {
        $this->blank = $blank;

        return $this;
    }
}
