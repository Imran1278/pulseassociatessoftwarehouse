/**
 * =====================================================================
 * Main Application Logic
 * Handles navbar scroll, mobile menu, connector animations,
 * services slider, curriculum toggle, forms, and newsletter.
 * =====================================================================
 */
document.addEventListener('DOMContentLoaded', () => {

    /* ================================================= */
    /* 1. Navbar Scroll & Mobile Menu Toggle */
    /* ================================================= */
    const navbar = document.querySelector('.navbar');
    const mainHeader = document.getElementById('main-header');
    const menuToggle = document.querySelector('.menu-toggle');

    // Navbar scroll handler
    function handleNavbarScroll() {
        if (window.scrollY > 50) {
            if (navbar) navbar.classList.add('scrolled');
            if (mainHeader) mainHeader.classList.add('scrolled');
        } else {
            if (navbar) navbar.classList.remove('scrolled');
            if (mainHeader) mainHeader.classList.remove('scrolled');
        }
    }

    // Initialize scroll state and attach listener
    handleNavbarScroll();
    window.addEventListener('scroll', handleNavbarScroll);

    // Mobile menu toggle
    if (menuToggle && mainHeader) {
        menuToggle.addEventListener('click', () => {
            mainHeader.classList.toggle('active');
            const icon = menuToggle.querySelector('i');
            if (mainHeader.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    }

    /* ================================================= */
    /* 2. Connector Animation (Intersection Observer) */
    /* ================================================= */
    const connectors = [
        document.getElementById('connector-element'),
        document.getElementById('connector-element-2')
    ].filter(el => el !== null);

    if (connectors.length > 0) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-scrolled');
                    obs.unobserve(entry.target); // Animate once
                }
            });
        }, { root: null, rootMargin: '0px', threshold: 0.1 });

        connectors.forEach(connector => observer.observe(connector));
    }

    /* ================================================= */
    /* 3. Services Slider Logic */
    /* ================================================= */
    const grid = document.querySelector('.services-grid');
    const prevBtn = document.getElementById('prev-slide-btn');
    const nextBtn = document.getElementById('next-slide-btn');
    let currentSlide = 0;
    const totalSlides = 2; // 8 cards, 4 per slide

    function updateSlider() {
        if (!grid || !prevBtn || !nextBtn) return;
        grid.style.transform = `translateX(${currentSlide * -50}%)`;
        prevBtn.disabled = (currentSlide === 0);
        nextBtn.disabled = (currentSlide === totalSlides - 1);
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            if (currentSlide < totalSlides - 1) {
                currentSlide++;
                updateSlider();
            }
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            if (currentSlide > 0) {
                currentSlide--;
                updateSlider();
            }
        });
    }

    updateSlider(); // Initialize slider

    /* ================================================= */
    /* 4. Curriculum / Topic Toggle Logic */
    /* ================================================= */
    const topicHeaders = document.querySelectorAll('.topic-header');

    topicHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const topicItem = header.closest('.topic-item');
            const subTopics = topicItem.querySelector('.sub-topics');
            if (subTopics) subTopics.classList.toggle('expanded');
        });
    });

    /* ================================================= */
    /* 5. About Page / Future Enhancements Placeholder */
    /* ================================================= */
    console.log("About Us Page loaded. Ready for future JS enhancements.");

    

    /* ================================================= */
    /* 7. Footer Newsletter Subscription */
    /* ================================================= */
    function showFooterMessage(text) 
    {
        const msgBox = document.getElementById('footer-message-box');
        if (!msgBox) return;
        msgBox.textContent = text;
        msgBox.style.display = 'block';
        setTimeout(() => { msgBox.style.display = 'none'; }, 3000);
    }

        const newsletterForm = document.getElementById('newsletterForm');
    if (newsletterForm) 
    {
        newsletterForm.addEventListener('submit', function(event) 
        {
            const emailInput = document.getElementById('emailSubscribe');
            const email = emailInput.value.trim();
            if (!email || !email.includes('@') || !email.includes('.')) 
            {
                event.preventDefault(); // only block if invalid
                showFooterMessage('Please enter a valid email address.');
            }
            // otherwise let the form submit normally to PHP
        });
    }


});

// Projects Section
document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    // Function to handle the filtering logic
    function filterProjects(filter) {
        projectCards.forEach(card => {
            const category = card.getAttribute('data-category');
            
            if (filter === 'all' || category === filter) {
                // Show the card
                card.classList.remove('hidden');
                card.style.opacity = 1;
                card.style.pointerEvents = 'auto'; // Enable interaction
            } else {
                // Hide the card
                card.classList.add('hidden');
                card.style.opacity = 0;
                card.style.pointerEvents = 'none'; // Disable interaction
            }
        });
    }

    // Event listener for all filter buttons
    filterButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const filterValue = e.target.getAttribute('data-filter');
            
            // 1. Update active button state
            filterButtons.forEach(btn => btn.classList.remove('active'));
            e.target.classList.add('active');

            // 2. Apply filtering
            filterProjects(filterValue);
        });
    });

    // Initial load: show all projects
    filterProjects('all');
});


const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener('click', () =>{
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener('click', () =>{
    container.classList.remove("sign-up-mode");
});


