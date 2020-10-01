
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 ">
            <div class="card">

                <div class="card-body">

                    <form action="{{route('account.update',['account'=>$account->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <h4>
                            Informacion de la cuenta 
                        </h4>  
                        <div class="form-group">
                            <label>Rut (sin puntos ni codigo verificador)</label>
                            <input name="rut" class="form-control"  value="{{$account->rut}}">
                        </div>
                        <div class="form-group">
                            <label>Razon social</label>
                            <input name="razon" class="form-control" required value="{{$account->razon_social}}">
                        </div>

                        <div class="form-group">
                            <label>Plan</label>
                            <select name="plan" class="form-control">
                                <option value="1" @if($account->plan_id == 1) selected @endif >Plan plus<option>
                                <option value="2" @if($account->plan_id == 2) selected @endif >Plan profesional<option>
                                <option value="3" @if($account->plan_id == 3) selected @endif >Plan business<option>
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
