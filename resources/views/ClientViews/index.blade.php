<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CloverDx</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>
    <body class="antialiased">
        <div class="container" style="margin-top: 10%;">
            <div class="row">
                <div class="col">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('clients.store') }}">
                        @csrf
                        <label
                                for="id-{{ \App\Http\Containers\ClientContainer\Models\Client::ATTR_FIRSTNAME }}"
                                class="form-label"
                        >
                            Jméno
                        </label>
                        <input
                                type="text"
                                id="id-{{ \App\Http\Containers\ClientContainer\Models\Client::ATTR_FIRSTNAME }}"
                                name="{{ \App\Http\Containers\ClientContainer\Models\Client::ATTR_FIRSTNAME }}"
                                class="form-control"
                                value=""
                        >
                        @error(\App\Http\Containers\ClientContainer\Models\Client::ATTR_FIRSTNAME)
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label
                                for="id-{{ \App\Http\Containers\ClientContainer\Models\Client::ATTR_SURNAME }}"
                                class="form-label"
                        >
                            Příjmení
                        </label>
                        <input
                                type="text"
                                id="id-{{ \App\Http\Containers\ClientContainer\Models\Client::ATTR_SURNAME }}"
                                name="{{ \App\Http\Containers\ClientContainer\Models\Client::ATTR_SURNAME }}"
                                class="form-control"
                                value=""
                        >
                        @error(\App\Http\Containers\ClientContainer\Models\Client::ATTR_SURNAME)
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label
                                for="id-{{ \App\Http\Containers\ClientContainer\Models\Client::ATTR_TELEPHONE }}"
                                class="form-label"
                        >
                            Telefon
                        </label>
                        <input
                                type="text"
                                id="id-{{ \App\Http\Containers\ClientContainer\Models\Client::ATTR_TELEPHONE }}"
                                name="{{ \App\Http\Containers\ClientContainer\Models\Client::ATTR_TELEPHONE }}"
                                class="form-control"
                                value=""
                        >
                        @error(\App\Http\Containers\ClientContainer\Models\Client::ATTR_TELEPHONE)
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <input
                                type="submit"
                                value="Vložit"
                                class="btn btn-primary"
                        >
                    </form>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Jméno</th>
                            <th scope="col">Příjmení</th>
                            <th scope="col">Telefon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php /** @var \App\Http\Containers\ClientContainer\Models\Client $client */ @endphp
                        @foreach($clients as $client)
                            <tr>
                                <th scope="row">
                                    {{ $client->getKey() }}
                                </th>
                                <td>
                                    {{ $client->getFirstname() }}
                                </td>
                                <td>
                                    {{ $client->getSurname() }}
                                </td>
                                <td>
                                    {{ $client->getTelephone() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
