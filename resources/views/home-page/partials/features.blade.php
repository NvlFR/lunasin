<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - Fitur Unggulan</title>
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

        .features {
            position: relative;
            padding: 6rem 1.5rem;
            background: linear-gradient(135deg, #f6f9ff 0%, #e9f2ff 100%);
            overflow: hidden;
        }

        .features::before {
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

        .features::after {
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

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2.5rem 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            opacity: 0;
            transform: translateY(30px);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
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

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            margin-bottom: 1.5rem;
            position: relative;
            transition: all 0.4s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        }

        .feature-icon i {
            font-size: 2.5rem;
            color: var(--primary);
            transition: all 0.4s ease;
        }

        .feature-card:hover .feature-icon i {
            color: white;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .feature-desc {
            font-size: 1rem;
            line-height: 1.6;
            color: var(--gray);
            margin-bottom: 1.5rem;
        }

        .feature-link {
            display: inline-flex;
            align-items: center;
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-top: auto;
        }

        .feature-link i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .feature-link:hover {
            color: var(--primary-dark);
        }

        .feature-link:hover i {
            transform: translateX(5px);
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
            .features-grid {
                grid-template-columns: 1fr;
                max-width: 500px;
                margin: 0 auto;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media screen and (max-width: 640px) {
            .features {
                padding: 4rem 1rem;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .section-desc {
                font-size: 1rem;
            }

            .feature-card {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Features Section -->
    <section id="fitur" class="features">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">
                    <i class="fas fa-bolt"></i> Fitur Unggulan
                </div>
                <h2 class="section-title">Semua Jadi <span>Mudah</span></h2>
                <p class="section-desc">Fitur yang kami rancang khusus untuk mempermudah pengelolaan keuangan pribadi dan bisnis Anda.</p>
            </div>

            <div class="features-grid">
                <div class="feature-card" style="animation-delay: 0.2s">
                    <div class="feature-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h3 class="feature-title">Pencatatan Cepat</h3>
                    <p class="feature-desc">Catat utang atau piutang baru hanya dalam hitungan detik. Interface yang sederhana dan intuitif membuat pencatatan tidak ribet.</p>
                    <a href="#" class="feature-link">
                        Pelajari lebih lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="feature-card" style="animation-delay: 0.4s">
                    <div class="feature-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h3 class="feature-title">Pengingat Otomatis</h3>
                    <p class="feature-desc">Tak ada lagi lupa bayar atau nagih. Dapatkan notifikasi otomatis via email & WhatsApp saat jatuh tempo.</p>
                    <a href="#" class="feature-link">
                        Pelajari lebih lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="feature-card" style="animation-delay: 0.6s">
                    <div class="feature-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h3 class="feature-title">Laporan Sederhana</h3>
                    <p class="feature-desc">Lihat ringkasan utang piutang Anda dengan visualisasi data yang mudah dibaca dan dipahami kapan saja.</p>
                    <a href="#" class="feature-link">
                        Pelajari lebih lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="feature-card" style="animation-delay: 0.2s">
                    <div class="feature-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3 class="feature-title">Keamanan Data</h3>
                    <p class="feature-desc">Data keuangan Anda dienkripsi dengan teknologi terbaru untuk menjaga kerahasiaan informasi sensitif.</p>
                    <a href="#" class="feature-link">
                        Pelajari lebih lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="feature-card" style="animation-delay: 0.4s">
                    <div class="feature-icon">
                        <i class="fas fa-sync"></i>
                    </div>
                    <h3 class="feature-title">Sinkronisasi Multi-Device</h3>
                    <p class="feature-desc">Akses data Anda dari mana saja, kapan saja. Sinkronisasi otomatis antar perangkat untuk kemudahan akses.</p>
                    <a href="#" class="feature-link">
                        Pelajari lebih lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="feature-card" style="animation-delay: 0.6s">
                    <div class="feature-icon">
                        <i class="fas fa-download"></i>
                    </div>
                    <h3 class="feature-title">Ekspor Data</h3>
                    <p class="feature-desc">Unduh laporan keuangan dalam format PDF atau Excel untuk kebutuhan arsip dan analisis lebih lanjut.</p>
                    <a href="#" class="feature-link">
                        Pelajari lebih lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Animasi untuk fitur cards saat scroll
        document.addEventListener('DOMContentLoaded', function() {
            const featureCards = document.querySelectorAll('.feature-card');

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
                featureCards.forEach((card, index) => {
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
