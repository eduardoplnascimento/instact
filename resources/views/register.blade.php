@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <form action="/signup" method="POST" style="width:400px">
            @csrf

            <h1>Cadastro</h1>

            <input class="form-control my-3" name="name" type="text" placeholder="Nome">
            <input class="form-control mb-3" name="email" type="email" placeholder="E-mail">
            <input class="form-control mb-3" name="password" type="password" placeholder="Senha">

            <button class="btn btn-outline-primary w-100 mb-3" type="submit">Enviar</button>
            <a href="/" class="link-secondary">Login</a>
        </form>
    </div>
@endsection