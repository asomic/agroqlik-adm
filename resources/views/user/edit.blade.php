
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 ">
            <div class="card">

                <div class="card-body">

                    <form action="{{route('user.update',['account'=>$account->id,'user'=>$user->id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Email (usuario)</label>
                            <input name="email" type="email" class="form-control" required value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input name="first_name" class="form-control" value="{{$user->first_name}}">
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input name="last_name" class="form-control" value="{{$user->last_name}}"> 
                        </div>
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="role" class="form-control">
                                <option value="2" @if($user->role == 2) selected @endif >Administrador</option>
                                <option value="3" @if($user->role == 3) selected @endif >Analista</option>
                                <option value="4" @if($user->role == 4) selected @endif >Capturador</option>
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit">Agregar</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

</div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
