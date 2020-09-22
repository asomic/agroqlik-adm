
@extends('layouts.app')

@section('content')
<div class="container">
    @error('email')
    <div class="alert alert-danger">Email no valido o ya existente</div>
    @enderror
    @error('rut')
    <div class="alert alert-danger">rut no valido o ya existente</div>
    @enderror
    <div class="row justify-content-center">
        <div class="col-6 ">
            <div class="card">

                <div class="card-body">

                    <form action="{{route('user.store',['account'=>$account->id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Email (usuario)</label>
                            <input name="email" type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input name="first_name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input name="last_name" class="form-control" > 
                        </div>
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="role" class="form-control">
                                <option value="2">Administrador</option>
                                <option value="3">Analista</option>
                                <option value="4">Capturador</option>
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
