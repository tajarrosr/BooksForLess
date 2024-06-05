        {{-- ? ACCOUNT AVATAR BUTTON --}}
        <div class="dropdown dropdown-end nav-item">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar nav-item">
                <div class="w-10 rounded-full">
                    @if(Auth::check())
                        <!-- User is authenticated, fetch their avatar from the database -->
                        @if(!empty(Auth::user()->avatar))
                            <!-- If the user has an avatar stored in the database -->
                            <img src="{{ asset('path/to/avatars/' . Auth::user()->avatar) }}" alt="User Avatar">
                        @else
                            <!-- If the user does not have an avatar stored in the database, use a default avatar -->
                            <img src="{{ asset('path/to/default/avatar.svg') }}" alt="Default Avatar">
                        @endif
                    @else
                        <!-- User is not authenticated, randomly select an avatar -->
                        @php
                            // Directory containing SVG avatars
                            $avatarFolder = public_path('./assets/images/avatars');

                            // Get the list of SVG avatar filenames from the folder
                            $avatarFilenames = array_diff(scandir($avatarFolder), ['.', '..']);

                            // Generate a random index
                            $randomIndex = array_rand($avatarFilenames);

                            // Select a filename based on the random index
                            $selectedAvatar = $avatarFilenames[$randomIndex];

                            // Construct the URL of the selected avatar
                            $avatarURL = asset('./' . $selectedAvatar);
                        @endphp

                        <!-- Display the random avatar -->
                        <img src="{{ $avatarURL }}" alt="Random Avatar">
                    @endif
                </div>
            </div>
            <ul tabindex="0" class="font-iphone menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                <a class="justify-between">
                    Login
                    <span class="badge bg-badge-800 font-semibold text-text-50 dark:text-text-950">New</span>
                </a>
                </li>
                <li><a>Register</a></li>
                <li><a>Logout</a></li>
            </ul>
        </div>