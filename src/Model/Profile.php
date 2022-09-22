<?php


namespace MiloudH\KdenliveBundle\Model;


use SimpleXMLElement;

class Profile
{
    private ?string $name = null;
    private ?string $colorspace = null;
    private ?string $description = null;
    private ?string $displayAspectDen = null;
    private ?string $displayAspectNum = null;
    private ?float $frameRateDen = null;
    private ?float $frameRateNum = null;
    private ?float $height = null;
    private ?float $width = null;
    private ?float $progressive = null;
    private ?float $sampleAspectDen = null;
    private ?float $sampleAspectNum = null;
    
    public static function createFromXmlElement(SimpleXMLElement $element): self
    {
        return (new self())
            ->setName($element['name'])
            ->setColorspace($element['colorspace'])
            ->setDescription($element['description'])
            ->setDisplayAspectDen($element['display_aspect_den'])
            ->setDisplayAspectNum($element['display_aspect_num'])
            ->setFrameRateDen(isset($element['frame_rate_den']) ? (float) $element['frame_rate_den'] : null)
            ->setFrameRateNum(isset($element['frame_rate_num']) ? (float) $element['frame_rate_num'] : null)
            ->setWidth(isset($element['width']) ? (float) $element['width'] : null)
            ->setHeight(isset($element['height']) ? (float) $element['height'] : null)
            ->setProgressive(isset($element['progressive']) ? (float) $element['progressive'] : null)
            ->setSampleAspectDen(isset($element['sample_aspect_den']) ? (float) $element['sample_aspect_den'] : null)
            ->setSampleAspectNum(isset($element['sample_aspect_num']) ? (float) $element['sample_aspect_num'] : null);
    }

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

    public function getDisplayAspectNum(): ?string
    {
        return $this->displayAspectNum;
    }

    public function setDisplayAspectNum(?string $displayAspectNum): self
    {
        $this->displayAspectNum = $displayAspectNum;

        return $this;
    }

    public function getDisplayAspectDen(): ?string
    {
        return $this->displayAspectDen;
    }

    public function setDisplayAspectDen(?string $displayAspectDen): self
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
    
    public function setColorspace(?string $colorspace): self
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
