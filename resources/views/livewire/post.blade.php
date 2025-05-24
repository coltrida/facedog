<div>
    <div class="d-flex justify-content-between">
        <h5 class="card-title">{{$post->title}} ( {{count($photos)}} photos )</h5>
        <a href="#" onclick="history.back()" class="btn btn-primary">back</a>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('/storage/'.$photos[0])}}" class="d-block w-100" alt="...">
                    </div>
                    @for($i = 1; $i < count($photos); $i++)
                        <div class="carousel-item">
                            <img src="{{asset('/storage/'.$photos[$i])}}" class="d-block w-100" alt="...">
                        </div>
                    @endfor
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <p>{{$post->body}}</p>
        </div>
    </div>
</div>

