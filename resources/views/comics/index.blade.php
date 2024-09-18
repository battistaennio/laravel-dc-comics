@extends('layouts.main')

@section('content')
    <div class="container my-5">

        @if (session('delete_confirm'))
            <div class="alert alert-success" role="alert">
                {{ session('delete_confirm') }}
            </div>
        @endif

        <h1>Comics List</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Type</th>
                    <th scope="col">Thumb</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <th scope="row">{{ $comic->id }}</th>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->price }}</td>
                        <td>{{ $comic->type }}</td>
                        <td><img class="thumb" src="{{ $comic->thumb }}" alt="{{ $comic->title }}"></td>
                        <td>
                            {{-- dettaglio --}}
                            <a title="Dettaglio" class="btn btn-success" href="{{ route('comics.show', $comic) }}">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            {{-- modifica --}}
                            <a title="Modifica" class="btn btn-warning" href="{{ route('comics.edit', $comic) }}">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            {{-- elimina --}}
                            <form class="d-inline" action="{{ route('comics.destroy', $comic) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to permanently delete this comic? All \'{{ $comic->title }}\' data will be lost.')">
                                @csrf
                                @method('DELETE')

                                <button title="Elimina" class="btn btn-danger" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection


@section('titlePage')
    Comics List
@endsection
