<div>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid"><a class="navbar-brand" href="{{route('home')}}">FaceDog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('video')}}">Video</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('cerca')}}">Cerca</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('chat')}}">Chat</a></li>
                    <li class="nav-item">
                        <div class="btn-group dropdown">
                            <a title="create" class="nav-link active" data-bs-toggle="dropdown" aria-current="page" href="#">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('post.create')}}">New Post</a></li>
                            <li><a class="dropdown-item" href="{{route('album.create')}}">New Album</a></li>
                        </ul>
                        </div>
                    </li>

                </ul>

                @auth
                    <!-- Default dropstart button -->
                    <div class="btn-group dropstart">
                        <img title="{{auth()->user()->name}}"
                             @if(\Illuminate\Support\Facades\Storage::disk('public')->exists('/profiles/'.auth()->user()->id.'.jpg'))
                                 src="{{asset('/storage/profiles/'.auth()->user()->id.'.jpg')}}?v={{ $version }}"
                             @else
                                 src="{{asset('/img/user.png')}}"
                             @endif
                             data-bs-toggle="dropdown"
                             class="rounded mx-auto d-block dropdown-toggle border border-gray-300"
                             width="50" alt="...">
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('myProfile')}}">My Profile</a></li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                                        @csrf
                                        <button class="dropdown-item p-0 m-0" type="submit">Log Out</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{route('login')}}" class="btn btn-outline-success" type="submit">Login</a>
                    <a href="{{route('register')}}" class="btn btn-outline-primary" type="submit">Register</a>
                @endauth
            </div>
        </div>
    </nav>
</div>
