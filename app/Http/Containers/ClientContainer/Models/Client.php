<?php

declare(strict_types=1);

namespace App\Http\Containers\ClientContainer\Models;

use App\Http\Core\Models\Model;

final class Client extends Model
{
    /**
     * Public attributes
     */
    public const ATTR_ID = 'id';

    public const ATTR_FIRSTNAME = 'firstname';

    public const ATTR_SURNAME = 'surname';

    public const ATTR_TELEPHONE = 'telephone';

    /**
     * Public limits
     */
    public const LIMIT_FIRSTNAME = 128;

    public const LIMIT_SURNAME = 128;

    public const LIMIT_TELEPHONE = 32;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        self::ATTR_FIRSTNAME,
        self::ATTR_SURNAME,
        self::ATTR_TELEPHONE
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Fill model with compact data.
     *
     * @param array $data
     */
    public function compactFill(array $data): void
    {
        $this->fill($data);
    }

}