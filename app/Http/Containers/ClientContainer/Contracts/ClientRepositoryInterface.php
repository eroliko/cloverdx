<?php

declare(strict_types=1);

namespace App\Http\Containers\ClientContainer\Contracts;

use App\Http\Containers\ClientContainer\Models\Client;
use Illuminate\Support\Collection;

interface ClientRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return \App\Http\Containers\ClientContainer\Models\Client
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function get(int $id): Client;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAll(): Collection;

    /**
     * @param array $data
     * @return \App\Http\Containers\ClientContainer\Models\Client
     */
    public function create(array $data): Client;

    /**
     * @param \App\Http\Containers\ClientContainer\Models\Client $transaction
     */
    public function save(Client $transaction): void;

    /**
     * @param \App\Http\Containers\ClientContainer\Models\Client $transaction
     */
    public function delete(Client $transaction): void;

    /**
     * @return \App\Http\Containers\ClientContainer\Contracts\ClientQueryInterface
     */
    public function query(): ClientQueryInterface;
}