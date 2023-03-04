@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="main-container container-fluid">

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">{{ __('Cidades') }}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Cidades') }}</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW OPEN -->
<div class="row row-cards">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">{{ __('Listagem Cidades') }}</h3>
                <a href="{{ route('cities.create') }}" class="btn btn-primary">{{ __('Cadastrar') }}</a>
            </div>
            <div class="card-body">
            {{-- Alert Messages --}}
                @include('components.alert.alert')
            {{-- Alert Messages --}}

            <form method="GET" class="mb-5">
                <div class="input-group mb-3">
                    <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control"
                           placeholder="Procurar..." aria-label="Search" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="submit" id="button-addon2">{{ __('Filtrar') }}</button>
                </div>
            </form>

                <div class="table-responsive">
                    <table class="table border text-nowrap text-md-nowrap table-bordered mb-0" id="tableFormaPagamento">
                        <thead>
                            <th>{{ __('Cidades') }}</th>
                            <th>{{ __('Slug') }}</th>
                            <th>{{ __('Estado')}}</th>
                            <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Ações') }}</th>
                        </thead>
                        <tbody>
                            @foreach($cities as $city)
                            <tr>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->slug }}</td>
                                <td>{{ $city->state->name }}</td>
                                <td class="td-actions text-right">
                                    <form action="{{ route('cities.destroy', $city->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-primary" href="{{ route('cities.show', $city->id) }}" data-original-title="" title="">
                                            <i class="material-icons">Ver</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <a class="btn btn-warning" href="{{ route('cities.edit', $city->id) }}" data-original-title="" title="">
                                            <i class="material-icons">Editar</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="confirm('{{ __("Voce tem certeza que deseja excluir?") }}') ? this.parentElement.submit() : ''">
                                            <i class="material-icons">Apagar</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $cities->links() }}
            </div>
        </div>
    </div>
</div>
@endsection