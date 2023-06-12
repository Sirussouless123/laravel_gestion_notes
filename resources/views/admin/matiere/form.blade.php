@extends('admin.admin')

@section('title', $matiere->exists ? 'Modifier une matière' : 'Créer une matière')


@section('content')
        
          <h1>@yield('title')</h1>

          <form action="{{ route($matiere->exists ? 'admin.matiere.update' : 'admin.matiere.store',['matiere'=>$matiere] )}}" method="post" class="v-stack gap-2">
            @csrf
            @method($matiere->exists ? 'put' : 'post')

            @include('shared.input', ['type'=>'text','label'=>'Nom', 'name'=>'nom','value'=>$matiere->nom])
            <div class="mt-3"> 
                <button class="btn btn-success">
                        @if ($matiere->exists)
                            Modifier
                        @else 
                            Créer
                         @endif
             
                </button>
             
                </div>
          </form>
@endsection