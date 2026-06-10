<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Servio</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            display:flex;
            min-height:100vh;
            background:#f5f5f7;
        }

        .main-content{
            flex:1;
            padding:30px;
            background:#f5f5f7;
            height:100vh;
            overflow-y:auto;
        }

    </style>

</head>
<body>

    {{-- Sidebar --}}
    @include('admin.components.sidebar')

    {{-- Isi Halaman --}}
    <div class="main-content">

        @yield('content')

    </div>

</body>
</html>