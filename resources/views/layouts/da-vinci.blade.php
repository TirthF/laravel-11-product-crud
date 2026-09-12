<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Leonardo') - The Canvas</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Italianno&family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/davinci.css') }}">
    
    <!-- Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body>

    <!-- background elements -->
    <div class="bg-texture"></div>
    <div class="vignette"></div>

    <nav class="master-nav">
        <div class="nav-container">
            <a href="{{ route('products.index') }}" class="brand-logo">
                <span class="brand-text">Da Vinci</span>
                <span class="brand-sub">Atelier</span>
            </a>
            @yield('nav-actions')
        </div>
    </nav>

    <main class="canvas-container">
        @yield('content')
    </main>

    <script>
        // Initial Page Load Animation
        gsap.from(".master-nav", {y: -50, opacity: 0, duration: 1, ease: "power3.out", delay: 0.2});
        gsap.from(".canvas-container", {y: 30, opacity: 0, duration: 1, ease: "power3.out", delay: 0.5});
    </script>

    @stack('scripts')
</body>
</html>