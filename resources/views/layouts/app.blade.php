@include('layouts.parts.header')

@include('layouts.parts.sidebar')

@include('layouts.parts.toasts')

<div class="container-ful">
    @yield('content')
</div>

@include('layouts.parts.footer')
