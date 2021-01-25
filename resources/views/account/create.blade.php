
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 ">
            @error('email')
            <div class="alert alert-danger">Email no valido o ya existe</div>
            @enderror
            @error('rut')
            <div class="alert alert-danger">Rut no valido o ya existe</div>
            @enderror
        </div>
        <div class="col-6 ">
            <div class="card">

                <div class="card-body">

                    <form action="{{route('account.store')}}" method="POST">
                        @csrf
                        <h4>
                            Informacion de la cuenta 
                        </h4>  
                        <div class="form-group">
                            <label>Rut (sin puntos ni codigo verificador)</label>
                            <input name="rut" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Razon social</label>
                            <input name="razon" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Plan</label>
                            <select name="plan" class="form-control">
                                <option value="5">Plan gratis<option>
                                <option value="1">Plan plus<option>
                                <option value="2">Plan profesional<option>
                                <option value="2">Plan business<option>
                            </select>
                        </div>
                        <h4>
                            Usuario administrador
                        </h4>  
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

                        <h4>
                            Datos de pago
                        </h4>  
                        <div class="form-group">
                            <label>Email de cobro</label>
                            <input name="payment_email" type="email" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Día de pago</label>
                            <input name="payment_day" class="form-control" >
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
