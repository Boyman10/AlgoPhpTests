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
}
