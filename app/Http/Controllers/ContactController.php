<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Store a newly created contact in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'servicio_interes' => 'required|in:Diseño Web,Diseño de Aplicaciones,Branding',
            'detalles_proyecto' => 'required|string|max:1000',
        ], [
            'nombre.required' => 'El nombre es requerido',
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'El correo electrónico no es válido',
            'servicio_interes.required' => 'El servicio de interés es requerido',
            'detalles_proyecto.required' => 'Los detalles del proyecto son requeridos',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Mensaje enviado correctamente. Te contactaremos pronto.');
    }

    /**
     * Display a listing of contacts for admin.
     */
    public function index()
    {
    
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
       
        return Inertia::render('Admin/Contacts/Index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Mark a contact as read.
     */
    public function markAsRead(Contact $contact)
    {
        $contact->update(['leido' => true]);

        return redirect()->back()->with('success', 'Contacto marcado como leído.');
    }

    /**
     * Show the specified contact.
     */
    public function show(Contact $contact)
    {
        if (!$contact->leido) {
            $contact->update(['leido' => true]);
        }

        return Inertia::render('Admin/Contacts/Show', [
            'contact' => $contact
        ]);
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->back()->with('success', 'Contacto eliminado correctamente.');
    }
}
