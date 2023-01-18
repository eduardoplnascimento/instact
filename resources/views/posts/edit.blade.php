@extends('layouts.app')

@section('content')

    <div class="min-vh-100 d-flex justify-content-center align-items-center flex-column">

        <form action="/posts/update/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf

            <h1>Editar Post</h1>

            <img src="{{ $post->image }}" class="mb-3">

            <textarea name="description" placeholder="Descrição"
                class="form-control mb-3">{{ $post->description }}</textarea>

            <button type="submit" class="btn btn-primary w-100">Enviar</button>
        </form>

        <form action="/posts/destroy/{{$post->id}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link text-danger mt-2">Deletar</button>
        </form>

    </div>

@endsection