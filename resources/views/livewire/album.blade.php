<div>
    <div class="d-flex justify-content-between">
        <h5 class="card-title">{{$album->title}} ( {{count($photos)}} photos )</h5>
        <a href="#" onclick="history.back()" class="btn btn-primary">back</a>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="position-relative">
                        <div class="carousel-item active">
                            <img src="{{asset('/storage/'.$photos[0])}}" class="d-block w-100" alt="...">
                        </div>
                        <a href="#" wire:click="$dispatch('eliminaPhoto', { photo: '{{ $photos[0] }}' } )"
                           class="btn btn-danger position-absolute top-0 end-50 m-2 border border-black"
                           title="Delete Photo"
                        >
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>
                    @for($i = 1; $i < count($photos); $i++)
                        <div class="position-relative">
                            <div class="carousel-item">
                                <img src="{{asset('/storage/'.$photos[$i])}}" class="d-block w-100" alt="...">
                            </div>
                            <a href="#" wire:click="$dispatch('eliminaPhoto', { photo: '{{ $photos[$i] }}' } )"
                               class="btn btn-danger position-absolute top-0 end-50 m-2 border border-black"
                               title="Delete Photo"
                            >
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    @endfor
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

@script
<script>
    Livewire.on('eliminaPhoto', message => {
        Swal.fire({
            title: "Are you sure to delete this photo",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.deletePhoto(message.photo);
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
