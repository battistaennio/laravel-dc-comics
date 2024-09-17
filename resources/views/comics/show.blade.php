@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>
            Comic "{{ $comic->title }}" detail
            <a class="btn btn-warning" href="{{ route('comics.edit', $comic) }}">
                <i class="fa-solid fa-pencil"></i>
            </a>
        </h1>

        <div class="row justify-content-center">
            <div class="col-3 text-center">
                <img class="img-fluid" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
            </div>
        </div>

        <div class="row my-1">
            <h3>Description:</h3>
            <div class="col">
                <p>{{ $comic->description }}</p>
            </div>
        </div>

        <div class="row my-1">
            <h3>Released:</h3>
            <div class="col">
                <p>{{ $comic->sale_date }}</p>
            </div>
        </div>

        <div class="row my-1">
            <h3>Series:</h3>
            <div class="col">
                <p>{{ $comic->series }}</p>
            </div>
        </div>

        <div class="row my-1">
            <h3>Price:</h3>
            <div class="col">
                <p>{{ $comic->price }}</p>
            </div>
        </div>

        <div class="row my-1">
            <h3>Type:</h3>
            <div class="col">
                <p>{{ $comic->type }}</p>
            </div>
        </div>

        <div class="row my-1">
            <div class="col">
                <a class="btn btn-warning" href="{{ route('comics.index') }}">Torna alla lista</a>
            </div>
        </div>


    </div>
@endsection


@section('titlePage')
    Comics List
@endsection
