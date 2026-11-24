<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les messages de contact depuis la base de données
        $messages = Contact::all();

        // Passer les messages à la vue
        return view('contact.index', ['messages' => $messages]);
    }
    

        public function store(Request $request)
        {
            // Validation des données
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string|max:1000',
            ]);
    
            // Enregistrement des données dans la base de données
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);
    
            // Redirection avec un message de succès
            return redirect()->back()->with('success', 'Votre message a été envoyé avec succès!');
        }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
 
    }
    public function for(){
        return view('contact');
    }
}
