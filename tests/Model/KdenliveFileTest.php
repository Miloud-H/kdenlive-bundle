<?php

namespace MiloudH\KdenliveBundle\Tests\Model;

use MiloudH\KdenliveBundle\Model\KdenliveFile;
use MiloudH\KdenliveBundle\Model\Playlist;
use MiloudH\KdenliveBundle\Model\Playlist\Blank;
use MiloudH\KdenliveBundle\Model\Playlist\Entry;
use MiloudH\KdenliveBundle\Model\Producer;
use MiloudH\KdenliveBundle\Model\Profile;
use MiloudH\KdenliveBundle\Model\Property;
use MiloudH\KdenliveBundle\Model\Track\Filter;
use MiloudH\KdenliveBundle\Model\Track\Tractor;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class KdenliveFileTest extends TestCase
{
    private Serializer $serializer;

    protected function setUp(): void
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader());
        /** @var SerializerInterface $serializer */
        $this->serializer = new Serializer(
            [
                new ObjectNormalizer($classMetadataFactory, null, null, new ReflectionExtractor()),
                new ArrayDenormalizer(),
            ],
            [
                new XmlEncoder()
            ]
        );
    }

    public function testDeserialize(): void
    {
        $result = $this->serializer->deserialize(
            file_get_contents(__DIR__ . '/fixtures/expected.xml'),
            KdenliveFile::class,
            'xml'
        );

        self::assertEquals($this->createExpectedKdenlive(), $result);
    }

    public function testSerialize(): void
    {
        $result = $this->serializer->serialize($this->createExpectedKdenlive(), 'xml', [
            XmlEncoder::FORMAT_OUTPUT => true,
            XmlEncoder::ROOT_NODE_NAME => 'mlt',
        ]);
        $xml = file_get_contents(__DIR__ . '/fixtures/expected.xml');

        self::assertSame($xml, $result);
    }

    public function testDeserializeRealFile(): void
    {
        /** @var KdenliveFile $result */
        $result = $this->serializer->deserialize(
            file_get_contents(__DIR__ . '/fixtures/148848493-54se32lx87quf/scenario.kdenlive'),
            KdenliveFile::class,
            'xml'
        );

        $result->getProducers()[9]->setIn('00:00:00.000');

        $serialized = $this->serializer->serialize($result, 'xml', [
            XmlEncoder::FORMAT_OUTPUT => true,
            XmlEncoder::ROOT_NODE_NAME => 'mlt',
        ]);
        file_put_contents(__DIR__ . '/fixtures/148848493-54se32lx87quf/scenario_edited.kdenlive', $serialized);

        dump($result);
    }

    private function createExpectedKdenlive(): KdenliveFile
    {
        return (new KdenliveFile())
            ->setVersion(7.0)
            ->setRoot('/tmp/root')
            ->setTitle('I love tests')
            ->addProfile(
                (new Profile())
                ->setName('test')
                ->setDescription('i love tests')
                ->setColorspace('test')
                ->setDisplayAspectNum(16)
                ->setDisplayAspectDen(1.0)
                ->setFrameRateNum(60)
                ->setFrameRateDen(1.0)
                ->setWidth(1080)
                ->setHeight(720)
                ->setProgressive(1.0)
                ->setSampleAspectNum(5)
                ->setSampleAspectDen(4.0)
            )
            ->addProducer(
                (new Producer())
                    ->setId('producer0')
                    ->setIn('00:00:00')
                    ->setOut('00:05:00')
                    ->setTitle('Test')
                    ->setMltService('test')
                    ->addProperty(
                        (new Property())
                            ->setName('resource')
                            ->setValue('clip1.dv')
                    )
                    ->addFilter(
                        (new Filter())
                            ->setId('filter0')
                            ->setIn('00:00:00')
                            ->setOut('00:05:00')
                            ->setMltService('test')
                            ->setTrack('track_test')
                            ->addProperty(
                                (new Property())
                                    ->setName('wip')
                                    ->setValue('zip')
                            )
                    )
            )
            ->addPlaylist(
                (new Playlist())
                    ->setId('playlist0')
                    ->setIn('00:00:00')
                    ->setOut('00:05:00')
                    ->setTitle('Test')
                    ->addProperty(
                        (new Property())
                            ->setName('wip')
                            ->setValue('zip')
                    )
                    ->addEntry(
                        (new Entry())
                            ->setProducer('producer0')
                            ->setIn('00:00:00')
                            ->setOut('00:05:00')
                            ->addProducers(
                                (new Producer())
                                    ->setId('producer1')
                                    ->setIn('00:05:00')
                                    ->setOut('00:10:00')
                                    ->setTitle('Test 2')
                                    ->setMltService('test')
                                    ->addProperty(
                                        (new Property())
                                            ->setName('resource')
                                            ->setValue('clip1.dv')
                                    )
                                    ->addFilter(
                                        (new Filter())
                                            ->setId('filter0')
                                            ->setIn('00:00:00')
                                            ->setOut('00:05:00')
                                            ->setMltService('test')
                                            ->setTrack('track_test')
                                            ->addProperty(
                                                (new Property())
                                                    ->setName('wip')
                                                    ->setValue('zip')
                                            )
                                    )
                            )
                            ->addPlaylist(
                                (new Playlist())
                                    ->setId('playlist2')
                                    ->setIn('00:20:00')
                                    ->setOut('00:25:00')
                                    ->setTitle('Test 3')
                                    ->addProperty(
                                        (new Property())
                                            ->setName('wip')
                                            ->setValue('zip')
                                    )
                                    ->addEntry(
                                        (new Entry())
                                            ->setProducer('producer1')
                                            ->setIn('00:00:00')
                                            ->setOut('00:05:00')
                                            ->addProducers(
                                                (new Producer())
                                                    ->setId('producer2')
                                                    ->setIn('00:05:00')
                                                    ->setOut('00:10:00')
                                                    ->setTitle('Test 2')
                                                    ->setMltService('test')
                                                    ->addProperty(
                                                        (new Property())
                                                            ->setName('resource')
                                                            ->setValue('clip1.dv')
                                                    )
                                                    ->addFilter(
                                                        (new Filter())
                                                            ->setId('filter2')
                                                            ->setIn('00:00:00')
                                                            ->setOut('00:05:00')
                                                            ->setMltService('test')
                                                            ->setTrack('track_test')
                                                            ->addProperty(
                                                                (new Property())
                                                                    ->setName('wip')
                                                                    ->setValue('zip')
                                                            )
                                                    )
                                            )
                                    )
                            )
                            ->addTractor(
                                (new Tractor())
                                    ->setId('tractor1')
                                    ->setIn('00:20:00')
                                    ->setOut('00:25:00')
                                    ->setTitle('Test 4')
                                    ->addProperty(
                                        (new Property())
                                            ->setName('resource')
                                            ->setValue('clip1.dv')
                                    )
                                    ->addFilter(
                                        (new Filter())
                                            ->setId('filter1')
                                            ->setIn('00:20:00')
                                            ->setOut('00:25:00')
                                            ->setMltService('test')
                                            ->setTrack('track_test')
                                            ->addProperty(
                                                (new Property())
                                                    ->setName('wip')
                                                    ->setValue('zip')
                                            )
                                    )
                            )
                    )
                    ->addBlank(
                        (new Blank())
                            ->setLength(5)
                    )
            )
            ->addTractor(
                (new Tractor())
                    ->setId('tractor2')
                    ->setIn('00:00:00')
                    ->setOut('00:05:00')
                    ->setTitle('Test 5')
                    ->addProperty(
                        (new Property())
                            ->setName('resource')
                            ->setValue('clip1.dv')
                    )
                    ->addFilter(
                        (new Filter())
                            ->setId('filter2')
                            ->setIn('00:00:00')
                            ->setOut('00:05:00')
                            ->setMltService('test')
                            ->setTrack('track_test')
                            ->addProperty(
                                (new Property())
                                    ->setName('wip')
                                    ->setValue('zip')
                            )
                    )
            );
    }
}
