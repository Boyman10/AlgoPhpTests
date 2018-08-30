<?php

namespace Graph;

//require_once "../../../src/algorithm/graph/entity\Graph.php";
//require_once "../../../src/algorithm/graph/DFS.php";

require "../../../vendor/autoload.php";

use Graph\Entity\Graph;
use Graph\DFS;
use PHPUnit\Framework\TestCase;

/**
 * Created by Boyman10
 */
class DFSTest extends TestCase
{

    public function testPathBetween()
    {
        $graph = new Graph();
        $graph->setGraph([0 => [1, 2, 5], 1 => [0, 2, 5], 2 => [0, 1], 3 => [4, 5], 4 => [3, 5], 5 => [0, 1, 3, 4]]);
        $dfs = new DFS($graph);

        $this->assertSame([], $dfs->pathBetween(0,4));

    }


    public function testPathFrom()
    {
        $graph = new Graph();
        $graph->setGraph([0 => [1, 2, 5], 1 => [0, 2, 5], 2 => [0, 1], 3 => [4, 5], 4 => [3, 5], 5 => [0, 1, 3, 4]]);

        $dfs = new DFS($graph);
        $dfs->pathFrom(0);

        $this->assertSame([0,1,2,5,3,4], $dfs->getVisited());

        $graph->setGraph([0 => [1,2,3],1 => [0,2], 2 => [0,1,4], 3 => [0],[2]]);

        $dfs = new \Graph\DFS($graph);
        $dfs->pathFrom(0);
        $this->assertSame([0,1,2,4,3], $dfs->getVisited());

    }

    /**
     * Testing Oriented graph
     */
    public function testOrientedPathFrom()
    {
        $graph = new Graph();
        $graph->setGraph([0 => [1, 2], 1 => [3,4], 2 => [5], 3 => [6], 4 => [6], 5 => [4,6], 6 => []]);

        $dfs = new DFS($graph);
        $dfs->pathFrom(0);

        $this->assertSame([0,1,3,6,4,2,5], $dfs->getVisited());
    }
}
