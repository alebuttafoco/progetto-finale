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
                    <th scope="col">restaurant_id</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">price</th>
                    <th scope="col">type</th>
                    <th scope="col">visible</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($plates as $plate)
                    <tr>
                        <th>{{ $plate->id }}</th>
                        <td>{{ $plate->restaurant_id }}</td>
                        <td><img height="80px" src="{{ $plate->image }}" alt=""></td>
                        <td>{{ $plate->name }}</td>
                        <td>{{ $plate->price }}</td>
                        <td>{{ $plate->type }}</td>
                        <td>{{ $plate->visible }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.plate.show', $plate->id) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-danger" href="#"><i class="fas fa-trash-alt"></i></a>

                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>


    </div>
@endsection
