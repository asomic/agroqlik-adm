
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-12 ">
            @error('email')
            <div class="alert alert-danger">Email no valido o ya existe</div>
            @enderror
            @error('rut')
            <div class="alert alert-danger">Rut no valido o ya existe</div>
            @enderror
        </div> --}}
        <div class="col-6 ">
            <div class="card">

                <div class="card-body">

                    <form action="{{route('account.payment.store', ['account' => $account->id])}}" method="POST">
                        @csrf
                        <h4>
                            Generar cobro                        
                        </h4>  
                        <div class="form-group">
                            <label>Plan</label>
                            <select name="plan" class="form-control">
                                <option value="1">Plan plus</option>
                                <option value="2">Plan profesional</option>
                                <option value="3">Plan business</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Servicio</label>
                            <input name="service" class="form-control" required type="text">
                        </div>
                        <div class="form-group">
                            <label>Valor</label>
                            <input name="amount" class="form-control" required type="number">
                        </div>
                        <div class="form-group">
                            <label>Fecha vencimiento - Dia de pago de la cuenta:({{$account->payment_day}}) </label>
                            <input name="expiration" class="form-control" required type="date">
                        </div>

                        <div class="form-group">
                            <label>Email para cobro</label>
                            <input name="email" type="email" class="form-control" required value="{{$account->payment_email}}">
                        </div>

                        <button class="btn btn-success" type="submit">Cobrar</button>
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
