@extends('layouts.admin')
@section('titolo')
    <h1>Aggiungi un nuovo piatto</h1>

@endsection

@section('content')
{{-- bottone INDIETRO --}}
{{-- <a class="btn btn-success mb-3" href="{{ route('admin.plate.index') }}">
    <i class="fas fa-chevron-left"></i>
    Indietro
</a> --}}


<div class="admin_form">
    @include('components.error')
    {{-- Alert per campi obbligatori --}}
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        Completa i <strong>campi obbligatori *</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <form method="POST" action="{{ route('admin.plate.store') }}" enctype="multipart/form-data">
        @csrf

        {{-- Name --}}
        <div class="form-group">
            <label for="name">Nome</label>
            <small class="text-danger bigtxt">*</small>

            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Image --}}
        <div class="form-group">
            <label for="image">Immagine</label>
            <small class="text-danger bigtxt">*</small>

            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                value="{{ old('image') }}" required autocomplete="image" autofocus>

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        {{-- Description --}}
        <div class="form-group">
            <label for="description">Descrizione</label>
            <small class="text-danger bigtxt">*</small>

            <textarea class="form-control" id="description"
                class="form-control @error('description') is-invalid @enderror" rows="3" name="description" required
                autocomplete="description" autofocus maxlength="1000">{{ old('description') }}</textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Price --}}
        <div class="form-group">
            <label for="price">Prezzo</label>
            <small class="text-danger bigtxt">*</small>

            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                value="{{ old('price') }}" required autocomplete="price" step="0.01">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Type --}}
        <div class="form-group">
            <label for="type">Tipo</label>
            <small class="text-danger bigtxt">*</small>

            <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                <option selected>Scegli tipo</option>
                <option value="primo">Primo</option>
                <option value="secondo">Secondo</option>
                <option value="contorni">Contorni</option>
                <option value="bevande">Bevande</option>
            </select>

            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        {{-- Visible --}}
        <div class="form-group">
            <label for="visible">Visibilità</label>
            <small class="text-danger bigtxt">*</small>

            <div>
                <input type="radio" name="visible" required checked id="visible" value="1">
                <span class="mr-3">Visibile</span>
                <input type="radio" name="visible" required id="visible" value="0">
                <span>Nascondi</span>
            </div>
        </div>

        <div class="form-check">
        </div>
        <button type="submit" class="btn btn-block btn-primary">Aggiungi</button>
    </form>
</div>
@endsection
