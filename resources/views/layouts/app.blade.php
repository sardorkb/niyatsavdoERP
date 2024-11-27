<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
    <main class="main" id="top">

        @include('layouts.sidebar')

        @include('layouts.header')

        <div class="content">

            @yield('main-content')

            @include('layouts.footer')

        </div>

    </main>
</body>
</html>
