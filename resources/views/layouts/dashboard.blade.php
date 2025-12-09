<!DOCTYPE html>
<html lang="en">
@include('partials.head', ['pageTitle' => $pageTitle])
<body>
    <!-- WRAPPER -->
        <div class="d-flex flex-grow-1">
            @include('partials.sidebar')
            <!-- MAIN -->
            <main class="flex-grow-1 d-flex flex-column" style="margin-left:4.5rem">
                @include('partials.navbar')
                @yield('content')
            </main>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous">
</script>
</html>