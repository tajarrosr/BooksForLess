{{-- ? ACCOUNT AVATAR BUTTON --}}
<div class="dropdown dropdown-end nav-item">
    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar nav-item">
        <div class="w-10 rounded-full">
            @if(Auth::check())
                <!-- User is authenticated, fetch their avatar from the database -->
                @if(!empty(Auth::user()->picture))
                    <!-- If the user has an avatar stored in the database -->
                    <img src="{{ asset(Auth::user()->picture) }}" alt="User Avatar">
                @else
                    <!-- If the user does not have an avatar stored in the database, use a default avatar -->
                    <img src="{{ asset('assets/images/avatars/default-avatar.svg') }}" alt="Default Avatar">
                @endif
            @else
                <!-- User is not authenticated, randomly select an avatar -->
                @php
                    // Directory containing SVG avatars
                    $avatarFolder = public_path('assets/images/avatars');

                    // Get the list of SVG avatar filenames from the folder
                    if (is_dir($avatarFolder)) {
                        $avatarFilenames = array_diff(scandir($avatarFolder), ['.', '..']);
                        if (!empty($avatarFilenames)) {
                            // Generate a random index
                            $randomIndex = array_rand($avatarFilenames);
                            // Select a filename based on the random index
                            $selectedAvatar = $avatarFilenames[$randomIndex];
                            // Construct the URL of the selected avatar
                            $avatarURL = asset('assets/images/avatars/' . $selectedAvatar);
                        } else {
                            $avatarURL = asset('assets/images/avatars/default-avatar.svg');
                        }
                    } else {
                        $avatarURL = asset('assets/images/avatars/default-avatar.svg');
                    }
                @endphp

                <!-- Display the random avatar -->
                <img src="{{ $avatarURL }}" alt="Random Avatar">
            @endif
        </div>
    </div>
    <ul tabindex="0" class="font-iphone menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        @if(Auth::check())
            <!-- User is logged in -->
            <li>
                <a href="#" class="justify-between">
                    Profile
                </a>
            </li>
            <li><a href="#">Settings</a></li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="text-red-600 hover:text-red-800">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @else
            <!-- User is not logged in -->
            <li>
                <a href="{{route('login')}}" class="justify-between">
                    Login
                    <span class="badge bg-blue-600 font-semibold text-white">New</span>
                </a>
            </li>
            <li><a href="{{route('register')}}">Register</a></li>
        @endif
    </ul>
</div>
