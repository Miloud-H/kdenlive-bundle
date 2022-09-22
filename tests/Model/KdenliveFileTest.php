<?php

namespace MiloudH\KdenliveBundle\Tests\Model;

use MiloudH\KdenliveBundle\Model\KdenliveFile;
use PHPUnit\Framework\TestCase;

class KdenliveFileTest extends TestCase
{
    public function testCreateFromString(): void
    {
        $xml = <<<'XML'
<mlt version="7.0">
    <profile name="test" description="i love it" />
    <producer id="producer0" in="00:00:00" out="00:05:00" title="Test" mlt_service="test">
        <property name="resource">clip1.dv</property>
        <filter id="filter0" in="00:00:00" out="00:05:00" mlt_service="test" track="track_test">
            <property name="wip">zip</property>
        </filter>
    </producer>
    <playlist id="playlist0" in="00:00:00" out="00:05:00" title="Test">
        <property name="wip">zip</property>
        <entry producer="producer0" in="00:00:00" out="00:05:00">
            <producer id="producer1" in="00:05:00" out="00:10:00" title="Test 2" mlt_service="test">
                <property name="resource">clip1.dv</property>
                <filter id="filter0" in="00:00:00" out="00:05:00" mlt_service="test" track="track_test">
                    <property name="wip">zip</property>
                </filter>
            </producer>
            <playlist id="playlist2" in="00:20:00" out="00:25:00" title="Test 3">
                <property name="wip">zip</property>
                <entry producer="producer1" in="00:00:00" out="00:05:00">
                    <producer id="producer2" in="00:05:00" out="00:10:00" title="Test 2" mlt_service="test">
                        <property name="resource">clip1.dv</property>
                        <filter id="filter2" in="00:00:00" out="00:05:00" mlt_service="test" track="track_test">
                            <property name="wip">zip</property>
                        </filter>
                    </producer>
                </entry>
            </playlist>
            <tractor id="tractor0" in="00:20:00" out="00:25:00" title="Test 4">
                <property name="resource">clip1.dv</property>
            </tractor>
        </entry>
    </playlist>
</mlt>
XML;
        $file = new KdenliveFile();
        static::assertTrue($file->loadFromString($xml));
    }

    /**public function testCreateFromStringInvalid(): void
    {
        $xml = '<mlt>
  <producer id="producer0">
  </producer>
      <property name="resource">clip1.dv</property>
</mlt>';
        $file = new KdenliveFile();
        static::assertTrue($file->loadFromString($xml));
    }*/
}
