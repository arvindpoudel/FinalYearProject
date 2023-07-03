<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Recommendation App</title>
    <link rel="stylesheet" href="{{ asset('front/movie.css') }}">
    @yield('styles')
</head>
<body>
<header>
    <nav class="navbar">
        <ul>
            <li><a href="/redirect">Home</a></li>
            <li><a href="{{ route('movies.about')}}">About</a></li>
            <!-- <li><a href="{{ asset('front/Feedback.html') }}">Feedback</a></li> -->
            <li><a href="{{ route('movies.index') }}">Movies</a></li>
            <li><a href="{{ route('recommendations.index') }}">Recommended Movies</a></li>
            <li>
                <form class="form_logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </li>
            <li style="margin-left: 700px; font-weight: bold"> Welcome {{ Auth::user()->name }} !!</li>

        </ul>
    </nav>
</header>

@livewireStyles

<main>
    @yield('content')
</main>

@livewireScripts
</body>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="{{ asset('front/About us.html') }}">About us</a></li>
                    <li><a href="{{ asset('front/Feedback.html') }}">Feedback</a></li>
                    <li><a href="{{ asset('front/services.html') }}">Our Services</a></li>
                    <li><a href="{{ asset('front/privacy policies.html') }}">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Get Help</h4>
                <ul>
                    <li><a href="{{ asset('front/FAQ.html') }}">FAQ</a></li>
                    <li><a href="{{ asset('front/help.html') }}">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</html>
