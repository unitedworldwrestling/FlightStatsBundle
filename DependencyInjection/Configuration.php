<?php

namespace Spiicy\Bundle\FlightStatsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('spiicy_flight_stats');

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('spiicy_flight_stats');
        }

        $rootNode->children()
            ->scalarNode('app_id')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('app_key')->isRequired()->cannotBeEmpty()->end()
        ->end();

        return $treeBuilder;
    }
}
