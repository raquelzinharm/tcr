<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReceitaController extends Controller
{
    // Apenas autenticar para ações de modificação (create, store, edit, update, destroy)
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Listar todas as receitas (público)
     */
    public function index()
    {
        $receitas = Receita::with('categoria', 'autor')->latest()->paginate(10);
        $categorias = Categoria::all();

        return view('receita.index', compact('receitas', 'categorias'));
    }

    /**
     * Exibir uma receita individual (público)
     */
    public function show($id)
    {
        $receita = Receita::with('categoria', 'autor')->findOrFail($id);
        return view('receita.show', compact('receita'));
    }

    /**
     * Formulário de criação de nova receita (privado)
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('receita.create', compact('categorias'));
    }

    /**
     * Armazenar nova receita no banco (privado)
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tempo_preparo' => 'required|string',
            'dificuldade' => 'required|string',
            'porcoes' => 'required|integer',
            'imagem' => 'nullable|image|max:2048',
            'ingredientes' => 'required|array',
            'instrucoes' => 'required|array',
            'dica' => 'nullable|string',
            'nutricao' => 'nullable|array',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $dados = $request->all();
        $dados['user_id'] = Auth::id();

        if ($request->hasFile('imagem')) {
            $dados['imagem'] = $request->file('imagem')->store('receitas', 'public');
        }

        Receita::create($dados);

        return redirect()->route('receita.index')->with('success', 'Receita criada com sucesso!');
    }

    /**
     * Formulário de edição de receita (privado)
     */
    public function edit($id)
    {
        $receita = Receita::findOrFail($id);

        // Só autor pode editar
        if ($receita->user_id !== Auth::id()) {
            abort(403);
        }

        $categorias = Categoria::all();
        return view('receita.edit', compact('receita', 'categorias'));
    }

    /**
     * Atualizar uma receita existente (privado)
     */
    public function update(Request $request, $id)
    {
        $receita = Receita::findOrFail($id);

        if ($receita->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tempo_preparo' => 'required|string',
            'dificuldade' => 'required|string',
            'porcoes' => 'required|integer',
            'imagem' => 'nullable|image|max:2048',
            'ingredientes' => 'required|array',
            'instrucoes' => 'required|array',
            'dica' => 'nullable|string',
            'nutricao' => 'nullable|array',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            if ($receita->imagem) {
                Storage::disk('public')->delete($receita->imagem);
            }
            $dados['imagem'] = $request->file('imagem')->store('receitas', 'public');
        }

        $receita->update($dados);

        return redirect()->route('receita.show', $receita->id)->with('success', 'Receita atualizada!');
    }

    /**
     * Deletar uma receita (privado)
     */
    public function destroy($id)
    {
        $receita = Receita::findOrFail($id);

        if ($receita->user_id !== Auth::id()) {
            abort(403);
        }

        if ($receita->imagem) {
            Storage::disk('public')->delete($receita->imagem);
        }

        $receita->delete();

        return redirect()->route('receita.index')->with('success', 'Receita deletada.');
    }
}
