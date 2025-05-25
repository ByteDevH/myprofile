<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Name | Designer & Developer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <style>
        :root {
            --black: #0a0a0a;
            --dark-black: #050505;
            --green: #00ff88;
            --light-green: #66ffb3;
            --gray: #1a1a1a;
            --light-gray: #e0e0e0;
            --white: #ffffff;
            --easing: cubic-bezier(0.65, 0, 0.35, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--black);
            color: var(--white);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navigation */
        .nav-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 30px;
            mix-blend-mode: difference;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--white);
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .logo span {
            display: inline-block;
            transition: transform 0.6s var(--easing);
        }

        .logo:hover span {
            transform: translateY(-100%);
        }

        .logo::after {
            content: attr(data-text);
            position: absolute;
            top: 100%;
            left: 0;
            color: var(--green);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 40px;
        }

        .nav-links a {
            color: var(--white);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .nav-links a span {
            display: inline-block;
            transition: transform 0.6s var(--easing);
        }

        .nav-links a::after {
            content: attr(data-text);
            position: absolute;
            top: 100%;
            left: 0;
            color: var(--green);
        }

        .nav-links a:hover span {
            transform: translateY(-100%);
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            z-index: 1001;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 8%;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 800px;
        }

        .hero h1 {
            font-size: 5vw;
            font-weight: 600;
            line-height: 1.1;
            margin-bottom: 30px;
            overflow: hidden;
        }

        .hero h1 span {
            display: inline-block;
            transform: translateY(100%);
            opacity: 0;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 500px;
            margin-bottom: 40px;
            color: var(--light-gray);
            transform: translateY(20px);
            opacity: 0;
        }

        .scroll-down {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--white);
            text-decoration: none;
            font-size: 0.9rem;
            opacity: 0;
        }

        .scroll-down span {
            margin-bottom: 10px;
        }

        .scroll-down::after {
            content: '';
            display: block;
            width: 1px;
            height: 60px;
            background-color: var(--white);
            animation: scrollPulse 2s infinite;
        }

        @keyframes scrollPulse {
            0% { transform: translateY(0); opacity: 1; }
            100% { transform: translateY(20px); opacity: 0; }
        }

        /* Projects Section */
        .projects {
            padding: 150px 8%;
        }

        .projects-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 80px;
        }

        .section-title {
            font-size: 3vw;
            font-weight: 600;
            line-height: 1.1;
        }

        .view-all {
            color: var(--white);
            text-decoration: none;
            font-size: 1rem;
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .view-all span {
            display: inline-block;
            transition: transform 0.6s var(--easing);
        }

        .view-all::after {
            content: attr(data-text);
            position: absolute;
            top: 100%;
            left: 0;
            color: var(--green);
        }

        .view-all:hover span {
            transform: translateY(-100%);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }

        .project-card {
            position: relative;
            overflow: hidden;
            aspect-ratio: 1.5;
        }

        .project-image {
            width: 100%;
            height: 100%;
            background-color: var(--gray);
            background-size: cover;
            background-position: center;
            transition: transform 1.2s var(--easing);
        }

        .project-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            opacity: 0;
            transition: opacity 0.6s var(--easing);
        }

        .project-card:hover .project-overlay {
            opacity: 1;
        }

        .project-card:hover .project-image {
            transform: scale(1.05);
        }

        .project-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 10px;
            transform: translateY(20px);
            transition: transform 0.6s var(--easing);
        }

        .project-category {
            color: var(--light-gray);
            transform: translateY(20px);
            transition: transform 0.6s var(--easing) 0.1s;
        }

        .project-link {
            align-self: flex-end;
            color: var(--white);
            text-decoration: none;
            font-size: 1rem;
            transform: translateY(20px);
            transition: transform 0.6s var(--easing) 0.2s;
        }

        .project-card:hover .project-title,
        .project-card:hover .project-category,
        .project-card:hover .project-link {
            transform: translateY(0);
        }

        /* Skills Section */
        .skills {
            padding: 150px 8%;
            background-color: var(--dark-black);
        }

        .skills-header {
            margin-bottom: 80px;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .skill-category {
            margin-bottom: 60px;
        }

        .skill-category h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--green);
            position: relative;
            display: inline-block;
        }

        .skill-category h3::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--green);
        }

        .skill-item {
            margin-bottom: 30px;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s var(--easing), transform 0.6s var(--easing);
        }

        .skill-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .skill-name {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .skill-bar {
            height: 4px;
            background-color: var(--gray);
            border-radius: 2px;
            overflow: hidden;
        }

        .skill-progress {
            height: 100%;
            background-color: var(--green);
            border-radius: 2px;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 1.5s var(--easing) 0.3s;
        }

        .skill-item.visible .skill-progress {
            transform: scaleX(1);
        }

        /* About Section */
        .about {
            padding: 150px 8%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 80px;
            align-items: center;
        }

        .about-image {
            position: relative;
            aspect-ratio: 1;
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .about-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 1px solid var(--green);
            transform: translate(20px, 20px);
            z-index: -1;
        }

        .about-content h2 {
            font-size: 3vw;
            font-weight: 600;
            line-height: 1.1;
            margin-bottom: 30px;
        }

        .about-content p {
            font-size: 1.1rem;
            color: var(--light-gray);
            margin-bottom: 20px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .stat-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s var(--easing), transform 0.6s var(--easing);
        }

        .stat-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .stat-item h3 {
            font-size: 3rem;
            font-weight: 600;
            color: var(--green);
            margin-bottom: 10px;
        }

        .stat-item p {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Footer */
        footer {
            padding: 100px 8%;
            background-color: var(--dark-black);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 80px;
        }

        .footer-about h2 {
            font-size: 3vw;
            font-weight: 600;
            line-height: 1.1;
            margin-bottom: 30px;
        }

        .footer-about p {
            font-size: 1.1rem;
            color: var(--light-gray);
            margin-bottom: 30px;
        }

        .social-links {
            display: flex;
            gap: 20px;
        }

        .social-links a {
            color: var(--white);
            font-size: 1.2rem;
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .social-links a:hover {
            color: var(--green);
            transform: translateY(-3px);
        }

        .footer-links {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .link-group h3 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .link-group ul {
            list-style: none;
        }

        .link-group li {
            margin-bottom: 15px;
        }

        .link-group a {
            color: var(--light-gray);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .link-group a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background-color: var(--green);
            transition: width 0.3s ease;
        }

        .link-group a:hover {
            color: var(--green);
        }

        .link-group a:hover::after {
            width: 100%;
        }

        .copyright {
            margin-top: 80px;
            padding-top: 30px;
            border-top: 1px solid var(--gray);
            display: flex;
            justify-content: space-between;
            color: var(--light-gray);
            font-size: 0.9rem;
        }

        /* Floating Particles Animation */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background-color: var(--green);
            border-radius: 50%;
            opacity: 0.3;
            filter: blur(1px);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .projects-grid, .skills-grid {
                grid-template-columns: 1fr;
            }

            .about, .footer-content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .nav-container {
                padding: 20px;
            }

            .nav-links {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background-color: var(--black);
                flex-direction: column;
                justify-content: center;
                align-items: center;
                transform: translateY(-100%);
                transition: transform 0.6s var(--easing);
            }

            .nav-links.active {
                transform: translateY(0);
            }

            .nav-links li {
                margin: 15px 0;
            }

            .menu-toggle {
                display: block;
                width: 30px;
                height: 20px;
                position: relative;
            }

            .menu-toggle span {
                position: absolute;
                width: 100%;
                height: 2px;
                background-color: var(--white);
                transition: all 0.3s ease;
            }

            .menu-toggle span:nth-child(1) {
                top: 0;
            }

            .menu-toggle span:nth-child(2) {
                top: 50%;
                transform: translateY(-50%);
            }

            .menu-toggle span:nth-child(3) {
                bottom: 0;
            }

            .menu-toggle.active span:nth-child(1) {
                transform: translateY(9px) rotate(45deg);
            }

            .menu-toggle.active span:nth-child(2) {
                opacity: 0;
            }

            .menu-toggle.active span:nth-child(3) {
                transform: translateY(-9px) rotate(-45deg);
            }

            .hero h1 {
                font-size: 10vw;
            }

            .section-title {
                font-size: 8vw;
            }

            .about-content h2,
            .footer-about h2 {
                font-size: 8vw;
            }
        }
    </style>
</head>
<body>
    <!-- Floating Particles -->
    <div class="particles" id="particles"></div>

    <!-- Navigation -->
    <div class="nav-container">
        <nav>
            <a href="#" class="logo" data-text="Your Name">Your<span>Name</span></a>
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-links">
                <li><a href="#projects" data-text="Projects"><span>Projects</span></a></li>
                <li><a href="#skills" data-text="Skills"><span>Skills</span></a></li>
                <li><a href="#about" data-text="About"><span>About</span></a></li>
                <li><a href="#contact" data-text="Contact"><span>Contact</span></a></li>
            </ul>
        </nav>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>
                <span>Designer</span><br>
                <span>& Developer</span>
            </h1>
            <p class="animate-in">Creating digital experiences that are beautiful, functional, and meaningful.</p>
            <a href="#projects" class="scroll-down animate-in">
                <span>Scroll Down</span>
            </a>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects">
        <div class="projects-header">
            <h2 class="section-title">Selected<br>Projects</h2>
            <a href="#" class="view-all" data-text="View All"><span>View All</span></a>
        </div>
        <div class="projects-grid">
            <div class="project-card">
                <div class="project-image" style="background-image: url('https://via.placeholder.com/800x600')"></div>
                <div class="project-overlay">
                    <div>
                        <h3 class="project-title">E-Commerce Platform</h3>
                        <p class="project-category">UI/UX Design & Development</p>
                    </div>
                    <a href="#" class="project-link">View Project →</a>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image" style="background-image: url('https://via.placeholder.com/800x600')"></div>
                <div class="project-overlay">
                    <div>
                        <h3 class="project-title">Mobile App Design</h3>
                        <p class="project-category">Product Design</p>
                    </div>
                    <a href="#" class="project-link">View Project →</a>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image" style="background-image: url('https://via.placeholder.com/800x600')"></div>
                <div class="project-overlay">
                    <div>
                        <h3 class="project-title">Brand Identity</h3>
                        <p class="project-category">Visual Design</p>
                    </div>
                    <a href="#" class="project-link">View Project →</a>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image" style="background-image: url('https://via.placeholder.com/800x600')"></div>
                <div class="project-overlay">
                    <div>
                        <h3 class="project-title">Web Application</h3>
                        <p class="project-category">Full-Stack Development</p>
                    </div>
                    <a href="#" class="project-link">View Project →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="skills">
        <div class="container">
            <div class="skills-header">
                <h2 class="section-title">Technical<br>Skills</h2>
            </div>
            <div class="skills-grid">
                <div class="skill-category">
                    <h3>Frontend</h3>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>HTML5</span>
                            <span>95%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 95%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>CSS3/Sass</span>
                            <span>90%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 90%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>JavaScript</span>
                            <span>85%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>React</span>
                            <span>80%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 80%"></div>
                        </div>
                    </div>
                </div>
                <div class="skill-category">
                    <h3>Backend</h3>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>Node.js</span>
                            <span>85%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>Python</span>
                            <span>75%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>PHP</span>
                            <span>70%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 70%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>SQL</span>
                            <span>80%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 80%"></div>
                        </div>
                    </div>
                </div>
                <div class="skill-category">
                    <h3>Design & Tools</h3>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>Figma</span>
                            <span>90%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 90%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>Adobe CC</span>
                            <span>85%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>Git</span>
                            <span>80%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 80%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>Webpack</span>
                            <span>75%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="about-image">
            <img src="https://via.placeholder.com/600x600" alt="About Image">
        </div>
        <div class="about-content">
            <h2>About Me</h2>
            <p>I'm a designer and developer with a passion for creating digital experiences that are both beautiful and functional. With over 5 years of experience, I've worked with clients ranging from startups to Fortune 500 companies.</p>
            <p>My approach combines aesthetic sensibility with technical expertise, ensuring that every project not only looks great but also performs flawlessly across all devices and platforms.</p>
            <div class="stats">
                <div class="stat-item">
                    <h3>50+</h3>
                    <p>Projects Completed</p>
                </div>
                <div class="stat-item">
                    <h3>25+</h3>
                    <p>Happy Clients</p>
                </div>
                <div class="stat-item">
                    <h3>5+</h3>
                    <p>Years Experience</p>
                </div>
                <div class="stat-item">
                    <h3>10+</h3>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="footer-content">
            <div class="footer-about">
                <h2>Let's Work Together</h2>
                <p>I'm always interested in hearing about new projects and opportunities. Whether you have a question or just want to say hi, I'll get back to you as soon as possible.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-dribbble"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-links">
                <div class="link-group">
                    <h3>Navigation</h3>
                    <ul>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="link-group">
                    <h3>Contact</h3>
                    <ul>
                        <li><a href="mailto:hello@yourname.com">hello@yourname.com</a></li>
                        <li><a href="tel:+1234567890">+1 (234) 567-890</a></li>
                        <li><a href="#">San Francisco, CA</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>© 2023 Your Name. All rights reserved.</p>
            <p>Made with <i class="fas fa-heart" style="color: var(--green)"></i> by You</p>
        </div>
    </footer>

    <script>
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
    </script>
</body>
</html>
<!-- test -->