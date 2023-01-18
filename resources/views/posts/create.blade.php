@extends('layouts.app')

@section('content')

    <div class="min-vh-100 d-flex justify-content-center align-items-center">

        <form action="/posts/store" method="POST" enctype="multipart/form-data">
            @csrf

            <h1>Criar Post</h1>

            <input type="file" name="photo" class="form-control mb-3">

            <textarea name="description" placeholder="Descrição" class="form-control mb-3"></textarea>

            <button type="submit" class="btn btn-primary w-100">Enviar</button>
        </form>

    </div>

@endsection