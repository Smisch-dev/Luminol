<?php

namespace Luminol\Http\Controllers\Admin\Servers;

use JavaScript;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Luminol\Models\Nest;
use Luminol\Models\Server;
use Luminol\Exceptions\DisplayException;
use Luminol\Http\Controllers\Controller;
use Luminol\Services\Servers\EnvironmentService;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Luminol\Repositories\Eloquent\NestRepository;
use Luminol\Repositories\Eloquent\NodeRepository;
use Luminol\Repositories\Eloquent\MountRepository;
use Luminol\Repositories\Eloquent\ServerRepository;
use Luminol\Traits\Controllers\JavascriptInjection;
use Luminol\Repositories\Eloquent\LocationRepository;
use Luminol\Repositories\Eloquent\DatabaseHostRepository;

class ServerViewController extends Controller
{
    use JavascriptInjection;

    /**
     * ServerViewController constructor.
     */
    public function __construct(
        private DatabaseHostRepository $databaseHostRepository,
        private LocationRepository $locationRepository,
        private MountRepository $mountRepository,
        private NestRepository $nestRepository,
        private NodeRepository $nodeRepository,
        private ServerRepository $repository,
        private EnvironmentService $environmentService,
        private ViewFactory $view
    ) {
    }

    /**
     * Returns the index view for a server.
     */
    public function index(Request $request, Server $server): View
    {
        return $this->view->make('admin.servers.view.index', compact('server'));
    }

    /**
     * Returns the server details page.
     */
    public function details(Request $request, Server $server): View
    {
        return $this->view->make('admin.servers.view.details', compact('server'));
    }

    /**
     * Returns a view of server build settings.
     */
    public function build(Request $request, Server $server): View
    {
        $allocations = $server->node->allocations->toBase();

        return $this->view->make('admin.servers.view.build', [
            'server' => $server,
            'assigned' => $allocations->where('server_id', $server->id)->sortBy('port')->sortBy('ip'),
            'unassigned' => $allocations->where('server_id', null)->sortBy('port')->sortBy('ip'),
        ]);
    }

    /**
     * Returns the server startup management page.
     *
     * @throws \Luminol\Exceptions\Repository\RecordNotFoundException
     */
    public function startup(Request $request, Server $server): View
    {
        $nests = $this->nestRepository->getWithEggs();
        $variables = $this->environmentService->handle($server);

        $this->plainInject([
            'server' => $server,
            'server_variables' => $variables,
            'nests' => $nests->map(function (Nest $item) {
                return array_merge($item->toArray(), [
                    'eggs' => $item->eggs->keyBy('id')->toArray(),
                ]);
            })->keyBy('id'),
        ]);

        return $this->view->make('admin.servers.view.startup', compact('server', 'nests'));
    }

    /**
     * Returns all the databases that exist for the server.
     */
    public function database(Request $request, Server $server): View
    {
        return $this->view->make('admin.servers.view.database', [
            'hosts' => $this->databaseHostRepository->all(),
            'server' => $server,
        ]);
    }

    /**
     * Returns all the mounts that exist for the server.
     */
    public function mounts(Request $request, Server $server): View
    {
        $server->load('mounts');

        return $this->view->make('admin.servers.view.mounts', [
            'mounts' => $this->mountRepository->getMountListForServer($server),
            'server' => $server,
        ]);
    }

    /**
     * Returns the base server management page, or an exception if the server
     * is in a state that cannot be recovered from.
     *
     * @throws \Luminol\Exceptions\DisplayException
     */
    public function manage(Request $request, Server $server): View
    {
        if ($server->status === Server::STATUS_INSTALL_FAILED) {
            throw new DisplayException('This server is in a failed install state and cannot be recovered. Please delete and re-create the server.');
        }

        // Check if the panel doesn't have at least 2 nodes configured.
        $nodes = $this->nodeRepository->all();
        $canTransfer = false;
        if (count($nodes) >= 2) {
            $canTransfer = true;
        }

        JavaScript::put([
            'nodeData' => $this->nodeRepository->getNodesForServerCreation(),
        ]);

        return $this->view->make('admin.servers.view.manage', [
            'server' => $server,
            'locations' => $this->locationRepository->all(),
            'canTransfer' => $canTransfer,
        ]);
    }

    /**
     * Returns the server deletion page.
     */
    public function delete(Request $request, Server $server): View
    {
        return $this->view->make('admin.servers.view.delete', compact('server'));
    }
}
