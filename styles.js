document.addEventListener('DOMContentLoaded', function () {
    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    menuToggle.addEventListener('click', function () {
        this.classList.toggle('active');
        navLinks.classList.toggle('active');
    });

    // Smooth scrolling for navigation links
    document.querySelectorAll('.nav-links a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
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

    // View toggle functionality
    const viewToggles = document.querySelectorAll('.view-toggle');
    const viewContents = document.querySelectorAll('.view-content');

    viewToggles.forEach(toggle => {
        toggle.addEventListener('click', function () {
            const viewType = this.dataset.view;

            // Update active state for buttons
            viewToggles.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            // Show the selected view
            viewContents.forEach(content => {
                content.classList.remove('active');
                if (content.classList.contains(`projects-${viewType}`)) {
                    content.classList.add('active');
                }
            });

            // Store preference in localStorage
            localStorage.setItem('projectViewPreference', viewType);
        });
    });

    // Check for saved view preference
    const savedView = localStorage.getItem('projectViewPreference');
    if (savedView) {
        const toggle = document.querySelector(`.view-toggle[data-view="${savedView}"]`);
        if (toggle) toggle.click();
    }

    // Project click handlers
    document.querySelectorAll('.project-link').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const projectTitle = this.closest('.project-card, .project-list-item')
                .querySelector('.project-title, h3').textContent;

            // Create a modal with project details
            const modal = document.createElement('div');
            modal.className = 'project-modal';
            modal.innerHTML = `
                       <div class="modal-content">
    <button class="modal-close">&times;</button>
    <h3>${projectTitle}</h3>
    
    <div class="project-list">
        <div class="project-item">
            <h4>Automotive Workshop Management System (Final Year Project)</h4>
            <p>This project is designed to streamline the operations of an automotive workshop, enhancing efficiency and customer service.</p>
        </div>
        
        <div class="project-item">
            <h4>Tuberculosis Management System</h4>
            <p>This project delivers an end-to-end solution for detecting and tracking tuberculosis patients and their treatment progress, utilizing AI technology.</p>
        </div>
        
        <div class="project-item">
            <h4>TM Pukal System</h4>
            <p>This project focuses on generating information and managing data efficiently.</p>
        </div>
        
        <div class="project-item">
            <h4>Cabinet and Policy Department System</h4>
            <p>This project provides Malaysians with updated information on new government policies.</p>
        </div>
        
        <div class="project-item">
            <h4>Work Flow Management System</h4>
            <p>This project aims to streamline workflow management and progress tracking.</p>
        </div>
        
        <div class="project-item">
            <h4>MyInForest System</h4>
            <p>This project facilitates the registration of training programs and the effective management of subjects.</p>
        </div>
    </div>
</div>
                    `;

            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';

            // Close modal handlers
            modal.querySelector('.modal-close').addEventListener('click', () => {
                modal.remove();
                document.body.style.overflow = '';
            });

            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.remove();
                    document.body.style.overflow = '';
                }
            });
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