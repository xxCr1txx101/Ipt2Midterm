@extends('base')

@section('content')

<div class="container mt-3">
    <h1 class="text-white">Users</h1>
    <hr>

    @foreach($users as $user)
    <a href="/authors/{{$user->id}}" class="btn"> 
        <div class="card {{($user->gender == 'Male') ? 'male' : 'female'}}">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-user"></i> {{$user->name}}
                </h5>
                <h3>
                    
                </h3>
            </div>
        </div>
    </a>
    @endforeach
</div>

@endsection