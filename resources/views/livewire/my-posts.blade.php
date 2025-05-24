<div>

    <div class="d-flex justify-content-between">
        <h2 class="card-title">My posts</h2>
        <a href="#" onclick="history.back()" class="btn btn-primary">back</a>
    </div>

    <div class="row mt-3">
        @foreach($myPosts as $post)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card w-100 h-100">
                    <div class="position-relative">
                        <img src="{{ asset('/storage/posts/'.$post->id.'/1.jpg') }}"
                             class="card-img-top"
                             style="height: 200px;
                             object-fit: cover" alt="..."
                        >
                        <a href="#" wire:click="$dispatch('eliminaPost', { post: {{ $post }} } )"
                           class="btn btn-danger position-absolute top-0 end-0 m-2 border border-black"
                           title="Delete Album"
                        >
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <a href="{{route('post.post', $post->id)}}" class="btn btn-primary mt-auto">Go to post</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Created: {{$post->created_at->diffForHumans()}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@script
<script>
    Livewire.on('eliminaPost', message => {
        Swal.fire({
            title: "Are you sure to delete " + message.post.title + " post?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.deletePost(message.post.id);
            }
        });
    });

    Livewire.on('confermaEliminazione', () => {
        Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
        });
    });
</script>
@endscript
