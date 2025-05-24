<div>
    <h1>New Post</h1>
    <div class="my-4">
        <label for="title" class="form-label">Post title</label>
        <input type="text" wire:model="title" class="form-control" id="title">
    </div>
    <div class="mb-4">
        <label for="body" class="form-label">Post Body</label>
        <textarea wire:model="body" class="form-control" id="body" rows="3"></textarea>
    </div>
    <div class="mb-5">
        <div class="row">
            <div class="col">
                <label for="formFile" class="form-label">photo</label>
                <input wire:model="photo" class="form-control" type="file" id="formFile" multiple accept="image/jpeg">
                <button wire:click="salvaPost" class="btn btn-primary mt-3">Submit</button>
            </div>
            <div class="col text-center">
                @if(count($photo) > 0 )
                    <div class="row">
                        @foreach($photo as $pic)
                            <div class="col">
                                <img src="{{ $pic->temporaryUrl() }}" class="rounded border border-gray-300" width="150" alt="preview">
                            </div>
                        @endforeach
                    </div>
                @else
                    <img src="{{ asset('/img/placeholder-image.png') }}" class="rounded border border-gray-300" width="200" alt="preview">
                @endif
            </div>
        </div>
    </div>

</div>

{{--@script
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
@endscript--}}
