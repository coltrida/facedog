<div class="col-sm-6 col-lg-12">
    <div class="card">
        <!-- Card header START -->
        <div class="card-header d-sm-flex justify-content-between border-0">
            <h5 class="card-title">Photos</h5>
            <a class="btn btn-primary-soft btn-sm" href="#!"> See all photo</a>
        </div>
        <!-- Card header END -->
        <!-- Card body START -->
        <div class="card-body position-relative pt-0">
            <div class="row g-2">
{{--                <!-- Photos item -->
                <div class="col-6">
                    <a href="assets/images/albums/01.jpg" data-gallery="image-popup" data-glightbox="">
                        <img class="rounded img-fluid" src="assets/images/albums/01.jpg" alt="">
                    </a>
                </div>
                <!-- Photos item -->
                <div class="col-6">
                    <a href="assets/images/albums/02.jpg" data-gallery="image-popup" data-glightbox="">
                        <img class="rounded img-fluid" src="assets/images/albums/02.jpg" alt="">
                    </a>
                </div>
                <!-- Photos item -->--}}
                @foreach($myRandomPhotos as $photo)
                    <div class="col-4">
                        <a href="{{asset($photo->pathPhoto)}}" data-gallery="image-popup" data-glightbox="">
                            <img class="rounded img-fluid" src="{{asset($photo->pathPhoto)}}" alt="">
                        </a>
                    </div>
                @endforeach
                <!-- Photos item -->
{{--                <div class="col-4">
                    <a href="assets/images/albums/04.jpg" data-gallery="image-popup" data-glightbox="">
                        <img class="rounded img-fluid" src="assets/images/albums/04.jpg" alt="">
                    </a>
                </div>
                <!-- Photos item -->
                <div class="col-4">
                    <a href="assets/images/albums/05.jpg" data-gallery="image-popup" data-glightbox="">
                        <img class="rounded img-fluid" src="assets/images/albums/05.jpg" alt="">
                    </a>
                    <!-- glightbox Albums left bar END  -->
                </div>--}}
            </div>
        </div>
        <!-- Card body END -->
    </div>
</div>

