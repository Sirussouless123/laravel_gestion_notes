<?php

namespace App\Http\Controllers\Filiere;

use App\Models\Filiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FiliereFormRequest;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.filiere.index',
            [
                'filieres' => Filiere::paginate(10),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filiere = new Filiere; 
          return view('admin.filiere.form',[
            'filiere'=> $filiere,
          ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FiliereFormRequest $request)
    {
      
        $filiere = Filiere::create($request->validated());
        return to_route('admin.filiere.index')->with('success','La filière a été crée');
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
    public function edit(Filiere $filiere)
    {
         return view('admin.filiere.form',
         [
            'filiere'=>$filiere,
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FiliereFormRequest $request, Filiere $filiere)
    {
           $filiere->update($request->validated());

           return to_route('admin.filiere.index')->with('success', 'La filière a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
         $filiere->delete();
         return to_route('admin.filiere.index')->with("success", "La filière a été bien supprimé");
    }
}
