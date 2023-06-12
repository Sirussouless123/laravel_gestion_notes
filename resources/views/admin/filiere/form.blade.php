@extends('admin.admin')

@section('title', $filiere->exists ? 'Modifier une filière' : 'Créer une filière')


@section('content')
        
          <h1>@yield('title')</h1>

          <form action="{{ route($filiere->exists ? 'admin.filiere.update' : 'admin.filiere.store',['filiere'=>$filiere] )}}" method="post" class="v-stack gap-2">
            @csrf
            @method($filiere->exists ? 'put' : 'post')

            @include('shared.input', ['type'=>'text','label'=>'Nom', 'name'=>'nom','value'=>$filiere->nom])
            <div class="mt-3"> 
                <button class="btn btn-success">
                        @if ($filiere->exists)
                            Modifier
                        @else 
                            Créer
                         @endif
             
                </button>
             
                </div>
          </form>
@endsection