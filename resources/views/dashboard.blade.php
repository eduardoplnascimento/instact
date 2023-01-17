@extends('layouts.app')

@section('content')

    @include('components.navbar')

    <div class="min-vh-100 d-flex justify-content-center align-items-center flex-column" style="margin-top: 100px;">

        @foreach ($posts as $post)

            @include('components.post', compact('post'))

        @endforeach

    </div>

@endsection
