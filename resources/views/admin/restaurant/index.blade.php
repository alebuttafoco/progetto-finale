@extends('layouts.admin')

@section('titolo')
    <h2>I tuoi ristoranti</h2>
@endsection

@section('content')

    @if (!($restaurants === false))
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Nome</th>
                <th class="table_image">Image</th>
                <th>Indirizzo</th>
                <th>P. IVA</th>
                <th class="actions_title">Azioni</th>
            </tr>
        </thead>
            
        <tbody>
            @foreach ($restaurants as $restaurant)
                <tr class="text-center">
                    <td>{{ $restaurant->id }}</td>
                    <td>{{ $restaurant->name }}</td>
                    <td class="table_image"><img src="{{ $restaurant->image == null ? asset('img/cover_restaurant.jpg') : asset('storage/' . $restaurant->image) }}" alt=""></td>
                    <td>{{ $restaurant->address }} <br> {{ $restaurant->city }} <br> {{ $restaurant->cap }}</td>
                    <td>{{ $restaurant->piva }}</td>
                    
                    {{-- actions --}}
                    <td class="actions">
                        <div class="d-flex flex-column">
                            <a class="btn btn-success my-1" href="{{ route('admin.restaurant.show', $restaurant->id) }}">
                                <span>Visualizza</span>
                                <i class="fas fa-eye"></i>
                            </a>

                            <a class="btn btn-info my-1" href="{{ route('admin.restaurant.edit', $restaurant->id) }}">
                                <span>Modifica</span>
                                <i class="fas fa-edit"></i>
                            </a>
                           
                           {{-- DELETE BUTTON WITH MODAL --}}
                            <a class="btn btn-danger" data-toggle="modal"
                            data-target="#modal1">
                            <span>Elimina</span>
                            <i class="fas fa-trash-alt"></i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="modal1" tabindex="-1"
                                role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminazione - Ristorante N.{{ $restaurant->id }}
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <strong>ID:</strong> {{ $restaurant->id }}
                                                <br>
                                                <strong>NOME RISTORANTE:</strong> {{ $restaurant->name }}
                                                <br>
                                                <br>
                                                Sei sicuro di voler eliminare questo ristorante ed i suoi contenuti?
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.restaurant.destroy', $restaurant->id) }}"
                                                method="post">
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
                    </td>
                </tr>

                {{-- actions mobile --}}
                <tr>
                    <div class="actions_mobile">
                        <a class="btn btn-success my-1" href="{{ route('admin.restaurant.show', $restaurant->id) }}">
                            <span>Visualizza</span>
                            <i class="fas fa-eye"></i>
                        </a>

                        <a class="btn btn-info my-1" href="{{ route('admin.restaurant.edit', $restaurant->id) }}">
                            <span>Modifica</span>
                            <i class="fas fa-edit"></i>
                        </a>

                        {{-- DELETE BUTTON WITH MODAL --}}
                        <a class="btn btn-danger my-1" data-toggle="modal"
                        data-target="#modalphone"> <span>Elimina</span> <i class="fas fa-trash-alt"></i></a>
                        <!-- Modal -->
                        <div class="modal fade" id="modalphone" tabindex="-1"
                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Eliminazione - Ristorante N.{{ $restaurant->id }}
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <strong>ID:</strong> {{ $restaurant->id }}
                                            <br>
                                            <strong>NOME RISTORANTE:</strong> {{ $restaurant->name }}
                                            <br>
                                            <br>
                                            Sei sicuro di voler eliminare questo ristorante ed i suoi contenuti?
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Annulla</button>
                                        <form action="{{ route('admin.restaurant.destroy', $restaurant->id) }}"
                                            method="post">
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
                </tr>

                
            @endforeach
        @else
        <div class="d-flex flex-column flex-grow-1">
            {{-- Cosa appare se non hai un ristorante --}}
            <a class="btn btn-success mb-3" href="{{ route('admin.restaurant.create') }}">
                <i class="fas fa-plus"></i>
                Nuovo Ristorante
            </a>
    
            {{-- Badge di informazioni --}}
            <div class="alert alert-secondary alert-dismissible fade show mt-1" role="alert">
                Non hai nessun ristorante collegato a questo account.
                <br>
                Che aspetti a crearne uno?
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
        </tbody>
    </table>
@endsection
