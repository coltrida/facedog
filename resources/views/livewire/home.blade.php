<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">My Awesome Posts</h2>

            {{-- Display posts --}}
            <div class="posts-list">
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        @if(\Illuminate\Support\Facades\Storage::disk('public')->exists('posts/'.$post->id.'.jpg'))
                        <img src="{{asset('/storage/posts/'.$post->id.'.jpg')}}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <a href="#" class="btn btn-primary">go to post</a>
                            </div>

                            <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 50, '...') }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Created: {{$post->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Loading indicator / Load More button --}}
            @if ($hasMorePages)
                <div class="text-center my-4">
                    {{-- Manual load button (optional) --}}
                    <button wire:click="loadPosts" class="btn btn-primary" wire:loading.attr="disabled">
                        <span wire:loading.remove>Load More Posts</span>
                        <span wire:loading>Loading...</span>
                    </button>
                </div>

                {{-- Invisible element that triggers loadPosts when it enters the viewport --}}
                <div x-data="{
                    observe() {
                        let observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting && @this.hasMorePages) {
                                    @this.loadPosts();
                                }
                            });
                        }, {
                            root: null, // observe the viewport
                            rootMargin: '0px', // no margin around the root
                            threshold: 0.1 // trigger when 10% of the element is visible
                        });
                        observer.observe(this.$el); // observe this div itself
                    }
                }" x-init="observe" class="text-center text-muted my-4">
                    <span wire:loading>Loading more posts...</span>
                </div>
            @else
                <div class="text-center text-muted my-4">
                    You've reached the end of the posts!
                </div>
            @endif
        </div>
    </div>
</div>
