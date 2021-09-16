@extends('layouts.admin')

@section('titolo')
    <h1>Lista piatti</h1>

@endsection

@section('content')
<div class="dash_content d-flex flex-column w-100">
    {{-- nuovo piatto --}}
    <a class="btn btn-success mb-3" href="{{ route('admin.plate.create') }}">
        <i class="fas fa-plus"></i>
        Nuovo piatto
    </a>
    
    {{-- Badge di informazioni --}}
    @if ($plates === false)
    <div class="alert alert-secondary alert-dismissible fade show mt-1" role="alert">
        I tuoi ristoranti sono vuoti...
        <br>
        Forse sarebbe meglio inserire qualche piatto!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @else

    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th class="table_image">image</th>
                <th>name</th>
                <th class="actions_title">price</th>
                <th class="actions_title">type</th>
                <th class="actions_title">visible</th>
                <th>Azioni</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($plates as $plate)
                <tr class="text-center">
                    <th>{{ $plate->id }}</th>
                    <td class="table_image"><img width="100" src="{{ asset('storage/' . $plate->image) }}" alt=""></td>
                    <td>{{ $plate->name }}</td>
                    <td class="actions_title">{{ $plate->price }}</td>
                    <td class="actions_title">{{ $plate->type }}</td>
                    <td class="actions_title">{{ $plate->visible }}</td>

                    {{-- actions --}}
                    <td class="actions">
                        <div class="d-flex flex-column">
                            <a class="btn btn-success my-1" href="{{ route('admin.plate.show', $plate->id) }}">
                                <span>Visualizza</span>
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.plate.edit', $plate->id) }}" class="btn btn-secondary my-1">
                                <span>Modifica</span>
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- DELETE BUTTON WITH MODAL --}}
                            <a class="btn btn-danger" data-toggle="modal" data-target="#modal"> 
                                <span>Elimina</span> 
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="modal" tabindex="-1"
                                role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.plate.destroy', $plate->id) }}"
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

                    {{-- actions mobile --}}
                    <td class="plate_actions ">
                        <div class="d-flex justify-content-around">
                            <a class="btn btn-success my-1" href="{{ route('admin.plate.show', $plate->id) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.plate.edit', $plate->id) }}" class="btn btn-secondary my-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            {{-- DELETE BUTTON WITH MODAL --}}
                            <a class="btn btn-danger my-1" data-toggle="modal" data-target="#modalphone"> 
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="modalphone" tabindex="-1"
                                role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.plate.destroy', $plate->id) }}"
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
                @endforeach


            </tbody>
        </table>
        @endif

    @if ($plates != null)
    {{$plates->links()}}
    @endif    
</div>
@endsection
