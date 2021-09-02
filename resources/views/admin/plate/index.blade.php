@extends('layouts.admin')

@section('titolo')
    <h1>Lista piatti</h1>

@endsection

@section('content')
    <div>

        <a class="btn btn-success mb-3" href="{{ route('admin.plate.create') }}">
            <i class="fas fa-plus"></i>
            Nuovo piatto
        </a>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">image</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">type</th>
                    <th scope="col">visible</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>

                @if ($plates === false)
                    <h1>Nessun piatto</h1>
                @else
                    @foreach ($plates as $plate)
                        <tr>
                            <th>{{ $plate->id }}</th>
                            <td><img width="100" src="{{ asset('storage/' . $plate->image) }}" alt=""></td>
                            <td>{{ $plate->name }}</td>
                            <td>{{ $plate->price }}</td>
                            <td>{{ $plate->type }}</td>
                            <td>{{ $plate->visible }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.plate.destroy', $plate->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.plate.edit', $plate->id) }}" class="btn btn-secondary">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- DELETE BUTTON WITH MODAL --}}
                                <a class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModalID{{ $plate->id }}"><i class="fas fa-trash-alt"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModalID{{ $plate->id }}" tabindex="-1"
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

                            </td>
                        </tr>

                    @endforeach
                @endif
            </tbody>
        </table>


    </div>
@endsection
