@extends('layouts.app')

@section('title', 'Administrateur')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="side-navbar">
            @if (session('status'))
            <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                {{ session('status') }}
            </div>
            @endif
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('create-school')}}"><i class="material-icons">gamepad</i>Gestion Ecole</a>
                </li>

            </ul>
        </div>
        <div class="col-md-10" id="main-container">
            <h4 class="text-center text-danger">Liste des admins de votre école</h4>
            <div class="panel panel-default">

                @if(count($admins) > 0)
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Action</th>
                            <th>Action</th>
                            <th>Nom</th>
                            <th>Code</th>
                            <th>Email</th>
                            <th>Numero de téléphone</th>
                            <!-- <th>Adresse</th>
                            <th>A propos</th> -->
                        </tr>
                        @foreach ($admins as $admin)
                        <tr>
                            <td>
                                @if($admin->active == 0)
                                <a href="{{url('master/activate-admin/'.$admin->id)}}" class="btn btn-xs btn-success"
                                    role="button"><i class="material-icons">
                                        done
                                    </i>Ré-activer</a>
                                @else
                                <a href="{{url('master/deactivate-admin/'.$admin->id)}}" class="btn btn-xs btn-danger"
                                    role="button"><i class="material-icons">
                                        clear
                                    </i>Suspendre</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('edit/user/'.$admin->id)}}" class="btn btn-xs btn-info"
                                    role="button"><i class="material-icons">
                                        edit
                                    </i> Modifier</a>
                            </td>
                            <td>
                                {{$admin->name}}
                            </td>
                            <td>{{$admin->student_code}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->phone_number}}</td>
                            <!-- <td>{{--$admin->address--}}</td>
                            <td>{{--$admin->about--}}</td> -->
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                <div class="panel-body">
                    Il y'a aucun Admin pour le moment
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection