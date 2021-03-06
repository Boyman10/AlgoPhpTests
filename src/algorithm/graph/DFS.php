<?php
declare(strict_types=1);

namespace Graph;

use Graph\Entity\Graph;

//require_once "entity/Graph.php";

/**
 * Depth First Search algorithm utility
 * Sample Graph : graph1 = [[1, 2, 5], [0, 2, 5], [0, 1], [4, 5], [3, 5], [0, 1, 3, 4]]
 * @version 1.0.0
 * @see https://karczmarczuk.users.greyc.fr/matrs/Fuprog/Doc/recherche.pdf
 */
class DFS
{
    /**
     * @var Graph representing a graph : array of list items
     */
    private $graph;

    private $visited = [];
    private $stack = [];

    /**
     * @var int size
     */
    private $size = 0;

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return array with path from source using DFS
     */
    public function getVisited(): array
    {
        return $this->visited;
    }

    /**
     * Reset everything except the graph :
     */
    public function reset() : void
    {
        $this->visited = [];
        $this->stack = [];
        $size = 0;
        $origin = null;
    }

    /**
     * Class constructor
     * @param Graph $aGraph
     */
    public function __construct(Graph $aGraph)
    {

        if (!is_null($aGraph))
            $this->graph = $aGraph;
        else
            $this->graph = new Graph();

    }

    /**
     * Determine the path from the source node traversing the whole graph using DFS algorithm
     * @param int $source
     */
    public function pathFrom(int $source) : void
    {
        $this->visited[] = $source;

        if (array_key_exists ($source, $this->graph->getGraph()))
            foreach ($this->graph->getGraph()[$source] as $val) {

                if (!in_array($val, $this->visited))
                    $this->pathFrom($val);
            }

    }

    /**
     * Determine the longest path from the source node traversing the whole graph using DFS algorithm
     * @param int $source
     */
    public function longestPathFrom(int $source) : void
    {
        $this->visited[] = $source;

        if (array_key_exists ($source, $this->graph->getGraph())) {
            foreach ($this->graph->getGraph()[$source] as $val) {

                if (!in_array($val, $this->visited) && !in_array($val, $this->stack))
                    $this->longestPathFrom($val);
            }

            // @todo : we can update an array here by merging viisted and stack to get the path
            $this->stack = [];
            array_pop($this->visited);

        } else {

            // NO more path from that :
            $this->size = (count($this->visited) > $this->size)? count($this->visited):$this->size;
            $this->stack[] = array_pop($this->visited);
        }

    }


    /**
     * Getting the path from source to destination in the graph
     * @param int $source
     * @param int $destination
     * @return array with path in it
     */
    public function pathBetween(int $source, int $destination) : array
    {

        // 1. Pick a starting node and push all its adjacent nodes into a stack.
        // [[1, 2, 5], [0, 2, 5], [0, 1], [4, 5], [3, 5], [0, 1, 3, 4]] ex : node 0 -> 1,2,5
        $path = [];

        $visited = [];
        $stack = [];

        foreach ($this->graph->getGraph()[$source] as $val) {
            array_push($stack, $val);
        }



        return $path;
    }


}