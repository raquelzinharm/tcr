<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Postagem;
use App\Models\User;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::orderBy('nome', 'ASC')->get();
        $autores = User::orderBy('name', 'ASC')->get();
        //$postagens = Postagem::where ('user_id', $id)->orderBy('created_at', 'DESC')->paginate(10);
        $autor = User::find($id);
          // return view ('welcome', compact('categorias' , 'postagens', 'autores','autor'));

        $query = Postagem::query();

        if ($request->has('q') && $request->q != '') {
            $search = $request->q;
            $query->where('titulo', 'like', "%{$search}%")
                  ->orWhere('descricao', 'like', "%{$search}%");
        }

        $postagens = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('welcome', compact('categorias', 'postagens', 'autores','autor'));
    }

    // ... seus outros métodos aqui ...
}
