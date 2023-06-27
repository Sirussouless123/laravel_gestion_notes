@extends('layouts.app')
@section('title','Filière')

@section('content')

<div class="d-flex justify-content-between align-items-center mt-5 ">
    <h1 class="text-center">@yield('title')</h1>

    <a href="{{ route('admin.filiere.create') }} " class="btn btn-success">Ajouter une filière</a>

</div>

<div class="row d-flex mt-5 ">

      <table class="table-striped  ">

        <thead>
            <tr>

                <th>N°</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($filieres as $filiere)
                  <tr >
                    <td>{{ $filiere->nom }}</td>
                    <div class="d-flex gap-2 justify-content-end w-100"> 
                        <td>
                              <a href="{{ route('admin.filiere.edit', ['filiere'=>$filiere])}}" class="btn btn-warning">Modifier</a>
                        </td>

                        <td>
                            <form action="{{ route('admin.filiere.destroy',['filiere'=>$filiere]) }}" method="post">
                            @csrf
                               @method('delete')
                               <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </div>
                  </tr>
           @endforeach
        </tbody>
      </table>
      <div class="mt-3">

          {{ $filieres->links() }}
      </div>
</div>

    
@endsection