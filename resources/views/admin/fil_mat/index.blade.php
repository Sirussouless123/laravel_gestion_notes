@extends('admin.admin')

@section('title','Filières-Matières')

@section('content')

<div class="d-flex justify-content-between align-items-center mt-5 ">
    <h1 class="text-center">@yield('title')</h1>

    <a href="{{ route('admin.filiere_matiere.create') }} " class="btn btn-success">Ajouter une liaison</a>

</div>

<div class="row d-flex mt-5 ">
 
      <table class="table-striped  ">

        <thead>
            <tr>

                <th>N° Filière</th>
                <th>N° Matière</th>
                <th>Crédit</th>
                <th>Masse horaire</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($fil_mats as $fil_mat)
                  <tr >
                    <td>{{ $fil_mat->filiere_id }}</td>
                    <td>{{ $fil_mat->matiere_id }}</td>
                    <td>{{ $fil_mat->credit }}</td>
                    <td>{{ $fil_mat->masse }}</td>
                    <div class="d-flex gap-2 justify-content-end w-100"> 
                        <td>
                              <a href="{{ route('admin.filiere_matiere.edit', ["filiere_matiere"=>$fil_mat])}}" class="btn btn-warning">Modifier</a>
                        </td>

                        <td>
                            <form action="{{ route('admin.filiere_matiere.destroy',['filiere_matiere'=>$fil_mat]) }}" method="post">
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

          {{ $fil_mats->links() }}
      </div>
</div>

    
@endsection