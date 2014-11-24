<?php

namespace Bafford\BowerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bafford_bower');
        
        $rootNode
            ->children()
                ->scalarNode('bower_path')->isRequired()->cannotBeEmpty()->end()
            ->end()
        ;
        
        return $treeBuilder;
    }
}
