<?php

namespace RobertvanLienden\UserAgreements;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class UserAgreementBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('Resources/config/services.yaml');
    }

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
            ->arrayNode('agreements')
            ->arrayPrototype()
            ->children()
            ->scalarNode('title')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('version')
            ->defaultValue('1.0')
            ->end()
            ->end()
            ->end()
            ->end()
            ->end();
    }
}