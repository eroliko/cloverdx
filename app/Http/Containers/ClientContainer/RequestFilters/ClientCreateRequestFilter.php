<?php

declare(strict_types=1);

namespace App\Http\Containers\ClientContainer\RequestFilters;

use App\Http\Containers\ClientContainer\Models\Client;
use App\Http\Core\Requests\RequestFilter;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

final class ClientCreateRequestFilter extends RequestFilter
{
    public const FIELD_FIRSTNAME = Client::ATTR_FIRSTNAME;

    public const FIELD_SURNAME = Client::ATTR_SURNAME;

    public const FIELD_TELEPHONE = Client::ATTR_TELEPHONE;

    /**
     * ProductRequestFilter constructor.
     *
     * @param \Illuminate\Validation\Factory $factory
     */
    public function __construct(
        private readonly Factory $factory
    )
    {
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     * @throws ValidationException
     */
    public function getValidatedData(Request $request): array
    {
        return $this->validate($request);
    }

    /**
     * Check if request is valid.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     * @throws ValidationException
     */
    public function validate(Request $request): array
    {
        $validator = $this->getValidator($request);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Validation\Validator
     */
    private function getValidator(Request $request): Validator
    {
        return $this->factory->make($request->all(), $this->getRules($request));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    private function getRules(Request $request): array
    {
        $isPatch = $request->isMethod('PATCH');
        $required = $isPatch ? 'sometimes' : 'required';

        return [
            self::FIELD_FIRSTNAME => [
                $required,
                'string',
                'max:' . Client::LIMIT_FIRSTNAME,
            ],
            self::FIELD_SURNAME => [
                $required,
                'string',
                'max:' . Client::LIMIT_SURNAME
            ],
            self::FIELD_TELEPHONE => [
                $required,
                'string',
                'max:' . Client::ATTR_TELEPHONE,
                function (string $attribute, string $value, callable $fail): void {
                    $this->validateTelephone($value, $fail);
                }
            ]
        ];
    }

    /**
     * @param string $value
     * @param callable $fail
     * @return void
     */
    private function validateTelephone(string $value, callable $fail): void
    {
        if (! \preg_match('/\d+/m', $value)) {
            $fail('Wrong telephone number format!');
        }
    }
}