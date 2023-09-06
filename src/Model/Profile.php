<?php


namespace MiloudH\KdenliveBundle\Model;


use Symfony\Component\Serializer\Annotation\SerializedPath;

class Profile
{
    #[SerializedPath("[@name]")]
    private ?string $name = null;

    #[SerializedPath("[@colorspace]")]
    private ?int $colorspace = null;

    #[SerializedPath("[@description]")]
    private ?string $description = null;

    #[SerializedPath("[@display_aspect_den]")]
    private ?float $displayAspectDen = null;

    #[SerializedPath("[@display_aspect_num]")]
    private ?float $displayAspectNum = null;

    #[SerializedPath("[@frame_rate_den]")]
    private ?float $frameRateDen = null;

    #[SerializedPath("[@frame_rate_num]")]
    private ?float $frameRateNum = null;

    #[SerializedPath("[@height]")]
    private ?float $height = null;

    #[SerializedPath("[@width]")]
    private ?float $width = null;

    #[SerializedPath("[@progressive]")]
    private ?float $progressive = null;

    #[SerializedPath("[@sample_aspect_den]")]
    private ?float $sampleAspectDen = null;

    #[SerializedPath("[@sample_aspect_num]")]
    private ?float $sampleAspectNum = null;

    public function getSampleAspectNum(): ?float
    {
        return $this->sampleAspectNum;
    }

    public function setSampleAspectNum(?float $sampleAspectNum): self
    {
        $this->sampleAspectNum = $sampleAspectNum;

        return $this;
    }

    public function getSampleAspectDen(): ?float
    {
        return $this->sampleAspectDen;
    }

    public function setSampleAspectDen(?float $sampleAspectDen): self
    {
        $this->sampleAspectDen = $sampleAspectDen;

        return $this;
    }

    public function getProgressive(): ?float
    {
        return $this->progressive;
    }

    public function setProgressive(?float $progressive): self
    {
        $this->progressive = $progressive;

        return $this;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(?float $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(?float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getFrameRateNum(): ?float
    {
        return $this->frameRateNum;
    }

    public function setFrameRateNum(?float $frameRateNum): self
    {
        $this->frameRateNum = $frameRateNum;

        return $this;
    }

    public function getFrameRateDen(): ?float
    {
        return $this->frameRateDen;
    }

    public function setFrameRateDen(?float $frameRateDen): self
    {
        $this->frameRateDen = $frameRateDen;

        return $this;
    }

    public function getDisplayAspectNum(): ?float
    {
        return $this->displayAspectNum;
    }

    public function setDisplayAspectNum(?float $displayAspectNum): self
    {
        $this->displayAspectNum = $displayAspectNum;

        return $this;
    }

    public function getDisplayAspectDen(): ?float
    {
        return $this->displayAspectDen;
    }

    public function setDisplayAspectDen(?float $displayAspectDen): self
    {
        $this->displayAspectDen = $displayAspectDen;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getColorspace(): ?int
    {
        return $this->colorspace;
    }
    
    public function setColorspace(?int $colorspace): self
    {
        $this->colorspace = $colorspace;

        return $this;
    }
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
