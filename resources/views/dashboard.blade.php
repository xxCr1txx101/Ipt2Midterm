@extends('base')

@section('content')

<div class="container mt-3">
    <div class="mb-1" style="float: right;">
        <a href="{{url('/create')}}" class="btn btn-primary p-3">
        New Post
        </a>
    </div>
    <h1 class="text-white">Recent Post</h1>
    <hr>

    @foreach($posts as $post)
    <div class="card {{($post->user->gender == 'Male') ? 'male' : 'female'}}">
        <div class="card-body">

            <div class="dropdown float-end">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-list"></i> {{$post->category->category}}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @foreach(
                    App\Models\User::whereHas('posts', function($query) use ($post){
                        $query->where('category_id', $post->category_id);
                    })->get() as $user)
    
                    <li><a class="dropdown-item" href="/authors/{{$user->id}}">{{$user->name}}</a></li>
    
                    @endforeach
                </ul>
            </div>
            <p class="card-title">
                <i class="fas fa-user"></i> 
                {{$post->user->name}}
            </p>
            <p class="card-text">
                {{$post->post}}
            </p>
        </div>
    </div>
    @endforeach
</div>

@endsection