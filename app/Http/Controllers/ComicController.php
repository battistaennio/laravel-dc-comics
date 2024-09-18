<?php

namespace App\Http\Controllers;

use App\Functions\Helper;
use App\Http\Requests\ComicRequest;
use App\Models\Comic;
use Illuminate\Http\Request;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::orderBy('id', 'desc')->get();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComicRequest $request)
    {
        // validazione
        // $request->validate(
        //     [
        //         'title' => 'required|min:3|max:50',
        //         'thumb' => 'required|max:255',
        //         'price' => 'required|min:3|max:10',
        //         'series' => 'required|min:3|max:150',
        //         'sale_date' => 'required|date|max:50',
        //         'type' => 'required|max:50'
        //     ],
        //     [
        //         'title.required' => 'Il campo title è obbligatorio',
        //         'title.min' => 'Il campo title deve contenere almeno :min caratteri',
        //         'title.max' => 'Il campo title può contenere massimo :max caratteri',

        //         'thumb.required' => 'Il campo thumb è obbligatorio',
        //         'thumb.max' => 'Il campo thumb può contenere massimo :max caratteri',

        //         'price.required' => 'Il campo price è obbligatorio',
        //         'price.min' => 'Il campo price deve contenere almeno :min caratteri',
        //         'price.max' => 'Il campo price può contenere massimo :max caratteri',

        //         'series.required' => 'Il campo series è obbligatorio',
        //         'series.min' => 'Il campo series deve contenere almeno :min caratteri',
        //         'series.max' => 'Il campo series può contenere massimo :max caratteri',

        //         'sale_date.required' => 'Il campo sale_date è obbligatorio',
        //         'sale_date.date' => 'Non hai inserito una data corretta',
        //         'sale_date.max' => 'Il campo sale_date può contenere massimo :max caratteri',

        //         'type.required' => 'Il campo type è obbligatorio',
        //         'type.max' => 'Il campo type può contenere massimo :max caratteri',
        //     ]
        // );

        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        // $new_comic = new Comic();
        // $new_comic->fill($data);
        // $new_comic->save();
        $new_comic = Comic::create($data);

        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::find($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::find($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $comic = Comic::find($id);

        if ($data['title'] != $comic->title) {
            $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        }

        $comic->update($data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::find($id);
        $comic->delete();

        return redirect()->route('comics.index')->with('delete_confirm', 'Comic "' . $comic->title . '" deleted successfully');
    }
}
