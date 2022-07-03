<?php

declare(strict_types=1);

namespace App\Http\Containers\ClientContainer\Actions;

use App\Http\Containers\ClientContainer\Contracts\ClientRepositoryInterface;
use App\Http\Core\Actions\Action;

final class ClientCreateAction extends Action
{
    /**
     * @param \App\Http\Containers\ClientContainer\Contracts\ClientRepositoryInterface $clientRepository
     */
    public function __construct(
        private readonly ClientRepositoryInterface $clientRepository
    )
    {
    }

    /**
     * @param array $data
     */
    public function run(array $data): void
    {
        $this->clientRepository->create($data);
    }
}