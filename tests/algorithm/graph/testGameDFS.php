<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d",
    $n // the number of relationships of influence
);

$graph = new Graph();

$nodes = [];

for ($i = 0; $i < $n; $i++)
{
    fscanf(STDIN, "%d %d",
        $x, // a relationship of influence between two people (x influences y)
        $y
    );

    $graph->addLink($x,$y);

    if(!in_array($x,$nodes))
        $nodes[] = $x;
    if(!in_array($y,$nodes))
        $nodes[] = $y;

}


/* now fill empty spaces :
foreach($nodes as $val)
    if (!array_key_exists ($val, $graph->getGraph()))
        $graph->addNode($val);
*/

error_log(var_export($graph, true));
$size = 0;
$path = [];

// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));
foreach($nodes as $val)
{
    $dfs = new DFS($graph);

    $dfs->pathFrom($val);
    $path = $dfs->getVisited();

    error_log(var_export($path, true));

    if ($path !== null)
        $size = (count($path) > $size)? count($path):$size;
}

// The number of people involved in the longest succession of influences
echo("$size\n");


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

    /**
     * @param int $node
     */
    public function addNode(int $node) : void
    {
        $this->graph[$node] = [];
    }
}


class DFS
{
    /**
     * @var Graph representing a graph : array of list items
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

        foreach ($this->graph->getGraph()[$source] as $val) {

            if (!in_array($val, $this->visited))
                $this->pathFrom($val);
        }

    }




}
?>

