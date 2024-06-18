<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function dashboard(): View
    {
        $evenements = Evenement::with('user')->latest()->get();
        return view('dashboard', compact('evenements'));
    }

     public function admin(): View
    {
        $evenements = Evenement::with('user')->latest()->get();
        return view('admin', compact('evenements'));
    }   
    public function index(): View
    {
             return view('evenement');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('evenement');    
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
    return redirect()->route('evenement.index')->with('success', 'Événement créé avec succès.');    
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
    public function bulkDelete(Request $request)
{
    $validated = $request->validate([
        'selected_evenements' => 'required|array',
        'selected_evenements.*' => 'integer',
    ]);

    Evenement::whereIn('id', $validated['selected_evenements'])->delete();

    return redirect()->route('admin.dashboard')->with('success', 'Événements supprimés avec succès.');
}
}
