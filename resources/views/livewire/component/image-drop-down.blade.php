<div>
    <li class="nav-item ms-2 dropdown">
        <a class="nav-link bg-light icon-md btn btn-light p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="avatar-img rounded-2 border border-gray-300"
                 src="{{asset(auth()->user()->pathPhoto)}}?v={{ $version }}" alt="avatar">
        </a>
        <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
            <!-- Profile info -->
            <li class="px-3">
                <div class="d-flex align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar me-3">
                        <img class="avatar-img rounded-circle border border-gray-300"
                             src="{{asset(auth()->user()->pathPhoto)}}?v={{ $version }}" alt="avatar">
                    </div>
                    <div>
                        <a class="h6 stretched-link" href="#">{{auth()->user()->name}}</a>
                        <p class="small m-0">{{auth()->user()->type}}</p>
                    </div>
                </div>
                <a class="dropdown-item btn btn-primary-soft btn-sm my-2 text-center"
                   href="{{route('myProfile.posts')}}" >View profile</a>
            </li>
            <!-- Links -->
            <li><a class="dropdown-item" href="{{route('settings')}}"><i class="bi bi-gear fa-fw me-2"></i>Settings & Privacy</a></li>
            <li>
                <a class="dropdown-item" href="#" target="_blank">
                    <i class="fa-fw bi bi-life-preserver me-2"></i>Support
                </a>
            </li>
            <li class="dropdown-divider"></li>
            <li><a class="dropdown-item bg-danger-soft-hover" href="{{route('sign-in-advance')}}"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>

        </ul>
    </li>
</div>
