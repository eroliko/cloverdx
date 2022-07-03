<?php

declare(strict_types=1);

namespace App\Http\Containers\ClientContainer\Queries;

use App\Http\Containers\ClientContainer\Contracts\ClientQueryInterface;
use App\Http\Containers\ClientContainer\Models\Client;
use App\Http\Core\Queries\QueryBuilder;

final class ClientQueryBuilder extends QueryBuilder implements ClientQueryInterface
{
    /**
     * Sets correct model
     */
    public function __construct()
    {
        $model = new Client();
        $model->registerGlobalScopes($this);
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function whereFirstName(string $firstname): ClientQueryInterface
    {
        return $this->where(Client::ATTR_FIRSTNAME, '=', $firstname);
    }

    /**
     * @inheritDoc
     */
    public function whereSurname(string $surname): ClientQueryInterface
    {
        return $this->where(Client::ATTR_SURNAME, '=', $surname);
    }

    /**
     * @inheritDoc
     */
    public function whereTelephone(string $telephone): ClientQueryInterface
    {
        return $this->where(Client::ATTR_TELEPHONE, '=', $telephone);
    }
}