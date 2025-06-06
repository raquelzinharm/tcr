<?php

// app/Http/Controllers/FavoriteController.php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store($id)
    {
        $receita = Receita::findOrFail($id);
        auth()->user()->favoritas()->syncWithoutDetaching([$receita->id]);

        return back()->with('success', 'Receita adicionada aos favoritos!');
    }

    public function destroy($id)
    {
        $receita = Receita::findOrFail($id);
        auth()->user()->favoritas()->detach($receita->id);

        return back()->with('success', 'Receita removida dos favoritos.');
    }
}
