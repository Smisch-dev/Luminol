<?php

namespace Luminol\Http\Controllers\Admin\Nodes;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Luminol\Models\Node;
use Spatie\QueryBuilder\QueryBuilder;
use Luminol\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory as ViewFactory;

class NodeController extends Controller
{
    /**
     * NodeController constructor.
     */
    public function __construct(private ViewFactory $view)
    {
    }

    /**
     * Returns a listing of nodes on the system.
     */
    public function index(Request $request): View
    {
        $nodes = QueryBuilder::for(
            Node::query()->with('location')->withCount('servers')
        )
            ->allowedFilters(['uuid', 'name'])
            ->allowedSorts(['id'])
            ->paginate(25);

        return $this->view->make('admin.nodes.index', ['nodes' => $nodes]);
    }
}
