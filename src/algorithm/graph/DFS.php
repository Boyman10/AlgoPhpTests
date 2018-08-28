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

    /**
     * Class constructor
     * @param array $aGraph
     */
    public function DFS(array $aGraph)
    {

        if (!is_null($aGraph))
            $this->graph = $aGraph;
        else
            $this->graph = array();
    }


    /**
     * Getting the path from source to destination in the graph
     * @param int $source
     * @param int $destination
     * @return array with path in it
     */
    public function pathBetween(int $source, int $destination) : array
    {
        $path = [];

        return $path;
    }


}