<?php

namespace App\Http\Controllers\Filiere_matiere;

use App\Models\Filiere;
use Illuminate\Http\Request;
use App\Models\Filiere_matiere;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilMatRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;

class Filiere_matiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filMats = DB::table('filiere_matieres')->join('filieres', 'filiere_matieres.filiere_id', '=', 'filieres.id')
            ->join('matieres', 'filiere_matieres.matiere_id', '=', 'matieres.id')->select('filiere_matieres.masse', 'filiere_matieres.credit', 'matieres.nom as nom_mat','filieres.nom as nom_fil')->get();
            dd($filMats);
        return view('admin.fil_mat.index', [
            'fil_mats' => Filiere_matiere::Paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filiere = DB::table('filieres')->get();
        $matiere = DB::table('matieres')->get();

        return view('admin.fil_mat.form', [
            'fil_mat' => new Filiere_matiere,
            'filiere' => $filiere,
            'matiere' => $matiere,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilMatRequest $request)
    {
        $data = $request->validated();

        $verif = DB::table('filiere_matieres')->where('filiere_id', $data['filiere_id'])->where('matiere_id', $data['matiere_id'])->exists();

        if ($verif == true) {
            return to_route('admin.filiere_matiere.create')->with('fail', 'La liaison existe déjà');
        } else {

            $fil_mat = Filiere_matiere::create($request->validated());
            return to_route('admin.filiere_matiere.index')->with('success', 'La liaison a été effectué');
        }
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
    public function edit(Filiere_matiere $filiere_matiere)
    {
        $filiere = DB::table('filieres')->get();
        $matiere = DB::table('matieres')->get();

        return view('admin.fil_mat.form', [
            'fil_mat' => $filiere_matiere,
            'filiere' => $filiere,
            'matiere' => $matiere,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Filiere_matiere $filiere_matiere, FilMatRequest $request)
    {
        $data = $request->validated();
        
        $verif = DB::table('filiere_matieres')->where('filiere_id', $data['filiere_id'])->where('matiere_id', $data['matiere_id'])->exists();

        if ($verif == true) {
            return to_route('admin.filiere_matiere.edit', ['filiere_matiere' => $filiere_matiere])->with('fail', 'La liaison existe déjà');
        } else {
           $update =  $filiere_matiere->update($data);
            return to_route('admin.filiere_matiere.index')->with('success', 'La modification a été effectué');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere_matiere $filiere_matiere)
    {
       $filiere_matiere->delete();
       return to_route('admin.filiere_matiere.index')->with('success', 'La suppression a été effectué');
    }
}
