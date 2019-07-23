@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Pagina profilo utente</h1>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        @if (!empty(Auth::user()->userDetail))
          <a href="#" data-toggle="modal" data-target="#uploadImageForm">
            <img class="card-img-top" src="{{ asset('storage/' . Auth::user()->userDetail->profile_picture) }}" alt="Immagine profilo di {{ Auth::user()->name }}">
          </a>
        @else
          <a href="#" data-toggle="modal" data-target="#uploadImageForm">
            Imposta la tua foto profilo
          </a>
        @endif
        <p class="card-text">
          <ul>
            <li>Nome utente: {{ Auth::user()->name }}</li>
            <li>Email: {{ Auth::user()->email }}</li>
          </ul>
        </p>
      </div>
    </div>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Torna alla home</a>
  </div>

  <div class="modal fade" id="uploadImageForm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seleziona la tua foto profilo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.profile_picture')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="profile_img">Immagine profile:</label>
              <input class="form-control-file" type="file" name="profile_img">
            </div>
            <div class="form-group">
              <input class="form-control" type="submit" value="Salva">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
