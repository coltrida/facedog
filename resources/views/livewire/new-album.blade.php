<div>
    <div class="d-flex">
        <h1>New Album</h1>
    </div>

    <div class="my-4">
        <label for="title" class="form-label">Album title</label>
        <input type="text" wire:model="title" class="form-control" id="title">
    </div>
    <div class="mb-5">
        <div class="row">
            <div class="col">
                <label for="formFile" class="form-label">photo</label>
                <input wire:model="photo" class="form-control" type="file" id="formFile" multiple>
                <button wire:click="salvaAlbum" class="btn btn-primary mt-3">Submit</button>
            </div>
            <div class="col-8 text-center">
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

