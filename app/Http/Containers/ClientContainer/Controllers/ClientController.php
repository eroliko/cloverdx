<?php

declare(strict_types=1);

namespace App\Http\Containers\ClientContainer\Controllers;

use App\Http\Containers\ClientContainer\Actions\ClientCreateAction;
use App\Http\Containers\ClientContainer\Actions\ClientGetAction;
use App\Http\Containers\ClientContainer\RequestFilters\ClientCreateRequestFilter;
use App\Http\Core\Controllers\Controller;
use App\Http\Core\HttpStatuses\HttpStatuses;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class ClientController extends Controller
{
    /**
     * @param \App\Http\Containers\ClientContainer\Actions\ClientGetAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(ClientGetAction $action): View
    {
        return view('ClientViews.index', [
            'clients' => $action->run()
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Http\Containers\ClientContainer\Actions\ClientCreateAction $createAction
     * @param \App\Http\Containers\ClientContainer\RequestFilters\ClientCreateRequestFilter $requestFilter
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(
        Request $request,
        ClientCreateAction $createAction,
        ClientCreateRequestFilter $requestFilter
    ): RedirectResponse
    {
        $data = $requestFilter->getValidatedData($request);
        $createAction->run($data);

        return redirect()
            ->back()
            ->with('message', 'Client created!');
    }
}