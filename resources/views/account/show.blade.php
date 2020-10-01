
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
                    {{-- <form action="{{route('account.plan.change', ['account'=>$account->id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="font-bold">Plan</label>
                            <select name="plan" class="form-control">
                                <option value="1" @if($account->plan_id == 1) selected @endIf >Plus</option>
                                <option value="2" @if($account->plan_id == 2) selected @endIf >Profesional</option>
                                <option value="3" @if($account->plan_id == 3) selected @endIf >Business</option>
                            </select>
                        </div>
 
                        <div class="actions">
                            <button type="submit" class="btn btn-success" >Cambiar plan</button>
                            
                        </div>
                    </form> --}}
                </div>
              </div>
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
            </div>
    </div>

</div>


@endsection
