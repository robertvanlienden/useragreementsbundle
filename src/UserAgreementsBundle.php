<?php

namespace RobertvanLienden\UserAgreements;

use RobertvanLienden\UserAgreements\DependencyInjection\DoctrineMappingPass;
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
    }

    public function configure(DefinitionConfigurator $definition): void
    {
        // Configure agreements
        $definition->rootNode()
                ->children()
                    ->arrayNode('agreements')
                        ->arrayPrototype()
                            ->children()
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