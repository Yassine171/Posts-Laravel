@extends('master.layout')
@section('title')
YOUR POST
@endsection
@section('content')
<div class="container">


    <div class="row mt-5">
         @if (session()->has('succes'))
        <div class="alert alert-success">
         {{session()->get('succes')}}
            </div>
    @endif
        @foreach ($posts as $post)
    <div class="card shadow p-0  m-3 rounded col-md-4 mb-5" style="width: 25rem;">
        <?php
            $destinationPath = public_path('/images/'.$post->image);

            ?>
        <img src="{{File::exists($destinationPath) ? asset('/images/'.$post->image) : $post->image}}"   class="card-img-top img-fluid" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <h6 class="Diasbeld card-title">{{$post->user_id ? $post->user->name : null }}</h6>
          <p class="card-text">{{$post->body}} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit dolorem adipisci aliquam. Harum labore maxime blanditiis laboriosam amet ad aspernatur id soluta, neque, eligendi quos eius reiciendis error dolores! Quidem.</p>
          <a href="{{route('post.show',$post->slug)}}" class="btn btn-primary">View</a>
        </div>

    </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>

</div>

@endsection
