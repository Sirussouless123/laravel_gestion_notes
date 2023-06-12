@extends('admin.admin')

@section('title','Matiere')

@section('content')

<div class="d-flex justify-content-between align-items-center mt-5 ">
    <h1 class="text-center">@yield('title')</h1>

    <a href="{{ route('admin.matiere.create') }} " class="btn btn-success">Ajouter une Matière</a>

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
           @foreach ($matieres as $matiere)
                  <tr >
                    <td>{{ $matiere->nom }}</td>
                    <div class="d-flex gap-2 justify-content-end w-100"> 
                        <td>
                              <a href="{{ route('admin.matiere.edit', ['matiere'=>$matiere])}}" class="btn btn-warning">Modifier</a>
                        </td>

                        <td>
                            <form action="{{ route('admin.matiere.destroy',['matiere'=>$matiere]) }}" method="post">
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
        {{ $matieres->links() }}
</div>

    
@endsection