{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <!-- signup section -->
    <section id="register" class="signup-section spad">
        <div class="signup-bg set-bg" data-setbg="{{ asset('index/img/signup-bg.jpg') }}"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="signup-warp">
                        <div class="section-title text-white text-left">
                            <h2>Sign up to became a teacher</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus
                                mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus
                                faucibus finibus.</p>
                        </div>
                        <!-- signup form -->
                        <form class="signup-form" method="POST" action="{{ route('register.user') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name -->
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" placeholder="Your Name"
                                    value="{{ old('name') }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <!-- email -->
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" placeholder="Your E-mail"
                                    value="{{ old('email') }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Role Selection -->
                            {{-- <div class="form-group mb-3">
                                <label for="role">Role</label>
                                <select id="role" name="role" class="form-control">
                                    <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student
                                    </option>
                                    <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher
                                    </option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div> --}}
                            {{-- <div>
    <x-input-label for="role" :value="__('Register As')" />

    <select id="role" name="role" class="block mt-1 w-full" required>
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
    </select>

    <x-input-error :messages="$errors->get('role')" class="mt-2" />
</div>

                            <!-- Password -->
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password"
                                    autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group mb-3">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <button type="submit" class="site-btn">
                                Register
                            </button>

                            <div class="d-flex justify-content-between align-items-center">
                                <a class="text-sm" href="{{ route('login') }}">
                                    <span>Already registered?</span>
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html> --}} 

<!DOCTYPE html>
<html lang="en">
<head>
<head>
	<title>WebUni - Education Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="WebUni Education Template">
	<meta name="keywords" content="webuni, education, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="{{asset('index/img/favicon.ico')}}" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="{{asset('index/https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i')}}" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('index/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('index/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('index/css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('index/css/style.css')}}"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
</head>
<body>
     <!-- signup section -->
    <section id="register" class="signup-section spad">
        <div class="signup-bg set-bg" data-setbg="{{ asset('index/img/signup-bg.jpg') }}"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="signup-warp">
                        <div class="section-title text-white text-left">
                            <h2>Sign up to became a teacher</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus
                                mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus
                                faucibus finibus.</p>
                        </div>
                        <!-- signup form -->
                        <form class="signup-form" method="POST" action="{{ route('register') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name -->
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" placeholder="Your Name"
                                    value="{{ old('name') }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <!-- email -->
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" placeholder="Your E-mail"
                                    value="{{ old('email') }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Role Selection -->
                            {{-- <div class="form-group mb-3">
                                <label for="role">Role</label>
                                <select id="role" name="role" class="form-control">
                                    <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student
                                    </option>
                                    <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher
                                    </option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div> --}}
                            {{-- <div> --}}
    {{-- <x-input-label for="role" :value="__('Register As')" />

    <select id="role" name="role" class="block mt-1 w-full" required>
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
    </select>

    <x-input-error :messages="$errors->get('role')" class="mt-2" />
</div> --}}

<div class="mb-4">
    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
    <select name="role" id="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
        <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
    </select>
    @error('role')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

                            <!-- Password -->
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password"
                                    autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group mb-3">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <button type="submit" class="site-btn">
                                Register
                            </button>

                            <div class="d-flex justify-content-between align-items-center">
                                <a class="text-sm" href="{{ route('login') }}">
                                    <span>Already registered?</span>
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- signup section end -->
    
</body>
	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('index/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('index/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('index/js/mixitup.min.js')}}"></script>
	<script src="{{asset('index/js/circle-progress.min.js')}}"></script>
	<script src="{{asset('index/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('index/js/main.js')}}"></script>
</html>


   