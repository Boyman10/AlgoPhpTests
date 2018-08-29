<?php
declare(strict_types=1);

namespace Graph;

/**
 * Depth First Search algorithm utility
 * Sample Graph : graph1 = [[1, 2, 5], [0, 2, 5], [0, 1], [4, 5], [3, 5], [0, 1, 3, 4]]
 * @version 1.0.0
 * @see https://karczmarczuk.users.greyc.fr/matrs/Fuprog/Doc/recherche.pdf
 */
class DFS
{
    /**
     * @var array representing a graph : array of list items
     */
    private $graph;

    private $visited = [];
    private $stack = [];

    /**
     * @return array with path from source using DFS
     */
    public function getVisited(): array
    {
        return $this->visited;
    }


    /**
     * Class constructor
     * @param array $aGraph
     */
    public function __construct(array $aGraph)
    {

        if (!is_null($aGraph))
            $this->graph = $aGraph;
        else
            $this->graph = array();

    }

    /**
     * @return array
     */
    public function getGraph()
    {
        return $this->graph;
    }

    /**
     * @param array $graph
     */
    public function setGraph($graph)
    {
        $this->graph = $graph;
    }


    /**
     * Determine the path from the source node traversing the whole graph using DFS algorithm
     * @param int $source
     */
    public function pathFrom(int $source)
    {
        $this->visited[] = $source;

        foreach ($this->graph[$source] as $val) {

            if (!in_array($val, $this->visited))
                $this->pathFrom($val);
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

        foreach ($this->graph[$source] as $val) {
            array_push($_stack, $val);
        }



        return $path;
    }


}