<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traseable - Home</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, -apple-system, sans-serif; line-height: 1.6; }
        
        /* Navigation */
        .top-nav {
            background: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .top-nav .logo {
            width: 45px;
            height: 45px;
            border-radius: 8px;
            overflow: hidden;
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

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 50%, #1a202c 100%);
            min-height: 70vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 60px 20px;
            position: relative;
        }
        .hero h1 {
            color: white;
            font-size: 3rem;
            font-weight: 300;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }
        .hero p {
            color: rgba(255,255,255,0.8);
            font-size: 1rem;
            max-width: 600px;
            line-height: 1.8;
        }

        /* Stats Section */
        .stats-section {
            background: #3b5998;
            padding: 50px 40px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 30px;
        }
        .stats-section h2 {
            color: white;
            font-size: 1.5rem;
            font-weight: 400;
            flex-basis: 100%;
            text-align: left;
            margin-bottom: 10px;
        }
        @media (min-width: 768px) {
            .stats-section h2 {
                flex-basis: auto;
                margin-bottom: 0;
            }
        }
        .stat-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            color: white;
        }
        .stat-icon {
            width: 40px;
            height: 40px;
            background: #e74c3c;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }
        .stat-content h3 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 2px;
        }
        .stat-content h3 span {
            font-size: 0.9rem;
            font-weight: 400;
            margin-left: 5px;
        }
        .stat-content p {
            font-size: 0.85rem;
            opacity: 0.8;
            max-width: 200px;
        }

        /* Content Section */
        .content-section {
            background: #f5f5f5;
            padding: 50px 40px;
        }
        .content-section .container {
            max-width: 900px;
            margin: 0 auto;
        }
        .content-section h2 {
            color: #333;
            margin-bottom: 30px;
        }
        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card h3 a {
            color: #333;
            text-decoration: none;
        }
        .card h3 a:hover {
            color: #e74c3c;
        }
        .text-muted {
            color: #6b7280;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            border: none;
            font-size: 14px;
            transition: all 0.3s;
        }
        .btn-primary {
            background: #e74c3c;
            color: white;
        }
        .btn-primary:hover {
            background: #c0392b;
        }
        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid rgba(255,255,255,0.5);
        }
        .btn-secondary:hover {
            background: rgba(255,255,255,0.1);
        }
        .hero-buttons {
            margin-top: 40px;
            display: flex;
            gap: 15px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="top-nav">
        <a href="{{ url('/') }}" class="logo"><img src="{{ asset('images/logo.png') }}" alt="Traseable"></a>
        <div class="nav-links">
            <a href="{{ url('/') }}" class="active">Home</a>
            <a href="{{ route('posts.index') }}">Posts</a>
            <a href="{{ route('users.index') }}">Users</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Traseable - Home</h1>
        <p>
            Track, manage, and share your content with ease. A simple yet powerful 
            content management system built with Laravel and PostgreSQL.
        </p>
        <div class="hero-buttons">
            <a href="{{ route('posts.index') }}" class="btn btn-primary">View Posts</a>
            <a href="{{ route('posts.create') }}" class="btn btn-secondary">Create New</a>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <h2>At a Glance</h2>
        <div class="stat-item">
            <div class="stat-icon">📝</div>
            <div class="stat-content">
                <h3>{{ \App\Models\Post::count() }}<span>Total Posts</span></h3>
                <p>Content pieces created and managed in the system.</p>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">👥</div>
            <div class="stat-content">
                <h3>{{ \App\Models\User::count() }}<span>Users</span></h3>
                <p>Registered members with access to the platform.</p>
            </div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">📅</div>
            <div class="stat-content">
                <h3>{{ \App\Models\Post::whereDate('created_at', today())->count() }}<span>Today</span></h3>
                <p>New posts created in the last 24 hours.</p>
            </div>
        </div>
    </section>
</body>
</html>
