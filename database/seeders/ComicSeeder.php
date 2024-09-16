<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics');
        foreach ($comics as $comic) {
            $new_comic = new Comic();
            $new_comic->title = $comic['title'];
            $new_comic->slug = $this->generateSlug($new_comic->title);
            $new_comic->description = $comic['description'];
            $new_comic->thumb = $comic['thumb'];
            $new_comic->price = $comic['price'];
            $new_comic->series = $comic['series'];
            $new_comic->sale_date = $comic['sale_date'];
            $new_comic->type = $comic['type'];
            $new_comic->save();
        }
    }

    private function generateSlug($string)
    {

        /*
            1. ricevo la stringa da "sluggare"
            2. genero lo slug
            3. faccio una query al db per verificare se lo slug è ancora presente
            4. SE non è presente lo slug generato è valido e lo restitisco
            5. SE è presente ne genero uno mantenedo il valore iniziale con concatenato un numero incrementale
            6. una volta generato lo restiuisco

        */
        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        // se trovo uno slug esistente $exists non sarà null
        $exists = Comic::where('slug', $slug)->first();

        // inizializzo un contatore
        $c = 1;

        // ciglo fino a quano exists non diventa null
        // queso ciclo partirà solo se lo slug è presnte
        while ($exists) {
            $slug = $original_slug . '-' . $c;
            $exists = Comic::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
