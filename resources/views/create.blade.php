@extends('master.layout')
@section('title')
Creer Un Poste
@endsection
@section('content')
<div class="w-100 container-fluid rounded">
    <div class="card mt-5" >
            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card-header">
            <h3 class="text-center card-title">Poster Une Publication</h3>
        </div>
        <div class="card-body">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titre</label>
                <input type="text" email" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Titre de votre poste">
              </div>
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descreption</label>
                <textarea type="text" name="body" class="form-control" id="exampleFormControlTextarea1" placeholder="Descreption de votre poste" rows="4"></textarea>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">valider</button>
              </div>
              </form>

        </div>
    </div>


</div>

@endsection
