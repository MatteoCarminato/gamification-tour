@extends('layouts.app')

@section('content')

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">{{ __('Países') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Países') }}</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW OPEN -->
    <div class="row row-cards">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Editar País') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <form method="POST" action="{{ route('countries.update', $country->id) }}" enctype="multipart/form-data" class="needs-validation @if($errors->all()) was-validated @endif" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col-xl-2 mb-2">
                                        <label for="cod_ref">{{ __('Código de Referência') }}</label>
                                        <input class="form-control" readonly value="{{ $country->id }}" />
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <label>{{ __('Nome') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: $country->name }}" required autofocus >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Sigla') }}</label>
                                        <input type="text" class="form-control" id="acronym" name="acronym" value="{{ old('acronym') ?: $country->acronym }}" required >
                                        @error('acronym')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('Slug') }}</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') ?: $country->slug }}" required >
                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-2 mb-3">
                                        <label>{{ __('DDD') }}</label>
                                        <input type="text" class="form-control" id="phone_code" name="phone_code" value="{{ old('phone_code') ?: $country->phone_code }}" required >
                                        @error('phone_code')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <label>{{ __('Logo') }}</label>                                        
                                        <div class="col-md-12"> 
                                            <input type="file" name="flag" class="form-control" data-bs-height="180">
                                            <img src="{{ Storage::url($country->flag) }}" alt="{{ $country->name }}" width="300px">
                                        </div>
                                        @error('flag')
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-xl-11"></div>
                                        <div class="col-xl-1">
                                            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection