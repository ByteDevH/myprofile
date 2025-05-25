
document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const menuToggle = document.querySelector('.menu-toggle');
            const navLinks = document.querySelector('.nav-links');
            
            menuToggle.addEventListener('click', function() {
                this.classList.toggle('active');
                navLinks.classList.toggle('active');
            });

            // Smooth scrolling for navigation links
            document.querySelectorAll('.nav-links a').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    menuToggle.classList.remove('active');
                    navLinks.classList.remove('active');
                });
            });

            // Hero text animation
            const heroTitle = document.querySelector('.hero h1');
            const titleSpans = heroTitle.querySelectorAll('span');
            
            setTimeout(() => {
                titleSpans.forEach((span, index) => {
                    setTimeout(() => {
                        span.style.transform = 'translateY(0)';
                        span.style.opacity = '1';
                    }, index * 200);
                });
            }, 500);

            // Animate elements on scroll
            const animateOnScroll = () => {
                const elements = document.querySelectorAll('.animate-in, .skill-item, .stat-item');
                
                elements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (elementTop < windowHeight - 100) {
                        element.classList.add('visible');
                    }
                });
            };

            // Run on load
            animateOnScroll();
            
            // Then run on scroll
            window.addEventListener('scroll', animateOnScroll);

            // Project card hover animation
            const projectCards = document.querySelectorAll('.project-card');
            
            projectCards.forEach(card => {
                const overlay = card.querySelector('.project-overlay');
                const title = card.querySelector('.project-title');
                const category = card.querySelector('.project-category');
                const link = card.querySelector('.project-link');
                
                card.addEventListener('mouseenter', () => {
                    overlay.style.opacity = '1';
                    title.style.transform = 'translateY(0)';
                    category.style.transform = 'translateY(0)';
                    link.style.transform = 'translateY(0)';
                });
                
                card.addEventListener('mouseleave', () => {
                    overlay.style.opacity = '0';
                    title.style.transform = 'translateY(20px)';
                    category.style.transform = 'translateY(20px)';
                    link.style.transform = 'translateY(20px)';
                });
            });

            // Floating particles animation
            const particlesContainer = document.getElementById('particles');
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random size between 2px and 6px
                const size = Math.random() * 4 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                
                // Random animation
                const duration = Math.random() * 20 + 10;
                const delay = Math.random() * 5;
                particle.style.animation = `float ${duration}s ease-in-out ${delay}s infinite alternate`;
                
                particlesContainer.appendChild(particle);
            }

            // Add floating animation to CSS
            const style = document.createElement('style');
            style.textContent = `
                @keyframes float {
                    0% {
                        transform: translate(0, 0) rotate(0deg);
                    }
                    50% {
                        transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px) rotate(180deg);
                    }
                    100% {
                        transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px) rotate(360deg);
                    }
                }
            `;
            document.head.appendChild(style);

            // Scroll to reveal animation for about section
            const aboutSection = document.querySelector('.about');
            const aboutImage = document.querySelector('.about-image');
            const aboutContent = document.querySelector('.about-content');
            
            const aboutObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        aboutImage.style.transform = 'translateX(0)';
                        aboutImage.style.opacity = '1';
                        aboutContent.style.transform = 'translateX(0)';
                        aboutContent.style.opacity = '1';
                    }
                });
            }, { threshold: 0.1 });

            aboutObserver.observe(aboutSection);

            // Initialize styles for about section animation
            aboutImage.style.transform = 'translateX(-50px)';
            aboutImage.style.opacity = '0';
            aboutImage.style.transition = 'transform 0.8s var(--easing), opacity 0.8s var(--easing)';
            
            aboutContent.style.transform = 'translateX(50px)';
            aboutContent.style.opacity = '0';
            aboutContent.style.transition = 'transform 0.8s var(--easing), opacity 0.8s var(--easing)';
        });