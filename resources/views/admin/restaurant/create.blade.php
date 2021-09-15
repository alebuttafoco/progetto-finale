@extends('layouts.admin')

@section('titolo')
    <h3>Aggiungi un nuovo ristorante</h3>
@endsection

@section('content')
{{-- tasto INDIETRO --}}
{{-- <div class="actions_bar">
    <a href="{{ route('admin.restaurant.index') }}" class="btn btn-primary" role="button" aria-pressed="true"><i
            class="fa fa-chevron-left" aria-hidden="true"></i> Indietro</a>
</div> --}}

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

    <form action="{{ route('admin.restaurant.store') }}" method="post"
        enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nome Ristorante</label><small class="text-danger bigtxt">*</small>
            <input type="text" name="name" id="name" class="form-control"
                placeholder="Inserisci il nome del tuo ristorante" aria-describedby="titleHelp" maxlength="255" required
                value="{{ old('name') }}">
            <small id="titleHelp" class="text-muted">Lunghezza massima: 255 caratteri</small>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label><small class="text-danger bigtxt">*</small>
            <textarea class="form-control" name="description" id="description" rows="5" maxlength="1000"
                required>{{ old('description') }}</textarea>
            <small id="titleHelp" class="text-muted">Lunghezza massima: 1000 caratteri</small>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Immagine di copertina</label>
            <input type="file" class="form-control-file" name="image" id="image"
                placeholder="Carica la copertina per il tuo ristorante" aria-describedby="ImageHelp">
            <small id="ImgHelp" class="form-text text-muted">Max. 1 MB</small>
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="categories">Categoria</label><small class="text-danger bigtxt">*</small>
            <select class="form-control" name="categories[]" id="categories" multiple required>
                <option disabled selected> - Seleziona una categoria - </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('categories')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group d-flex">
            <div class="address">
                <label for="address">Indirizzo</label><small class="text-danger bigtxt">*</small>
                <input type="text" name="address" id="address" class="form-control" placeholder="Indirizzo Via / Viale"
                    aria-describedby="titleHelp" maxlength="255" required value="{{ old('address') }}">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="city">
                <label for="city">Città</label><small class="text-danger bigtxt">*</small>
                <input type="text" name="city" id="city" class="form-control" placeholder="Città"
                    aria-describedby="titleHelp" maxlength="255" required value="{{ old('city') }}">
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="cap">
                <label for="cap">CAP</label><small class="text-danger bigtxt">*</small>
                <input type="text" name="cap" id="cap" class="form-control" placeholder="CAP" aria-describedby="titleHelp"
                    maxlength="5" required value="{{ old('cap') }}">
                @error('cap')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="piva">P. IVA</label><small class="text-danger bigtxt">*</small>
            <input type="text" name="piva" id="piva" class="form-control" placeholder="Ex. 0000000-000"
                aria-describedby="titleHelp" maxlength="11" required value="{{ old('piva') }}">
            <small id="titleHelp" class="text-muted">Lunghezza massima: 11 caratteri</small>
            @error('piva')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-block btn-primary">Conferma</button>

    </form>
</div>
@endsection
