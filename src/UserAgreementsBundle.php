<?php

namespace RobertvanLienden\UserAgreements;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class UserAgreementsBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('Resources/config/services.yaml');
        $builder->setParameter('user_agreements', $config);
        $builder->setParameter('user_agreements.user_entity', $config['user_entity']);
    }

    public function configure(DefinitionConfigurator $definition): void
    {
        // Configure agreements
        $definition->rootNode()
            ->children()
            ->scalarNode('user_entity')
            ->defaultValue('App\Entity\User')
            ->end()
            ->arrayNode('agreements')
            ->arrayPrototype()
            ->children()
            ->scalarNode('id')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('label')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('route_name')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->booleanNode('required')
            ->isRequired()
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
