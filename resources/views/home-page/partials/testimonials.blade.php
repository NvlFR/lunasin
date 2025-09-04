<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - Testimonial</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
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
        }

        .testimonials {
            position: relative;
            padding: 6rem 1.5rem;
            background: linear-gradient(135deg, #f6f9ff 0%, #e9f2ff 100%);
            overflow: hidden;
        }

        .testimonials::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(67, 97, 238, 0.05);
            z-index: 0;
        }

        .testimonials::after {
            content: '';
            position: absolute;
            bottom: -150px;
            left: -150px;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: rgba(6, 214, 160, 0.05);
            z-index: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease-out forwards;
        }

        .section-subtitle {
            display: inline-block;
            background: rgba(6, 214, 160, 0.1);
            color: var(--secondary);
            padding: 0.5rem 1.5rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .section-title span {
            color: var(--primary);
            position: relative;
        }

        .section-title span::after {
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

        .section-desc {
            font-size: 1.125rem;
            line-height: 1.7;
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .testimonial-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2.5rem 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            opacity: 0;
            transform: translateY(30px);
            position: relative;
            overflow: hidden;
        }

        .testimonial-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .testimonial-card:hover::before {
            transform: scaleX(1);
        }

        .quote-icon {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            font-size: 3rem;
            color: rgba(67, 97, 238, 0.1);
            z-index: 0;
        }

        .testimonial-content {
            position: relative;
            z-index: 1;
        }

        .testimonial-text {
            font-size: 1rem;
            line-height: 1.7;
            color: var(--gray);
            margin-bottom: 1.5rem;
            position: relative;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 1rem;
            border: 3px solid var(--gray-light);
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info {
            display: flex;
            flex-direction: column;
        }

        .author-name {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .author-title {
            font-size: 0.875rem;
            color: var(--gray);
        }

        .rating {
            display: flex;
            margin-top: 0.5rem;
        }

        .rating i {
            color: #FFD700;
            font-size: 0.875rem;
            margin-right: 0.25rem;
        }

        .testimonials-cta {
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease-out 0.5s forwards;
        }

        .cta-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--dark);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
        }

        /* Animasi */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Responsive Styles */
        @media screen and (max-width: 968px) {
            .testimonials-grid {
                grid-template-columns: 1fr;
                max-width: 600px;
                margin: 0 auto 3rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media screen and (max-width: 640px) {
            .testimonials {
                padding: 4rem 1rem;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .section-desc {
                font-size: 1rem;
            }

            .testimonial-card {
                padding: 2rem 1.5rem;
            }

            .testimonial-author {
                flex-direction: column;
                align-items: flex-start;
            }

            .author-avatar {
                margin-bottom: 1rem;
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Testimonials Section -->
    <section id="testimoni" class="testimonials">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">
                    <i class="fas fa-star"></i> Testimonial Pengguna
                </div>
                <h2 class="section-title">Apa Kata <span>Mereka?</span></h2>
                <p class="section-desc">Lihat bagaimana {{ env('APP_NAME') }} telah membantu banyak orang dalam mengelola keuangan pribadi dan bisnis mereka.</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card" style="animation-delay: 0.2s">
                    <div class="quote-icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="testimonial-content">
                        <p class="testimonial-text">"Sebagai pemilik usaha kecil, aplikasi pencatatan keuangan ini sangat membantu. Saya jadi bisa fokus ke bisnis tanpa pusing soal siapa yang belum bayar."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="Budi">
                            </div>
                            <div class="author-info">
                                <span class="author-name">Budi Santoso</span>
                                <span class="author-title">Pemilik Warung</span>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card" style="animation-delay: 0.4s">
                    <div class="quote-icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="testimonial-content">
                        <p class="testimonial-text">"Sering pinjam-meminjam uang dengan teman. Dengan {{ env('APP_NAME') }}, semua tercatat rapi. Hubungan pertemanan aman! Aplikasi gratis utang piutang terbaik."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="Ani">
                            </div>
                            <div class="author-info">
                                <span class="author-name">Ani Wijaya</span>
                                <span class="author-title">Mahasiswi</span>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card" style="animation-delay: 0.6s">
                    <div class="quote-icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="testimonial-content">
                        <p class="testimonial-text">"Sebagai freelancer, saya sering harus menagih pembayaran dari klien. {{ env('APP_NAME') }} sangat membantu mengingatkan saya untuk menagih tepat waktu."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="https://images.unsplash.com/photo-1552058544-f2b08422138a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="Rina">
                            </div>
                            <div class="author-info">
                                <span class="author-name">Rina Melati</span>
                                <span class="author-title">Freelancer</span>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonials-cta">
                <h3 class="cta-title">Bergabung dengan Ribuan Pengguna {{ env('APP_NAME') }}</h3>
                <a href="/register" class="btn btn-primary">
                    Daftar Sekarang <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <script>
        // Animasi untuk testimonial cards saat scroll
        document.addEventListener('DOMContentLoaded', function() {
            const testimonialCards = document.querySelectorAll('.testimonial-card');

            // Function to check if element is in viewport
            function isInViewport(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }

            // Function to handle scroll animation
            function checkScroll() {
                testimonialCards.forEach((card, index) => {
                    if (isInViewport(card)) {
                        setTimeout(() => {
                            card.style.animation = `fadeInUp 0.8s ease-out ${index * 0.1}s forwards`;
                        }, 100);
                    }
                });
            }

            // Initial check
            checkScroll();

            // Listen for scroll events
            window.addEventListener('scroll', checkScroll);
        });
    </script>
</body>
</html>
