<?php

declare(strict_types=1);

namespace App\Http\Containers\ClientContainer\Actions;

use App\Http\Containers\ClientContainer\Contracts\ClientRepositoryInterface;
use App\Http\Core\Actions\Action;
use Illuminate\Support\Collection;

final class ClientGetAction extends Action
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
     * @return \Illuminate\Support\Collection
     */
    public function run(): Collection
    {
        return $this->clientRepository->getAll();
    }
}