<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(){
        return view('contacto.index');
    }

    public function enviarFormulario(Request $request){
        $request->validate([
            'nombre'=>['required', 'string', 'min:3'],
            'apellidos'=>['required', 'string', 'min:4'],
            'mensaje'=>['required', 'string', 'min:10'],
        ]);
        $correo = new ContactoMailable($request->all());
        try{
            Mail::to('admin@mail.com')->send($correo);
        }catch(\Exception $ex){
            dd($ex->getMessage());
            return redirect()->route('dashboard')->with('contacto', "No se pudo enviar el correo");
        }
        return redirect()->route('dashboard')->with('contacto', "Correo enviado, gracias");
    }
}
