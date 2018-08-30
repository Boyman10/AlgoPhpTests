<?php

declare(strict_types=1);

namespace Graph\Entity;

/**
 * Graph representation with integer and associative array
 * can be directed or not directed
 * @version 1.0.0
 * @author Boyman10
 */
class Graph
{
     /**
     * @var array associative one
     */
    private $graph;

    public function __construct()
    {
        $graph = [];
    }

    /**
     * @return array
     */
    public function getGraph(): array
    {
        return $this->graph;
    }

    /**
     * @param array $graph
     */
    public function setGraph(array $graph): void
    {
        $this->graph = $graph;
    }


    /**
     * Adding link between 2 vertices
     * @param int $sourceNode
     * @param int $destNode
     */
    public function addLink(int $sourceNode, int $destNode) : void
    {
        $this->graph[$sourceNode][] = $destNode;
    }

}