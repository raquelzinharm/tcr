<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Mostra o formulário de "Esqueci minha senha".
     */
    public function create()
    {
        return view('auth.user.forgot-password');
    }

    /**
     * Envia o link de redefinição de senha para o e-mail fornecido.
     */
    public function store(Request $request)
    {
        // Valida o campo de e-mail
        $request->validate(['email' => 'required|email']);

        // Tenta enviar o link de redefinição
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Verifica o status e retorna a resposta apropriada
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
