<?php

namespace App\Http\Controllers;

use App\Models\TokenModelo;
use Illuminate\Http\Request;
//
use App\Mail\TokenMail;
use Illuminate\Support\Facades\Mail;

use App\Models\User;  // Modelo User de Laravel
use Illuminate\Support\Facades\Hash;
class TokenController extends Controller
{
    public function enviarToken(Request $request)
    {
       // Validar el correo
    $request->validate([
        'email' => 'required|email|exists:users,email',  // Verificar que el email exista en la tabla users
    ]);

    try {
        // Generar un token aleatorio que servirá como contraseña temporal
        $token = bin2hex(random_bytes(8));  // Token de 16 caracteres

        // Buscar el usuario por su email
        $user = User::where('email', $request->email)->first();

        // Guardar el token hasheado como contraseña temporal en la base de datos
        $user->password = Hash::make($token);
        $user->save();

        // Enviar el correo con el token (contraseña temporal)
        Mail::to($request->email)->send(new TokenMail($token));

        return back()->with('success', 'Se ha enviado una nueva contraseña temporal a tu correo electrónico.');
    } catch (\Exception $e) {
        // Manejo del error en caso de que algo falle
        return back()->with('error', 'Ocurrió un problema al enviar el correo: ' . $e->getMessage());
    }
    }
    /**
     * Display a listing of the resource.
     */
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
    public function show(TokenModelo $tokenModelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TokenModelo $tokenModelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TokenModelo $tokenModelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TokenModelo $tokenModelo)
    {
        //
    }
}
