<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use Illuminate\View\View;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('evenement', [

            'evenements' => Evenement::with('user')->latest()->get(),

        ]);
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
         $validated = $request->validate([
             'Nom' => 'required|string|max:255',
             'Evenement' => 'required|string',
             'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
 
         // Gérer l'upload de l'image s'il y en a une
         if ($request->hasFile('Image')) {
             $imagePath = $request->file('Image')->store('evenement', 'public');
             $validated['Image'] = $imagePath;
         }
 
         // Créer une nouvelle instance de l'événement
         $evenement = new Evenement();
         $evenement->Nom = $validated['Nom'];
         $evenement->Evenement = $validated['Evenement'];
         if (isset($validated['Image'])) {
             $evenement->Image = $validated['Image'];
         }
         $evenement->user_id = $request->user()->id;
         $evenement->save();
    // Redirection après enregistrement
    return redirect(route('evenement.index'));
    
}


    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evenement $evenement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        //
    }
}
