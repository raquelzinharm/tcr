<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function __construct()
    {
        // Só quem está autenticado pode criar/editar/excluir
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Lista todas as categorias (público)
     */
    public function index()
    {
        $categorias = Categoria::withCount('receitas')->get();
        return view('categoria.index', compact('categorias'));
    }

    /**
     * Exibe uma categoria com suas receitas (público)
     */
    public function show($id)
    {
        $categoria = Categoria::with('receitas.autor')->findOrFail($id);
        return view('categoria.show', compact('categoria'));
    }

    /**
     * Formulário de criação de categoria (restrito)
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Armazena uma nova categoria (restrito)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome',
        ]);

        Categoria::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('categoria.index')->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Formulário de edição de categoria (restrito)
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Atualiza uma categoria existente (restrito)
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome,' . $categoria->id,
        ]);

        $categoria->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('categoria.index')->with('success', 'Categoria atualizada!');
    }

    /**
     * Remove uma categoria (restrito)
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categoria.index')->with('success', 'Categoria excluída.');
    }
}
