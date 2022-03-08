@if (Route::has('login'))
    @auth
        @include ('/dashboard')
        {{ url('/dashboard') }}
    @else
        @include ('auth/login')
        {{ route('login') }}

        @if (Route::has('register'))
            {{ route('register') }}
        @endif
    @endauth
@endif
