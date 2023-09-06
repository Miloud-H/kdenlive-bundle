<?php


namespace MiloudH\KdenliveBundle\Trait;


use DateInterval;
use Symfony\Component\Serializer\Annotation\SerializedPath;

trait TimecodedTrait
{
    #[SerializedPath("[@in]")]
    private DateInterval $in;

    #[SerializedPath("[@out]")]
    private DateInterval $out;

    public function getIn(): DateInterval
    {
        return $this->in;
    }

    public function setIn(DateInterval $in): self
    {
        $this->in = $in;

        return $this;
    }

    public function getOut(): DateInterval
    {
        return $this->out;
    }

    public function setOut(DateInterval $out): self
    {
        $this->out = $out;

        return $this;
    }
}
