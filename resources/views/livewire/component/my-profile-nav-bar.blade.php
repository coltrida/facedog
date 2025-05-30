<div class="card">
    <div class="position-relative">
        <div class="h-200px rounded-top"
             style="{{\Illuminate\Support\Facades\Storage::disk('public')->exists('/landscapes/'.auth()->user()->id.'.jpg') ?
                    'background-image:url(/storage/landscapes/'.auth()->id().'.jpg?v='.$version.');' : 'background-image:url(/img/mare.jpg);'}}

                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                "></div>

        <a type="button" class="btn btn-primary position-absolute top-0 end-0 mt-3 me-3"
           href="#" data-bs-toggle="modal" data-bs-target="#modalChangeLandscapePhoto">
            <i class="bi bi-pencil-fill pe-1"></i> Change Landscape Photo </a>
    </div>
    <!-- Card body START -->
    <div class="card-body py-0">
        <div class="d-sm-flex align-items-start text-center text-sm-start">
            <div>
                <!-- Avatar -->
                <div class="avatar avatar-xxl mt-n5 mb-3">
                    <img class="avatar-img rounded-circle border border-white border-3"
                         src="{{asset(auth()->user()->pathPhoto)}}?v={{ $version }}" alt="avatar">
                </div>
            </div>
            <div class="ms-sm-4 mt-sm-3">
                <!-- Info -->
                <h1 class="mb-0 h5">{{auth()->user()->username}} <i class="bi bi-patch-check-fill text-success small"></i></h1>
                <p>250 connections</p>
            </div>
            <!-- Button -->
            <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                <a class="btn btn-primary-soft" href="#" data-bs-toggle="modal" data-bs-target="#modalChangeProfilePhoto">
                    <i class="bi bi-pencil-fill pe-1"></i> Change Profile Photo</a>
            </div>
        </div>
        <!-- List myProfile -->
        <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
            <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> Lead Developer</li>
            <li class="list-inline-item"><i class="bi bi-geo-alt me-1"></i> New Hampshire</li>
            <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined on Nov 26, 2019</li>
        </ul>
    </div>
    <!-- Card body END -->
    <div class="card-footer mt-3 pt-2 pb-0">
        <!-- Nav myProfile pages -->
        <ul class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
            <li class="nav-item"> <a class="nav-link {{ request()->path() == 'myProfile/posts' ? 'active' : '' }}"
                                     href="{{route('myProfile.posts')}}" > Posts </a> </li>
            <li class="nav-item"> <a class="nav-link {{ request()->path() == 'myProfile/about' ? 'active' : '' }}"
                                     href="{{route('myProfile.about')}}" > About </a> </li>
            <li class="nav-item"> <a class="nav-link {{ request()->path() == 'myProfile/connections' ? 'active' : '' }}"
                                     href="{{route('myProfile.connections')}}" > Connections <span class="badge bg-success bg-opacity-10 text-success small"> 230</span> </a> </li>
            <li class="nav-item"> <a class="nav-link {{ request()->path() == 'myProfile/photos' ? 'active' : '' }}"
                                     href="{{route('myProfile.photos')}}" > Photos</a> </li>
            <li class="nav-item"> <a class="nav-link {{ request()->path() == 'myProfile/videos' ? 'active' : '' }}"
                                     href="{{route('myProfile.videos')}}" > Videos</a> </li>
            {{--<li class="nav-item"> <a class="nav-link" href="my-profile-events.html"> Events</a> </li>
            <li class="nav-item"> <a class="nav-link" href="my-profile-activity.html"> Activity</a> </li>--}}
        </ul>
    </div>

    <!-- Modal change Profile Photo START -->
    <div class="modal fade" id="modalChangeProfilePhoto" tabindex="-1" aria-labelledby="modalLabelChangeProfilePhoto" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelChangeProfilePhoto">Change Profile Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="saveProfilePhoto">
                    <div class="modal-body">
                    <!-- Form START -->
                        <!-- Upload Photos or Videos -->
                        <div class="mb-3">
                            <div
                                x-data="{ uploading: false, progress: 0 }"
                                x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false"
                                x-on:livewire-upload-cancel="uploading = false"
                                x-on:livewire-upload-error="uploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                            <!-- Dropzone photo START -->
                            <label class="form-label">Upload Photo</label>
                            {{--<div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":1}'>
                                <div class="dz-message">
                                    <i class="fa-solid fa-folder-open display-3"></i>
                                    <p>Drop image here or click to upload.</p>
                                </div>
                            </div>--}}
                            <input type="file" class="form-control" wire:model="photo" placeholder="">
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            <!-- Dropzone photo END -->
                        </div>
                    <!-- Form END -->
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        @if($photo)
                            <img src="{{$photo->temporaryUrl()}}" alt="" class="rounded" >
                        @endif
                        <button type="submit" class="btn btn-success-soft" data-bs-dismiss="modal">Update Profile Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal change Profile Photo END -->

    <!-- Modal change Profile Photo START -->
    <div class="modal fade" id="modalChangeLandscapePhoto" tabindex="-1" aria-labelledby="modalLabelChangeLandscape" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelChangeLandscape">Change Landscape Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="saveLandscapePhoto">
                    <div class="modal-body">
                        <!-- Form START -->
                        <!-- Upload Photos or Videos -->
                        <div class="mb-3">
                            <div
                                x-data="{ uploading: false, progress: 0 }"
                                x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false"
                                x-on:livewire-upload-cancel="uploading = false"
                                x-on:livewire-upload-error="uploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <!-- Dropzone photo START -->
                                <label class="form-label">Upload Photos or Videos</label>
                                {{--<div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":1}'>
                                    <div class="dz-message">
                                        <i class="fa-solid fa-folder-open display-3"></i>
                                        <p>Drop image here or click to upload.</p>
                                    </div>
                                </div>--}}
                                <input type="file" class="form-control" wire:model="photoLandscape" placeholder="">
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            <!-- Dropzone photo END -->
                        </div>
                        <!-- Form END -->
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        @if($photoLandscape)
                            <img src="{{$photoLandscape->temporaryUrl()}}" alt="" class="rounded" >
                        @endif
                        <button type="submit" class="btn btn-success-soft" data-bs-dismiss="modal">Update Landscape Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal change Profile Photo END -->
</div>

