<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function alterarSenha()
    {
        return view('user.alterarSenha');
    }
    public function updateSenha(Request $request)  {
        //dd ($request->all());
        $messages = [
            'nome.required' => 'O nome do campo é obrigatório',
            'password_old.required' => 'A senha antiga é um campo obrigatório!' ,
            'password_new.required' => 'A senha nova é um campo obrigatório!' ,
            'password_new2.required' => 'A senha nova (repetir) é um campo obrigatório!' ,
        ];
        $validated = $request->validate([
            'password_old' => 'required|min:5',
            'password_new' => 'required|min:5|same:password_new2',
            'password_new2'=> 'required|min:5',
        ], $messages);


        if (Hash::check($request->password_old , auth()->user()->password)) {
         //dd (' É igual!');
         $user = auth()->user();
         $user->password = Hash::make($request->password_new);
         $user->save();
         return redirect()->back()->with('message', 'Senha alterada com sucesso');
        } else {
            return redirect()->back()->with('message', 'A senha antiga não confere.');
        }


    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
    $receitas = $user->receitas()->latest()->get();

    return view('profile', compact('user', 'receitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'descricao' => 'nullable|string|max:1000',
        ]);

        $user = auth()->user();
        $user->descricao = $request->descricao;
        $user->save();
    
        return redirect()->route('profile.show')->with('success', 'Perfil atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // app/Models/User.php

public function receitas()
{
    return $this->hasMany(Receita::class);
}

}
