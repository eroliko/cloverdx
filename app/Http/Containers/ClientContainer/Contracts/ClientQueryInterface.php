<?php

declare(strict_types=1);

namespace App\Http\Containers\ClientContainer\Contracts;

use App\Http\Core\Contracts\QueryBuilderInterface;

interface ClientQueryInterface extends QueryBuilderInterface
{
    /**
     * @param string $firstname
     * @return \App\Http\Containers\ClientContainer\Contracts\ClientQueryInterface
     */
    public function whereFirstName(string $firstname): self;

    /**
     * @param string $surname
     * @return \App\Http\Containers\ClientContainer\Contracts\ClientQueryInterface
     */
    public function whereSurname(string $surname): self;

    /**
     * @param string $telephone
     * @return \App\Http\Containers\ClientContainer\Contracts\ClientQueryInterface
     */
    public function whereTelephone(string $telephone): self;
}