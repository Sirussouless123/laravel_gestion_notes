@extends('admin.admin')

@section('title', $annee_academique->exists ? 'Modifier une année académique' : 'Créer une  année académique')


@section('content')
        
          <h1 class="mt-5">@yield('title')</h1>

          <form action="{{ route($annee_academique->exists ? 'admin.annee.update' : 'admin.annee.store',['annee'=>$annee_academique] )}}" method="post" class="v-stack gap-2">
            @csrf
            @method($annee_academique->exists ? 'put' : 'post')

            @include('shared.input', ['type'=>'text','label'=>'Année academique', 'name'=>'annee','value'=>$annee_academique->annee])
            <div class="mt-3"> 
                <button class="btn btn-success">
                        @if ($annee_academique->exists)
                            Modifier
                        @else 
                            Créer
                         @endif
             
                </button>
             
                </div>
          </form>
@endsection