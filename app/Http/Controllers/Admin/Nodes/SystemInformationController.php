<?php

namespace Luminol\Http\Controllers\Admin\Nodes;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Luminol\Models\Node;
use Illuminate\Http\JsonResponse;
use Luminol\Http\Controllers\Controller;
use Luminol\Repositories\Wings\DaemonConfigurationRepository;

class SystemInformationController extends Controller
{
    /**
     * SystemInformationController constructor.
     */
    public function __construct(private DaemonConfigurationRepository $repository)
    {
    }

    /**
     * Returns system information from the Daemon.
     *
     * @throws \Luminol\Exceptions\Http\Connection\DaemonConnectionException
     */
    public function __invoke(Request $request, Node $node): JsonResponse
    {
        $data = $this->repository->setNode($node)->getSystemInformation();

        return new JsonResponse([
            'version' => $data['version'] ?? '',
            'system' => [
                'type' => Str::title($data['os'] ?? 'Unknown'),
                'arch' => $data['architecture'] ?? '--',
                'release' => $data['kernel_version'] ?? '--',
                'cpus' => $data['cpu_count'] ?? 0,
            ],
        ]);
    }
}
