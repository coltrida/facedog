<div class="col-md-6 col-lg-12">
    <div class="card">
        <!-- Card header START -->
        <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
            <h5 class="card-title">Friends <span class="badge bg-danger bg-opacity-10 text-danger">230</span></h5>
            <a class="btn btn-primary-soft btn-sm" href="#!"> See all friends</a>
        </div>
        <!-- Card header END -->
        <!-- Card body START -->
        <div class="card-body position-relative pt-0">
            <div class="row g-3">

                @foreach($myLastFourFriends as $user)
                    <div class="col-6">
                    <!-- Friends item START -->
                    <div class="card shadow-none text-center h-100">
                        <!-- Card body -->
                        <div class="card-body p-2 pb-0">
                            <div class="avatar avatar-story avatar-xl">
                                <a href="#!">
                                    <img class="avatar-img rounded-circle"
                                         src="{{asset($user->pathPhoto)}}" alt="avatar">
                                </a>
                            </div>
                            <h6 class="card-title mb-1 mt-3"> <a href="#!"> {{$user->username}} </a></h6>
                            <p class="mb-0 small lh-sm">16 mutual connections</p>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0">
                            <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                        </div>
                    </div>
                    <!-- Friends item END -->
                </div>
                @endforeach

                {{--<div class="col-6">
                    <!-- Friends item START -->
                    <div class="card shadow-none text-center h-100">
                        <!-- Card body -->
                        <div class="card-body p-2 pb-0">
                            <div class="avatar avatar-xl">
                                <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt=""></a>
                            </div>
                            <h6 class="card-title mb-1 mt-3"> <a href="#!"> Samuel Bishop </a></h6>
                            <p class="mb-0 small lh-sm">22 mutual connections</p>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0">
                            <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                        </div>
                    </div>
                    <!-- Friends item END -->
                </div>

                <div class="col-6">
                    <!-- Friends item START -->
                    <div class="card shadow-none text-center h-100">
                        <!-- Card body -->
                        <div class="card-body p-2 pb-0">
                            <div class="avatar avatar-xl">
                                <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt=""></a>
                            </div>
                            <h6 class="card-title mb-1 mt-3"> <a href="#"> Bryan Knight </a></h6>
                            <p class="mb-0 small lh-sm">1 mutual connection</p>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0">
                            <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                        </div>
                    </div>
                    <!-- Friends item END -->
                </div>

                <div class="col-6">
                    <!-- Friends item START -->
                    <div class="card shadow-none text-center h-100">
                        <!-- Card body -->
                        <div class="card-body p-2 pb-0">
                            <div class="avatar avatar-xl">
                                <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt=""></a>
                            </div>
                            <h6 class="card-title mb-1 mt-3"> <a href="#!"> Amanda Reed </a></h6>
                            <p class="mb-0 small lh-sm">15 mutual connections</p>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer p-2 border-0">
                            <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                        </div>
                    </div>
                    <!-- Friends item END -->
                </div>--}}

            </div>
        </div>
        <!-- Card body END -->
    </div>
</div>
