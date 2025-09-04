<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ env('APP_NAME') }} - Kelola utang piutang dengan mudah dan efisien">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #06d6a0;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --transition: all 0.3s ease;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 6px 12px rgba(67, 97, 238, 0.25);
            --border-radius: 0.5rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            background-color: #f9fafb;
            line-height: 1.6;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.98);
            box-shadow: var(--shadow);
            padding: 0.8rem 1.5rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            transition: var(--transition);
        }

        .navbar.scrolled {
            padding: 0.6rem 1.5rem;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.03);
        }

        .logo-text {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary);
            margin-left: 0.5rem;
        }

        .logo-icon {
            color: var(--secondary);
            font-size: 1.8rem;
            animation: pulse 2s infinite;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin: 0 0.5rem;
        }

        .nav-link {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            padding: 0.5rem 0.8rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            position: relative;
            display: inline-block;
        }

        .nav-link:not(.btn)::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--primary);
            transition: var(--transition);
            transform: translateX(-50%);
        }

        .nav-link:not(.btn):hover::after {
            width: 70%;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: var(--transition);
            display: inline-block;
            text-align: center;
            cursor: pointer;
        }

        .btn-login {
            background-color: var(--gray-light);
            color: var(--dark);
        }

        .btn-login:hover {
            background-color: var(--gray-light);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-signup {
            background-color: var(--primary);
            color: white;
        }

        .btn-signup:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        .hamburger {
            display: none;
            cursor: pointer;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            transition: var(--transition);
            padding: 0.5rem;
            border-radius: var(--border-radius);
        }

        .hamburger:hover {
            background-color: var(--gray-light);
        }

        /* Overlay for mobile menu */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .overlay.active {
            display: block;
            opacity: 1;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive Styles */
        @media screen and (max-width: 968px) {
            .nav-item {
                margin: 0 0.3rem;
            }

            .nav-link {
                padding: 0.4rem 0.6rem;
                font-size: 0.95rem;
            }

            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.95rem;
            }
        }

        @media screen and (max-width: 768px) {
            .nav-menu {
                position: fixed;
                top: 0;
                right: -100%;
                background-color: white;
                width: 280px;
                height: 100vh;
                flex-direction: column;
                align-items: flex-start;
                padding: 5rem 1.5rem 2rem;
                box-shadow: -5px 0 25px rgba(0, 0, 0, 0.1);
                transition: right 0.4s ease;
                z-index: 1000;
            }

            .nav-menu.active {
                right: 0;
                animation: slideIn 0.4s ease forwards;
            }

            .nav-item {
                margin: 0.8rem 0;
                width: 100%;
            }

            .nav-link {
                display: block;
                padding: 0.8rem 1rem;
                width: 100%;
                font-size: 1rem;
            }

            .nav-link:not(.btn)::after {
                display: none;
            }

            .hamburger {
                display: block;
                z-index: 1001;
            }

            .btn {
                width: 100%;
            }
        }

        @media screen and (max-width: 480px) {
            .navbar {
                padding: 0.7rem 1rem;
            }

            .logo-text {
                font-size: 1.5rem;
            }

            .nav-menu {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" aria-label="Main navigation">
        <div class="nav-container">
            <a href="/" class="logo" aria-label="{{ env('APP_NAME') }} homepage">
                <span class="logo-icon" aria-hidden="true">💸</span>
                <span class="logo-text">{{ env('APP_NAME') }}</span>
            </a>

            <ul class="nav-menu" id="nav-menu">
                <li class="nav-item">
                    <a href="#fitur" class="nav-link">Fitur</a>
                </li>
                <li class="nav-item">
                    <a href="#testimoni" class="nav-link">Testimoni</a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="nav-link btn btn-login">Masuk</a>
                </li>
                <li class="nav-item">
                    <a href="/register" class="nav-link btn btn-signup">Daftar Gratis</a>
                </li>
            </ul>

            <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <div class="overlay" id="overlay"></div>

    <script>
        // Toggle mobile menu
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('nav-menu');
        const overlay = document.getElementById('overlay');
        const body = document.body;

        function toggleMenu() {
            const isExpanded = hamburger.getAttribute('aria-expanded') === 'true';
            hamburger.setAttribute('aria-expanded', !isExpanded);
            navMenu.classList.toggle('active');
            overlay.classList.toggle('active');

            // Toggle body scroll
            body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';

            // Change icon
            hamburger.innerHTML = navMenu.classList.contains('active') ?
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        }

        hamburger.addEventListener('click', toggleMenu);

        // Close menu when clicking on overlay
        overlay.addEventListener('click', toggleMenu);

        // Close mobile menu when clicking on a nav link
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navMenu.classList.contains('active')) {
                    toggleMenu();
                }
            });
        });

        // Navbar scroll effect
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    // Close menu if open
                    if (navMenu.classList.contains('active')) {
                        toggleMenu();
                    }

                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>
