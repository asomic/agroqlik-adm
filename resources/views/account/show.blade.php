
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <div class="title">
                        Cliente
                    </div>
                </div>
                <div class="card-body">
                    <span class="font-bold">RUT</span>
                    <p>{{$account->rut_formated}}</p>
                    <span class="font-bold">Razon social</span>
                    <p>{{$account->razon_social}}</p>
                    <span class="font-bold">Plan</span>
                    <p>{{$account->plan->name}}</p>
                    <a  class="btn btn-info" href="{{route('account.edit',['account'=>$account->id])}}">Editar informacion</a>

                </div>
            </div>
            </br>
            <div class="card pb-4">
                <div class="card-header">
                    <div class="title">
                        Resumen
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        Fundos: {{$account->farmlands->count()}}
                    </div>
                    <div class="col-12">
                        Trabajadores: {{$account->workers->count()}}
                    </div>
                </div>
            </div>
        </br>
        </div>
        <div class="col-9">

            <div class="card">
                <div class="card-header">
                    <div class="title">
                        Usuarios
                    </div>
                    <div class="actions">
                        <a class="btn btn-success" href="{{route('user.create',['account'=>$account->id])}}">Nuevo usuario</a>
                    </div>  
                </div>
                <div class="card-body">
                    <table class="table" id="userTable">
                        <thead>
                            <tr>
                            <th >Correo</th>
                            <th >Nombre</th>
                            <th >Rol</th>
                            <th >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($account->users as $user)
                            <tr>
                                <td>{{$user->email}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->role['name']}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{route('user.edit',['account'=>$account->id, 'user'=>$user->id])}}" >Editar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </br>
            <div class="card ">
                <div class="card-header">
                    <div class="title">
                        Pagos
                    </div>
                    <div class="actions">
                        <a class="btn btn-success" href="{{route('account.payment.create',['account'=>$account->id])}}">Nuevo Pago</a>
                    </div>  
                </div>
                <div class="card-body">
                    <span class="font-bold">Email de pago</span>
                    <p>{{$account->payment_email}}</p>
                    <span class="font-bold">Día de pago </span>
                    <p>{{$account->payment_day}}</p>
                    <table class="table" id="paymentTable">
                        <thead>
                            <tr>
                            <th >Estado</th>
                            <th >Plan</th>
                            <th >Servicio</th>
                            <th >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($account->payments as $payment)
                            <tr>
                                <td>{{$payment->status['text']}}</td> 
                                <td>{{$payment->plan->name}}</td>
                                <td>{{$payment->service}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{route('payment.show', ['payment' => $payment->id])}}">ver</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

</div>


@endsection
