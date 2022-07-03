<?php

declare(strict_types=1);

namespace App\Http\Containers\ClientContainer\Repositories;

use App\Http\Containers\ClientContainer\Contracts\ClientRepositoryInterface;
use App\Http\Containers\ClientContainer\Queries\ClientQueryBuilder;
use App\Http\Containers\ClientContainer\Models\Client;
use Illuminate\Support\Collection;
use App\Http\Containers\ClientContainer\Contracts\ClientQueryInterface;

final class ClientRepository implements ClientRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function get(int $id): Client
    {
        /** @var \App\Http\Containers\ClientContainer\Models\Client $transaction */
        $transaction = $this->query()->getById($id);
        return $transaction;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): Collection
    {
        return $this->query()->getAll();
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Client
    {
        $transaction = new Client();
        $transaction->compactFill($data);
        $this->save($transaction);

        return $transaction;
    }

    /**
     * @inheritDoc
     */
    public function save(Client $transaction): void
    {
        $transaction->save();
    }

    /**
     * @inheritDoc
     */
    public function delete(Client $transaction): void
    {
        $transaction->delete();
    }

    /**
     * @inheritDoc
     */
    public function query(): ClientQueryInterface
    {
        return new ClientQueryBuilder();
    }
}