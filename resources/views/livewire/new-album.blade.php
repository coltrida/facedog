<div>
    <div class="d-flex">
        <h1>New Album</h1>
        <a title="add photo" aria-current="page" href="#" wire:click="addNumberOfPhoto">
            <i class="bi bi-plus-circle"></i>
        </a>
    </div>

    <div class="my-4">
        <label for="title" class="form-label">Album title</label>
        <input type="text" wire:model="title" class="form-control" id="title">
    </div>
    @for($i = 0; $i < $numberOfPhoto; $i ++)
    <div class="mb-5">
        <div class="row">
            <div class="col">
                <label for="formFile" class="form-label">photo</label>
                <input wire:model="photo" class="form-control" type="file" id="formFile">
            </div>
            <div class="col text-center">
                @if($photo)
                    <img src="{{ $photo->temporaryUrl() }}" class="rounded border border-gray-300" width="300" alt="preview">
                @else
                    <img src="{{ asset('/img/placeholder-image.png') }}" class="rounded border border-gray-300" width="200" alt="preview">
                @endif
            </div>
        </div>
    </div>
    @endfor
    <button wire:click="salvaAlbum" class="btn btn-primary">Submit</button>
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

