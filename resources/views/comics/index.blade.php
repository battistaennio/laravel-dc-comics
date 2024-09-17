@extends('layouts.main')

@section('content')
    <div class="container my-5">
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
                            <a class="btn btn-warning" href="{{ route('comics.show', $comic) }}">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>

                            <a class="btn btn-warning" href="{{ route('comics.edit', $comic) }}">
                                <i class="fa-solid fa-pencil"></i>
                            </a>

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
