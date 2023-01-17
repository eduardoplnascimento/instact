<div class="card mb-3" style="width: 600px; max-width: 100%;">

    <div class="card-header bg-white border-0">
        <span class="fw-bold"> {{ $post->user_id }} </span>
    </div>

    <img src="{{ $post->image }}">

    <div class="card-body">
        <p class="card-text">{{ $post->description }}</p>
    </div>

</div>