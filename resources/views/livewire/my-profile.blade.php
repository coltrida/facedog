<div>
    <a href="{{route('profile.change.pic')}}" type="button" class="btn btn-primary btn-lg">
        Change my pic
    </a>
    <a type="button" class="btn btn-secondary btn-lg">My Albums</a>
    <a type="button" class="btn btn-warning btn-lg">My Posts</a>


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
</div>
