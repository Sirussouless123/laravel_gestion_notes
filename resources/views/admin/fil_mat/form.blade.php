{{-- @extends('admin.admin') --}}
@extends('layouts.app')

@section('title', $fil_mat->exists ? 'Modifier une  liaison' : 'Créer une liaison')


@section('content')
        
          <h1 class="mt-5">@yield('title')</h1>
          @if (session('fail'))
          <div class="alert alert-danger">
            {{session('fail') }}
          </div>
              
          @endif

          <form action="{{ route( $fil_mat->exists ? 'admin.filiere_matiere.update' : 'admin.filiere_matiere.store',['filiere_matiere'=>$fil_mat] )}}" method="post" class="v-stack gap-2">
            @csrf
            @method($fil_mat->exists ? 'put' : 'post')

             @include('shared.select', ['label'=>'Filiere', 'name'=>'filiere_id','options'=>$filiere])
             @include('shared.select', ['label'=>'Matiere', 'name'=>'matiere_id','options'=>$matiere])
             @include('shared.input',['label'=>'Crédit','name'=>'credit','value'=>$fil_mat->credit])
             @include('shared.input',['label'=>'Masse horaire','name'=>'masse','value'=>$fil_mat->masse])
                <button class="btn btn-success">
                        @if ($fil_mat->exists)
                            Modifier
                        @else 
                            Créer
                         @endif
             
                </button>
             
                </div>
          </form>
@endsection