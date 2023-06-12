<?php

namespace App\Http\Controllers\AnneeAcademique;

use App\Models\Annee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnneeFormRequest;

class AnneeAcademiqueController extends Controller
{
    public function index()
    {
       
        return view(
            'admin.annee_academique.index',
            [
                'annee_academiques' => Annee::paginate(6),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $annee_academique = new Annee; 
        return view('admin.annee_academique.form',[
          'annee_academique'=> $annee_academique,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnneeFormRequest $request)
    {
        $annee = Annee::create($request->validated());
        return to_route('admin.annee.index')->with('success','L\'année académique  a été crée');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annee $annee)
    {
        return view('admin.annee_academique.form',
        [
           'annee_academique'=>$annee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnneeFormRequest $request, Annee $annee)
    {
        $annee->update($request->validated());

           return to_route('admin.annee.index')->with('success', 'L\'année a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annee $annee)
    {
        $annee->delete();
         return to_route('admin.annee.index')->with("success", "L\'annee academique a été bien supprimé");
    }
}
