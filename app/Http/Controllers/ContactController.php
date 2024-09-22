<?php

namespace App\Http\Controllers;
use App\Models\Contact; // Asegúrate de importar el modelo

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contactos = Contact::orderBy('created_at', 'desc')->get(); // Obtén todos los contactos ordenados
        return view('contactos.index', compact('contactos')); // Retorna la vista con los contactos
    }
    //
}
