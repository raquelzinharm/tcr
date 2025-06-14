@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Alterar o Perfil de <strong>{{ auth()->user()->name }}</strong></div>

                @if ($errors->any())
                <div class ="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li> {{$error}} </li>
                        @endforeach
                    </ul>
                </div>

                @endif

                @if (session('message'))
                <div class="alert alert-success">
                    {{ session ('message') }}
                </div>
                @endif
                <div class="card-body">
                    <img src ="data:image/png;base64, {{ $perfil->foto }}" alt="Imagem de perfil" />

                   <form action = "{{ url ('admin/updatePerfil') }}"method = 'POST' enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class ="form-group">

                        <label>foto</label>
                        <input type= "file" name="foto">

                        <textarea id="w3review" name="descricao" rows="4" cols="50">
                            {{ $perfil->descricao }}
                            </textarea>

                     </div>

                    <button type = "submit" class ="btn btn-primary">Enviar</button>

                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
