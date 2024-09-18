<form class="d-inline" action="{{ route('comics.destroy', $comic) }}" method="POST"
    onsubmit="return confirm('Are you sure you want to permanently delete this comic? All \'{{ $comic->title }}\' data will be lost.')">
    @csrf
    @method('DELETE')

    <button title="Elimina" class="btn btn-danger" type="submit">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>
