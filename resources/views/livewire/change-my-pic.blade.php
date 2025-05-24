<div>
    <div class="d-flex justify-content-between">
        <h2 class="card-title">My photo</h2>
        <a href="#" onclick="history.back()" class="btn btn-primary">back</a>
    </div>

    <div class="row mt-3">
        <div class="col">
            <label for="formFile" class="form-label">photo</label>
            <input wire:model="photo" class="form-control" type="file" id="formFile">
        </div>
        <div class="col text-center">
            @if($photo)
                <img src="{{ $photo->temporaryUrl() }}" class="rounded border border-gray-300" width="100" alt="preview">
            @else
                @if(\Illuminate\Support\Facades\Storage::disk('public')->exists('/profiles/'.auth()->user()->id.'.jpg'))
                    <img src="{{ asset('storage/profiles/'.auth()->user()->id.'.jpg') }}" class="rounded border border-gray-300" width="100" alt="preview">
                @else
                    <img src="{{ asset('/img/user.png') }}" class="rounded border border-gray-300" width="100" alt="preview">
                @endif
            @endif
        </div>
    </div>
    <button wire:click="salvaPhoto" class="btn btn-primary mt-3">Submit</button>
</div>
