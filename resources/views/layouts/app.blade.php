<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Traseable')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, -apple-system, sans-serif; line-height: 1.6; background: #f5f5f5; color: #333; }
        .container { max-width: 900px; margin: 0 auto; padding: 20px; }
        
        /* Navigation - matching home page */
        .top-nav {
            background: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .top-nav .logo {
            width: 45px;
            height: 45px;
            border-radius: 8px;
            overflow: hidden;
            text-decoration: none;
        }
        .top-nav .logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .top-nav .nav-links {
            display: flex;
            gap: 30px;
        }
        .top-nav .nav-links a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }
        .top-nav .nav-links a:hover,
        .top-nav .nav-links a.active {
            color: #e74c3c;
        }
        
        h1, h2 { margin-bottom: 20px; color: #222; }
        .card { background: white; border-radius: 8px; padding: 20px; margin-bottom: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .card h3 a { color: #333; text-decoration: none; }
        .card h3 a:hover { color: #e74c3c; }
        .btn { display: inline-block; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: 500; cursor: pointer; border: none; font-size: 14px; transition: all 0.3s; }
        .btn-primary { background: #e74c3c; color: white; }
        .btn-primary:hover { background: #c0392b; }
        .btn-secondary { background: #6b7280; color: white; }
        .btn-secondary:hover { background: #4b5563; }
        .btn-danger { background: #c0392b; color: white; }
        .btn-danger:hover { background: #a5281b; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 500; }
        .form-group input, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; }
        .form-group textarea { min-height: 150px; resize: vertical; }
        .form-group input:focus, .form-group textarea:focus { outline: none; border-color: #e74c3c; }
        .alert { padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .alert-success { background: #d1fae5; color: #065f46; }
        .alert-error { background: #fee2e2; color: #991b1b; }
        .actions { display: flex; gap: 10px; margin-top: 15px; }
        .text-muted { color: #6b7280; font-size: 14px; }
    </style>
</head>
<body>
    <nav class="top-nav">
        <a href="{{ url('/') }}" class="logo"><img src="{{ asset('images/logo.png') }}" alt="Traseable"></a>
        <div class="nav-links">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('posts.index') }}">Posts</a>
            <a href="{{ route('users.index') }}">Users</a>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul style="margin-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
