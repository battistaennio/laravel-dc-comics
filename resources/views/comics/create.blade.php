@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>New Comic</h1>

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="add title">
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input name="thumb" type="text" class="form-control" id="thumb" placeholder="add thumb">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" type="text" class="form-control" id="price" placeholder="add price">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input name="series" type="text" class="form-control" id="series" placeholder="add series">
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale date</label>
                <input name="sale_date" type="text" class="form-control" id="sale_date" placeholder="add sale date">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input name="type" type="text" class="form-control" id="type" placeholder="add type">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" placeholder="add description"></textarea>
            </div>


            <div class="mb-3">
                <button type="submit" href="#" class="btn btn-success">Invia</button>
                <button type="reset" href="#" class="btn btn-danger">Annulla</button>
            </div>

        </form>
    </div>
@endsection


@section('titlePage')
    Comics List
@endsection
