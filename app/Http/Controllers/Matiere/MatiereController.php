<?php

namespace App\Http\Controllers\Matiere;

use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MatiereFormRequest;


class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.matiere.index',
            [
                'matieres' => Matiere::paginate(10),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matiere = new Matiere; 
        return view('admin.matiere.form',[
          'matiere'=> $matiere,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatiereFormRequest $request)
    {
        $matiere = matiere::create($request->validated());
        return to_route('admin.matiere.index')->with('success','La matière a été crée');
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
    public function edit(Matiere $matiere)
    {
        return view('admin.matiere.form',
        [
           'matiere'=>$matiere,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatiereFormRequest $request, Matiere $matiere)
    {
        $matiere->update($request->validated());

           return to_route('admin.matiere.index')->with('success', 'La matière a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
         return to_route('admin.matiere.index')->with("success", "La matiere a été bien supprimé");
    }
}
