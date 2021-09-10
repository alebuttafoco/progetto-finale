@extends('layouts.admin')

@section('titolo')
    <h1>Modifica piatto</h1>
@endsection

@section('content')
    <a class="btn btn-success mb-3" href="{{ route('admin.plate.index') }}">
        <i class="fas fa-chevron-left"></i>
        Indietro
    </a>

    @include('components.error')

    {{-- Alert per campi obbligatori --}}
    <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
        <i class="fas fa-info-circle"></i>
        Completa i <strong>campi obbligatori *</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form class="mt-5" method="POST" action="{{ route('admin.plate.update', $plate->id) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="form-group">
            <label for="name">Nome</label><small class="text-danger bigtxt">*</small>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ $plate->name }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Current Image --}}
        <div class="form-group">
            <label for="image">Immagine attuale</label>
            <div>
                <img width="100" src="{{ asset('storage/' . $plate->image) }}" alt="">
            </div>
        </div>

        {{-- Image --}}
        <div class="form-group">
            <label for="image">Image</label>

            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" autofocus>

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
                autocomplete="description" autofocus maxlength="1000">{{ $plate->description }}</textarea>

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
                value="{{ $plate->price }}" required autocomplete="price" step="0.01">

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
                <option>Scegli tipo</option>
                <option value="primo" @if ($plate->type == 'primo') selected @endif>Primo</option>
                <option value="secondo" @if ($plate->type == 'secondo') selected @endif>Secondo</option>
                <option value="contorni" @if ($plate->type == 'contorni') selected @endif>Contorni</option>
                <option value="bevande" @if ($plate->type == 'bevande') selected @endif>Bevande</option>
            </select>

            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        {{-- Visible --}}
        <div class="form-group">
            <label for="visible">Visibile</label>
            <small class="text-danger bigtxt">*</small>

            <input type="radio" name="visible" required id="visible" value="1" @if ($plate->visible === 1) checked @endif>
            <span class="mr-3">Visibile</span>
            <input type="radio" name="visible" required id="visible" value="0" @if ($plate->visible === 0) checked @endif>
            <span>Non Visibile</span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Aggiorna Piatto</button>
        </div>
    </form>
@endsection
