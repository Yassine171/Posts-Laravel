@extends('master.layout')
@section('title')
{{$post->title}}
@endsection
@section('content')
<div class="container d-flex justify-content-center rounded">
    <div class="row mt-5">
    <div class="card shadow p-0  m-3 rounded col-md-4 mb-5" style="width: 50rem;">
        <img src="{{asset('/images/'.$post->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->body}} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit dolorem adipisci aliquam. Harum labore maxime blanditiis laboriosam amet ad aspernatur id soluta, neque, eligendi quos eius reiciendis error dolores! Quidem.</p>
<div class="d-flex flex-row ">
@if (auth()->check())
   @if (auth()->user()->id==$post->user_id || auth()->user()->is_admin)


        <a href="{{route('post.edit',$post->slug)}}" class="ml-5 btn btn-primary">Modifier</a>
                <form id="{{$post->id}}" action="{{route('post.destroy',$post->slug)}}" method="post">
                    @csrf
                    @method('DELETE')

                </form>
                <button onclick="event.preventDefault();
                if(confirm('etes vous sur ?'))
                document.getElementById({{$post->id}}).submit();"
                type="submit" class="mx-3 flex-item btn btn-danger">Supprimer</button>
@endif
@endif
</div>

        </div>

    </div>
    </div>


</div>

@endsection
