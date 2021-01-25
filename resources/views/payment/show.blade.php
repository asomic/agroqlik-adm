
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <div class="title">
                        Cliente
                    </div>
                </div>
                <div class="card-body">
                    <span class="font-bold">RUT</span>
                    <p>{{$payment->account->rut_formated}}</p>
                    <span class="font-bold">Razon social</span>
                    <p>{{$payment->account->razon_social}}</p>
                    <span class="font-bold">Plan</span>
                    <p>{{$payment->account->plan->name}}</p>
                    <a  class="btn btn-info" href="{{route('account.show',['account'=>$payment->account->id])}}">Ver cuenta</a>
                </div>
            </div>
        </div>
        <div class="col-9 ">
            <div class="card">
                <div class="card-header">
                    <div class="title">
                        Pago N° {{$payment->id}}
                    </div>
                </div>
                <div class="card-body">
                    <span class="font-bold">Estado</span>
                    <p>{{$payment->status['text']}}</p>
                    <span class="font-bold">Plan</span>
                    <p>{{$payment->plan->name}}</p>
                    <span class="font-bold">Servicio</span>
                    <p>{{$payment->service}}</p>
                    <span class="font-bold">Fecha creacion</span>
                    <p>{{$payment->created_at->format('d-m-Y')}}</p>
                    <span class="font-bold">Fecha vencimiento</span>
                    <p>{{$payment->expiration_at->format('d-m-Y')}}</p>
                    <span class="font-bold">Fecha pago</span>
                    <p>{{isset($payment->paid_at) ? $payment->paid_at->format('d-m-Y') : '- -'}}</p>                    
                    <span class="font-bold">Link Flow</span>
                    <p>{{$payment->flow}}</p>          
                    {{-- <a  class="btn btn-danger" href="/">Borrar pago</a> --}}

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
