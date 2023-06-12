@extends('admin.admin')

@section('title','Année académique')

@section('content')

<div class="d-flex justify-content-between align-items-center mt-5 ">
    <h1 class="text-center">@yield('title')</h1>

    <a href="{{ route('admin.annee.create') }} " class="btn btn-success">Ajouter une année académique</a>

</div>

<div class="row d-flex mt-5 ">

      <table class="table-striped  ">

        <thead>
            <tr>

                <th>N°</th>
                <th>Année</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($annee_academiques as $annee)
                  <tr >
                    <td>{{ $annee->annee }}</td>
                    <div class="d-flex gap-2 justify-content-end w-100"> 
                        <td>
                              <a href="{{ route('admin.annee.edit', ['annee'=>$annee])}}" class="btn btn-warning">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.annee.destroy',['annee'=>$annee]) }}" method="post">
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
        {{ $annee_academiques->links() }}
</div>

    
@endsection