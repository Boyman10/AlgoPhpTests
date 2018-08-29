<?php

namespace Graph;

require_once "../../../src/algorithm/graph/DFS.php";

use Graph\DFS;

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29/08/2018
 * Time: 21:13
 */
class DFSTest extends \PHPUnit_Framework_TestCase
{

    public function testPathBetween()
    {
        $dfs = new DFS([[1, 2, 5], [0, 2, 5], [0, 1], [4, 5], [3, 5], [0, 1, 3, 4]]);

        $this->assertSame([], $dfs->pathBetween(0,4));

    }


    public function testPathFrom()
    {
        $dfs = new DFS([[1, 2, 5], [0, 2, 5], [0, 1], [4, 5], [3, 5], [0, 1, 3, 4]]);
        $dfs->pathFrom(0);

        $this->assertSame([0,1,2,5,3,4], $dfs->getVisited());

        $dfs = new \Graph\DFS([[1,2,3],[0,2],[0,1,4],[0],[2]]);
        $dfs->pathFrom(0);
        $this->assertSame([0,1,2,4,3], $dfs->getVisited());

    }
}
