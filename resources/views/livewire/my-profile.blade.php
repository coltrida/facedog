<div>
    <a href="{{route('profile.change.pic')}}" type="button" class="btn btn-primary btn-lg">
        Change my pic
    </a>
    <a href="{{route('album.myAlbums')}}" type="button" class="btn btn-secondary btn-lg">
        My Albums
    </a>
    <a type="button" class="btn btn-warning btn-lg">My Posts</a>

    <h2 class="mt-5">My last albums</h2>
    <div class="row">
        @foreach($myLastAlbums as $album)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card w-100 h-100">
                    <img src="{{ asset('/storage/albums/'.$album->id.'/1.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $album->title }}</h5>
                        <a href="#" class="btn btn-primary mt-auto">Go to album</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <h2 class="mt-5">My last posts</h2>
    <div class="row">
        @foreach($myPosts as $post)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card w-100 h-100">
                    <img src="{{ asset('/storage/posts/'.$post->id.'.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text flex-grow-1">{{ \Illuminate\Support\Str::limit($post->body, 80, '...') }}</p>
                        <a href="#" class="btn btn-primary mt-auto">Go to post</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if (session('status'))
        @script
        <script>
            Swal.fire({
                title: 'Fatto!',
                text: 'aggiornato',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
        @endscript
    @endif

</div>

@script
<script>
    Livewire.on('mostraMessaggio', message => {
        Swal.fire({
            title: 'Fatto!',
            text: message,
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    });
</script>
@endscript
