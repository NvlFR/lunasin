<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ env('APP_NAME') }} - Kelola utang piutang dengan mudah dan efisien">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Preload font untuk performa lebih baik -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Load Font Awesome dengan defer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" defer></script>

    <!-- CSS inline untuk FCP yang lebih cepat -->
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #06d6a0;
            --accent: #ff6b6b;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --transition: all 0.3s ease;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 10px 30px rgba(67, 97, 238, 0.3);
            --border-radius: 0.75rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            background-color: var(--light);
            overflow-x: hidden;
            line-height: 1.6;
        }

        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 6rem 1.5rem 4rem;
            background: linear-gradient(135deg, #f6f9ff 0%, #e9f2ff 100%);
            overflow: hidden;
        }

        .hero::before,
        .hero::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            z-index: 0;
        }

        .hero::before {
            top: -100px;
            right: -100px;
            width: 500px;
            height: 500px;
            background: rgba(67, 97, 238, 0.05);
        }

        .hero::after {
            bottom: -150px;
            left: -150px;
            width: 600px;
            height: 600px;
            background: rgba(6, 214, 160, 0.05);
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-content {
            animation: fadeInUp 1s ease-out;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(6, 214, 160, 0.1);
            color: var(--secondary);
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            animation: fadeIn 1s ease-out;
        }

        .hero-badge i {
            margin-right: 0.5rem;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 700;
            line-height: 1.2;
            color: var(--dark);
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease-out 0.2s forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .hero-title span {
            color: var(--primary);
            position: relative;
        }

        .hero-title span::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 8px;
            background: rgba(67, 97, 238, 0.2);
            z-index: -1;
            border-radius: 4px;
        }

        .hero-description {
            font-size: clamp(1rem, 2.5vw, 1.125rem);
            line-height: 1.7;
            color: var(--gray);
            margin-bottom: 2.5rem;
            animation: fadeInUp 1s ease-out 0.4s forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .hero-description strong {
            color: var(--primary);
            font-weight: 600;
        }

        .hero-cta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.6s forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        .btn-secondary {
            background: white;
            color: var(--primary);
            border: 1px solid var(--gray-light);
        }

        .btn-secondary:hover,
        .btn-secondary:focus {
            background: var(--gray-light);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .hero-note {
            display: flex;
            align-items: center;
            font-size: 0.875rem;
            color: var(--gray);
            animation: fadeIn 1s ease-out 0.8s forwards;
            opacity: 0;
        }

        .hero-note i {
            color: var(--secondary);
            margin-right: 0.5rem;
        }

        .hero-visual {
            position: relative;
            animation: fadeInRight 1s ease-out 0.5s forwards;
            opacity: 0;
            transform: translateX(20px);
        }

        .dashboard-mockup {
            position: relative;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transform: perspective(1000px) rotateY(-10deg);
            transition: transform 0.5s ease;
        }

        .dashboard-mockup:hover {
            transform: perspective(1000px) rotateY(0);
        }

        .mockup-header {
            height: 40px;
            background: var(--gray-light);
            display: flex;
            align-items: center;
            padding: 0 1rem;
        }

        .mockup-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }

        .mockup-dot:nth-child(1) {
            background: var(--accent);
        }

        .mockup-dot:nth-child(2) {
            background: var(--secondary);
        }

        .mockup-dot:nth-child(3) {
            background: var(--primary);
        }

        .mockup-content {
            padding: 1.5rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .mockup-card {
            background: var(--light);
            border-radius: 0.5rem;
            padding: 1rem;
            height: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .mockup-card:nth-child(1) {
            grid-column: 1 / 3;
            height: 120px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .mockup-card:nth-child(1)::after {
            content: 'Dashboard Utama';
            font-size: 0.9rem;
            font-weight: 500;
        }

        .mockup-card:nth-child(2)::after {
            content: 'Total Utang';
            font-size: 0.75rem;
            color: var(--gray);
        }

        .mockup-card:nth-child(3)::after {
            content: 'Total Piutang';
            font-size: 0.75rem;
            color: var(--gray);
        }

        .floating-element {
            position: absolute;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: float 6s ease-in-out infinite;
        }

        .floating-1 {
            top: -20px;
            right: 50px;
            background: var(--primary);
            color: white;
            padding: 0.8rem 1.2rem;
            animation-delay: 0s;
        }

        .floating-2 {
            bottom: 50px;
            left: -30px;
            background: var(--secondary);
            color: white;
            padding: 1rem;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation-delay: 1s;
        }

        .floating-3 {
            top: 50%;
            right: -20px;
            background: white;
            color: var(--primary);
            padding: 0.8rem 1.2rem;
            border-radius: 2rem;
            animation-delay: 0.5s;
        }

        /* Animations */
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-15px) rotate(5deg);
            }
        }

        /* Responsive Styles */
        @media screen and (max-width: 1024px) {
            .hero-container {
                gap: 2rem;
            }
        }

        @media screen and (max-width: 968px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 3rem;
            }

            .hero-cta {
                justify-content: center;
            }

            .hero-visual {
                order: -1;
                max-width: 500px;
                margin: 0 auto;
            }

            .dashboard-mockup {
                transform: perspective(1000px) rotateY(0);
            }

            .floating-element {
                display: none;
            }
        }

        @media screen and (max-width: 640px) {
            .hero {
                padding: 5rem 1rem 3rem;
            }

            .hero-cta {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .hero-note {
                justify-content: center;
            }

            .mockup-content {
                grid-template-columns: 1fr;
                gap: 0.8rem;
                padding: 1rem;
            }

            .mockup-card:nth-child(1) {
                grid-column: 1;
                height: 100px;
            }

            .mockup-card {
                height: 70px;
            }

            /* Sembunyikan dashboard di mobile */
            .hero-visual {
                display: none;
            }
        }

        @media screen and (min-width: 641px) {
            /* Tampilkan dashboard di desktop */
            .hero-visual {
                display: block;
            }
        }

        @media screen and (max-width: 480px) {
            .hero-badge {
                font-size: 0.8rem;
            }

            .btn {
                padding: 0.875rem 1.5rem;
                font-size: 0.95rem;
            }
        }

        /* Reduced motion untuk pengguna yang sensitif */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-bolt" aria-hidden="true"></i> Solusi Keuangan Modern
                </div>

                <h1 id="hero-title" class="hero-title">
                    Lupakan Pusing <span>Catat Utang Piutang</span>
                </h1>

                <p class="hero-description">
                    Aplikasi sederhana untuk <strong>kelola utang piutang pribadi dan bisnis</strong> Anda. Pencatatan utang piutang online, mudah, dan yang terpenting, <strong>GRATIS!</strong>
                </p>

                <div class="hero-cta">
                    <a href="/register" class="btn btn-primary">
                        Mulai Kelola Keuangan Sekarang
                        <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
                    </a>
                    <a href="#fitur" class="btn btn-secondary">
                        <i class="fas fa-play-circle mr-2" aria-hidden="true"></i>
                        Lihat Demo
                    </a>
                </div>

                <p class="hero-note">
                    <i class="fas fa-check-circle" aria-hidden="true"></i> Aplikasi keuangan pribadi gratis untuk semua.
                </p>
            </div>

            <div class="hero-visual">
                <div class="dashboard-mockup" aria-hidden="true">
                    <div class="mockup-header">
                        <div class="mockup-dot" aria-hidden="true"></div>
                        <div class="mockup-dot" aria-hidden="true"></div>
                        <div class="mockup-dot" aria-hidden="true"></div>
                    </div>
                    <div class="mockup-content">
                        <div class="mockup-card" aria-hidden="true"></div>
                        <div class="mockup-card" aria-hidden="true"></div>
                        <div class="mockup-card" aria-hidden="true"></div>
                    </div>
                </div>

                <div class="floating-element floating-1" aria-hidden="true">
                    <i class="fas fa-chart-line mr-1" aria-hidden="true"></i> +25% Profit
                </div>
                <div class="floating-element floating-2" aria-hidden="true">
                    <i class="fas fa-wallet" aria-hidden="true"></i>
                </div>
                <div class="floating-element floating-3" aria-hidden="true">
                    <i class="fas fa-check-circle mr-1" aria-hidden="true"></i> Terorganisir
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript yang dioptimasi -->
    <script>
        // Fungsi debounce untuk optimasi scroll event
        function debounce(func, wait) {
            let timeout;
            return function() {
                const context = this, args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(context, args), wait);
            };
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Efek paralaks sederhana untuk desktop saja
            if (window.innerWidth > 968) {
                const heroVisual = document.querySelector('.hero-visual');

                // Gunakan debounce untuk optimasi performa scroll
                const handleScroll = debounce(function() {
                    const scrolled = window.pageYOffset;
                    const rate = scrolled * -0.5;
                    heroVisual.style.transform = `translateY(${rate}px) translateX(0)`;
                }, 5);

                // Gunakan passive event listener untuk performa scroll yang lebih baik
                window.addEventListener('scroll', handleScroll, { passive: true });
            }

            // Optimasi: Hentikan animasi saat tab tidak aktif
            const floatingElements = document.querySelectorAll('.floating-element');

            document.addEventListener('visibilitychange', function() {
                if (document.hidden) {
                    floatingElements.forEach(el => {
                        el.style.animationPlayState = 'paused';
                    });
                } else {
                    floatingElements.forEach(el => {
                        el.style.animationPlayState = 'running';
                    });
                }
            });

            // Deteksi preferensi reduced motion
            const mediaQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
            if (mediaQuery.matches) {
                floatingElements.forEach(el => {
                    el.style.animation = 'none';
                });
            }
        });
    </script>
</body>
</html>
