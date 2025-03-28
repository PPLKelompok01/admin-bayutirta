<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="/favicon.ico" />
    <link rel="stylesheet" href="{{ asset ('app.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/dashboard/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/layanan/layanan.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/layanan/editLayanan.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/layanan/sidebarLayanan.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/layanan/infolayanan.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/layanan/qna.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans%3A700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Display%3A700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=DM+Sans%3A500%2C700" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset ('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset ('lte/dist/css/adminlte.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset ('lte/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset ('lte/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset ('lte/plugins/codemirror/theme/monokai.css') }}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{ asset ('lte/plugins/simplemde/simplemde.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style>
        .base {
            background-color: #F4F7FE;
        }
    </style>
</head>
</head>

<body class="base hold-transition sidebar-mini layout-fixed">
    <div class="bebas">
        @include('header')
        @include('sidebar')
        {{-- <div class="sidelayanan">
            @include('sidebarLayanan')
        </div> --}}
        
        @yield('content')
        
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <!-- Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- jQuery -->
    <script src="{{ asset ('lte//plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset ('lte//plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ('lte//dist/js/adminlte.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset ('lte//plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- CodeMirror -->
    <script src="{{ asset ('lte//plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset ('lte//plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset ('lte//plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset ('lte//plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset ('lte//dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
</body>

</html>