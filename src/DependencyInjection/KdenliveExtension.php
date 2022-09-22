<?php


namespace MiloudH\KdenliveBundle\DependencyInjection;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class KdenliveExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $configDir = new FileLocator(__DIR__ . '/../../config');

        // Load the bundle's service declarations
        $loader = new YamlFileLoader($container, $configDir);
        $loader->load('services.yaml');
    }

    public function getAlias()
    {
        return 'kdenlive_bundle';
    }
}
