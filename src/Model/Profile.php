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
    private ?int $displayAspectDen = null;

    #[SerializedPath("[@display_aspect_num]")]
    private ?int $displayAspectNum = null;

    #[SerializedPath("[@frame_rate_den]")]
    private ?int $frameRateDen = null;

    #[SerializedPath("[@frame_rate_num]")]
    private ?int $frameRateNum = null;

    #[SerializedPath("[@height]")]
    private ?int $height = null;

    #[SerializedPath("[@width]")]
    private ?int $width = null;

    #[SerializedPath("[@progressive]")]
    private ?int $progressive = null;

    #[SerializedPath("[@sample_aspect_den]")]
    private ?int $sampleAspectDen = null;

    #[SerializedPath("[@sample_aspect_num]")]
    private ?int $sampleAspectNum = null;

    public function getSampleAspectNum(): ?float
    {
        return $this->sampleAspectNum;
    }

    public function setSampleAspectNum(?int $sampleAspectNum): self
    {
        $this->sampleAspectNum = $sampleAspectNum;

        return $this;
    }

    public function getSampleAspectDen(): ?int
    {
        return $this->sampleAspectDen;
    }

    public function setSampleAspectDen(?int $sampleAspectDen): self
    {
        $this->sampleAspectDen = $sampleAspectDen;

        return $this;
    }

    public function getProgressive(): ?int
    {
        return $this->progressive;
    }

    public function setProgressive(?int $progressive): self
    {
        $this->progressive = $progressive;

        return $this;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getFrameRateNum(): ?float
    {
        return $this->frameRateNum;
    }

    public function setFrameRateNum(?int $frameRateNum): self
    {
        $this->frameRateNum = $frameRateNum;

        return $this;
    }

    public function getFrameRateDen(): ?int
    {
        return $this->frameRateDen;
    }

    public function setFrameRateDen(?int $frameRateDen): self
    {
        $this->frameRateDen = $frameRateDen;

        return $this;
    }

    public function getDisplayAspectNum(): ?int
    {
        return $this->displayAspectNum;
    }

    public function setDisplayAspectNum(?int $displayAspectNum): self
    {
        $this->displayAspectNum = $displayAspectNum;

        return $this;
    }

    public function getDisplayAspectDen(): ?int
    {
        return $this->displayAspectDen;
    }

    public function setDisplayAspectDen(?int $displayAspectDen): self
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

    public function getColorspace(): ?string
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
