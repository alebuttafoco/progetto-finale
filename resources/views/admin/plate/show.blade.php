@extends('layouts.admin')

@section('titolo')
    <h1>{{ $plate->name }}</h1>
    
@endsection

@section('content')
<div>
    <a class="btn btn-success mb-4" href="{{URL::previous()}}"> <i class="fas fa-chevron-left"></i> Indietro</a>
</div>
    <div>

        <div>
            <img height="200px" src="{{ asset('storage/' . $plate->image) }}" alt="">
        </div>
        <div class="my-3">
            <h3>Description:</h3>
            <p>{{ $plate->description }}</p>

            <h3>Price:</h3>
            <span>{{ $plate->price }} €</span>

            <h3>Type:</h3>
            <span>{{ $plate->type }}</span>

            <h3>Visible:</h3>
            <span>{{ $plate->visible === 0 ? 'Non visibile' : 'Visibile' }}</span>

        </div>
        <div>

            <a href="{{ route('admin.plate.edit', $plate->id) }}" class="btn btn-secondary">
                <i class="fas fa-edit"></i>
            </a>

            {{-- DELETE BUTTON WITH MODAL --}}
            <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModalID{{ $plate->id }}"><i
                    class="fas fa-trash-alt"></i></a>

            <!-- Modal -->
            <div class="modal fade" id="deleteModalID{{ $plate->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminazione Piatto: {{ $plate->name }}</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <strong>ID:</strong> {{ $plate->id }}
                                <br>
                                <strong>NOME PIATTO:</strong> {{ $plate->name }}
                                <br>
                                <br>
                                Sei sicuro di voler eliminare questo piatto?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                            <form action="{{ route('admin.plate.destroy', $plate->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END DELETE BUTTON WITH MODAL --}}
        </div>
    </div>
@endsection
