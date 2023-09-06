<?php


namespace MiloudH\KdenliveBundle\Serializer;


use Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer;

class TimeCodeNormalizer extends DateIntervalNormalizer
{

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): \DateInterval
    {
        $h = 0;
        $m = 0;
        $us = 0;

        if (is_numeric($data)) {
            $s = (int) $data;
        } else {
            $exploded = explode(':', $data);

            $h = $exploded[0] ?? 0;
            $m = $exploded[1] ?? 0;
            $secAndMs = explode('.', $exploded[2] ?? []);
            $s = $secAndMs[0] ?? 0;
            $us = $secAndMs[1] ?? 0;
        }

        return parent::denormalize("P0Y0M0DT{$h}H{$m}M{$s}S", $type, $format, $context);
    }
}
