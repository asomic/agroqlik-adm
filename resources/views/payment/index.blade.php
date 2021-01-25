
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card text-center">
                <div class="card-body">
                    <table class="table" id="paymentTable">
                        <thead>
                            <tr>
                            <th >Estado</th>
                            <th >Cliente</th>
                            <th >Servicio</th>
                            <th >Vencimiento</th>
                            <th >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr @if($payment->isExpired()) style="background-color: rgb(231, 171, 171);" @endif>
                                <td>{{$payment->status['text']}}</td> 
                                <td>{{$payment->account->razon_social}}</td> 
                                <td>{{$payment->service}} </td> 
                                <td>{{$payment->expiration_at->format('d-m-Y')}} </td>
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


@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}" defer></script>
    <script>
        $(document).ready( function () {
            $('#paymentTable').DataTable();
        });
    </script>
@endsection
