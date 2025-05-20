<div>
    <h2>My Profile</h2>
    @foreach($myPosts as $post)
        <div class="card mb-4" aria-hidden="true">
            <img src="{{asset('/storage/posts/'.$post->id.'.jpg')}}" class="card-img-top" alt="photo">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->body}}</p>
            </div>
        </div>
    @endforeach
</div>
