<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/minimal.css') }}" />
    <script src="{{ asset('js/realuploader.js') }}"></script>
</head>

<body class="antialiased">
    <div class="targetElement"></div>

    <script>
        var uploader = new RealUploader(".targetElement", {
            url: "{{ route('reUploader.store') }}",
            data: {
                "_token": "{{ csrf_token() }}"
            }
        });
    </script>
</body>

</html>