<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'ArthaSync')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Tambahan untuk Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.css">
    <!-- Optional: Bootstrap Icons (untuk ikon kalender) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    @yield('styles') <!-- Optional jika kamu mau inject style khusus di halaman tertentu -->
</head>

<body id="page-top">

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')

    @stack('scripts')

    @yield('scripts') <!-- Optional jika ingin load JS tambahan dari halaman -->

    <!-- Form Validation -->
    <script src="{{ asset('js/validate_form.js') }}"></script>
    <!-- Tambahan: Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
    <!-- Inisialisasi Flatpickr -->
    <script>
        flatpickr("#date", {
            dateFormat: "Y-m-d",
            locale: "id"
        });
    </script>

    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>