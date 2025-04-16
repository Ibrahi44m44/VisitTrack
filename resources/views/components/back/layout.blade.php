@props(['title' => ''])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Visitor Dashboard {{ $title ? "- $title" : '' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1c1c1c;
            color: white;
        }

        .card {
            background-color: #7a7777;
            border: 1px solid #444;
        }

        .stat-icon {
            font-size: 1.2rem;
        }

        .dashboard-links a {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">DashBord</h1>
            <div class="dashboard-links">
                @if (request()->routeis('admin.create'))

                <a href="{{ route('admin.index') }}" class="btn btn-outline-info btn-sm"><i class="fas fa-sign-out-alt"></i> Home </a>
                    <a href="{{ route('admin.logout') }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-sign-out-alt"></i> LogOut</a>

                @else
                    <a href="{{ route('admin.create') }}" class="btn btn-outline-light btn-sm"><i
                            class="fas fa-user-plus"></i> Add Admin</a>

                    <a href="{{ route('admin.logout') }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-sign-out-alt"></i>LogOut</a>
                @endif

            </div>
        </div>

        {{ $slot }}
    </div>



    @stack('js')
</body>

</html>
