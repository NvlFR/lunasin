{{-- File: resources/views/partials/cta.blade.php --}}
<section class="relative bg-gradient-to-r from-blue-600 to-indigo-700 text-white overflow-hidden">
    <!-- Background decoration elements -->
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-10 left-10 w-20 h-20 bg-white opacity-10 rounded-full animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-16 h-16 bg-white opacity-10 rounded-full animate-pulse delay-300"></div>
        <div class="absolute top-1/2 left-1/4 w-12 h-12 bg-white opacity-5 rounded-full animate-pulse delay-500"></div>
    </div>

    <div class="container mx-auto px-6 py-20 text-center relative z-10">
        <!-- Heading with animation -->
        <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight transform transition-all duration-700 ease-out opacity-0 translate-y-10"
            data-animate="fade-in">
            Kendalikan Utang Piutang dengan <span class="text-yellow-300">{{ env('APP_NAME') }}</span>
        </h2>

        <!-- Description with animation -->
        <p class="text-blue-100 mb-10 max-w-2xl mx-auto text-lg md:text-xl transform transition-all duration-700 ease-out opacity-0 translate-y-10 delay-150"
           data-animate="fade-in">
            Mulai kelola keuangan dengan lebih baik. Daftar sekarang dan nikmati kemudahan pencatatan utang piutang hanya dalam satu menit.
        </p>

        <!-- CTA Button with hover animation -->
        <a href="/register"
           class="inline-block bg-white hover:bg-yellow-300 text-blue-700 hover:text-blue-800 font-bold py-4 px-10 rounded-full text-lg md:text-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 ease-in-out opacity-0"
           data-animate="fade-in">
            <span class="flex items-center justify-center">
                Daftar Gratis Sekarang
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </span>
        </a>

        <!-- Additional info -->
        <p class="mt-6 text-blue-200 text-sm opacity-0 transform transition-all duration-700 ease-out delay-500"
           data-animate="fade-in">
            Tidak perlu kartu kredit. Coba 14 hari gratis.
        </p>
    </div>
</section>

{{-- Add JavaScript for scroll animations --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const animatedElements = document.querySelectorAll('[data-animate="fade-in"]');

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
        function handleScrollAnimation() {
            animatedElements.forEach(element => {
                if (isInViewport(element)) {
                    element.classList.remove('opacity-0', 'translate-y-10');
                    element.classList.add('opacity-100', 'translate-y-0');
                }
            });
        }

        // Initial check on page load
        handleScrollAnimation();

        // Listen for scroll events
        window.addEventListener('scroll', handleScrollAnimation);
    });
</script>
