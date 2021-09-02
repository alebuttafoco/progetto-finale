@extends('layouts.admin')
@section('titolo')
    <h1>Aggiungi un nuovo piatto</h1>

@endsection

@section('content')
    <a class="btn btn-success mb-3" href="{{ route('admin.plate.index') }}">
        <i class="fas fa-chevron-left"></i>
        Indietro
    </a>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.plate.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <div class="form-group row">
                <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-11">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Image --}}
            <div class="form-group row">
                <label for="image" class="col-md-1 col-form-label text-md-right">{{ __('Image') }}</label>

                <div class="col-md-11">
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        value="{{ old('image') }}" required autocomplete="image" autofocus>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Description --}}
            <div class="form-group row">
                <label for="description" class="col-md-1 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-11">
                    <textarea class="form-control" id="description"
                        class="form-control @error('description') is-invalid @enderror" rows="3" name="description"
                        required autocomplete="description" autofocus>{{ old('description') }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Price --}}
            <div class="form-group row">
                <label for="price" class="col-md-1 col-form-label text-md-right">{{ __('Price') }}</label>

                <div class="col-md-11">
                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}" required autocomplete="price" step="0.01">

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Type --}}
            <div class="form-group row">
                <label for="type" class="col-md-1 col-form-label text-md-right">{{ __('Type') }}</label>

                <div class="col-md-11">
                    <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                        <option selected>Choose...</option>
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

            </div>

            {{-- Visible --}}
            <div class="form-group row">
                <label for="visible" class="col-md-1 col-form-label text-md-right">{{ __('Visible') }}</label>

                <div class="col-md-11">
                    <input type="radio" name="visible" required id="visible" value="1">
                    <span class="mr-3">Visible</span>
                    <input type="radio" name="visible" required id="visible" value="0">
                    <span>No Visible</span>

                </div>



            </div>

            <div class="form-check">
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-success">
                        {{ __('Add Plate') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
