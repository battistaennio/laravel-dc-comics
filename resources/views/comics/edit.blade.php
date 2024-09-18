@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>Editor comic "{{ $comic->title }}"</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <h4>Attenzione!</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{ old('title', $comic->title) }}" name="title" type="text" class="form-control"
                    id="title" placeholder="add title">
                @error('title')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input value="{{ old('thumb', $comic->thumb) }}" name="thumb" type="text" class="form-control"
                    id="thumb" placeholder="add thumb">
                @error('thumb')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input value="{{ old('price', $comic->price) }}" name="price" type="text" class="form-control"
                    id="price" placeholder="add price">
                @error('price')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input value="{{ old('series', $comic->series) }}" name="series" type="text" class="form-control"
                    id="series" placeholder="add series">
                @error('series')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale date</label>
                <input value="{{ old('sale_date', $comic->sale_date) }}" name="sale_date" type="text"
                    class="form-control" id="sale_date" placeholder="add sale date">
                @error('sale_date')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input value="{{ old('type', $comic->type) }}" name="type" type="text" class="form-control"
                    id="type" placeholder="add type">
                @error('type')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" placeholder="add description">{{ old('description', $comic->description) }}</textarea>
            </div>


            <div class="mb-3">
                <button type="submit" href="#" class="btn btn-success">Modifica</button>
                <button type="reset" href="#" class="btn btn-danger">Annulla</button>
            </div>

        </form>
    </div>
@endsection


@section('titlePage')
    Comics List
@endsection
