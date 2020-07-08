
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card text-center">
                <div class="card-header">
                    <div class="title">
                        Cuentas
                    </div>
                    <div class="actions">
                        <a class="btn btn-success" href="{{route('account.create')}}">Nueva cuenta</a>
                    </div>                
                </div>
                <div class="card-body">
                    <table class="table" id="workerTable">
                        <thead>
                          <tr>
                            <th >Rut_raw</th>
                            <th scope="col">Rut</th>
                            <th >Razón social</th>
                            <th >Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                            <tr>
                                <td>{{$account->rut}}</td>
                                <td>{{$account->rut_formated}}</td>
                                <td>{{$account->razon_social}}</td>
                                <td>
                                  <a class="btn btn-success" href="{{route('account.show',['account'=>$account->id])}}" >Ver</a>
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
            $('#workerTable').DataTable({
              'columnDefs': [
                { 'orderData':[0], 'targets': [1] },
                {
                    'targets': [0],
                    'visible': false,
                    'searchable': false
                },
            ],
            });
        } );
    </script>
@endsection
