<?php
require_once 'includes/header.php';
require_once 'includes/db.php'; // Add database connection

// Check if database connection is successful
if (!isset($pdo)) {
    die("Database connection failed. Please check your configuration.");
}
?>

<main>
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero__content">
                <h1 class="hero__title">Creative Design Portfolio</h1>
                <p class="hero__description">Showcasing innovative design solutions and creative projects that make an
                    impact.</p>
                <a href="#portfolio" class="btn">View My Work</a>
            </div>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section class="projects" id="portfolio">
        <div class="container">
            <h2 class="section__title">Featured Projects</h2>
            <div class="project__grid">
                <div class="project__card">
                    <img src="assets/images/featured project/Spaghetti EDIX.jpg" alt="Spaghetti EDIX"
                        class="project__image" onclick="openModal(this)">
                    <div class="project__content">
                        <h3 class="project__title">Spaghetti EDIX</h3>
                        <p class="project__description">Food photography and menu design</p>
                    </div>
                </div>
                <div class="project__card">
                    <img src="assets/images/featured project/cliping mask.jpg" alt="Clipping Mask"
                        class="project__image" onclick="openModal(this)">
                    <div class="project__content">
                        <h3 class="project__title">Clipping Mask</h3>
                        <p class="project__description">Creative photo manipulation</p>
                    </div>
                </div>
                <div class="project__card">
                    <img src="assets/images/featured project/White on jeans.jpg" alt="White on Jeans"
                        class="project__image" onclick="openModal(this)">
                    <div class="project__content">
                        <h3 class="project__title">White on Jeans</h3>
                        <p class="project__description">Fashion photography</p>
                    </div>
                </div>
                <div class="project__card">
                    <img src="assets/images/featured project/Food menu.jpg" alt="Food Menu" class="project__image"
                        onclick="openModal(this)">
                    <div class="project__content">
                        <h3 class="project__title">Food Menu</h3>
                        <p class="project__description">Menu design and layout</p>
                    </div>
                </div>
                <div class="project__card">
                    <img src="assets/images/featured project/Ama Mensah BD.jpg" alt="Ama Mensah" class="project__image"
                        onclick="openModal(this)">
                    <div class="project__content">
                        <h3 class="project__title">Ama Mensah</h3>
                        <p class="project__description">Portrait photography</p>
                    </div>
                </div>
                <div class="project__card">
                    <img src="assets/images/featured project/Elinam.jpg" alt="Elinam" class="project__image"
                        onclick="openModal(this)">
                    <div class="project__content">
                        <h3 class="project__title">Elinam</h3>
                        <p class="project__description">Portrait photography</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Modal -->
    <div id="imageModal" class="modal">
        <span class="modal__close" onclick="closeModal()">&times;</span>
        <img class="modal__content" id="modalImage">
        <div id="modalCaption"></div>
    </div>

    <script>
        function openModal(img) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const captionText = document.getElementById('modalCaption');

            modal.style.display = "block";
            modalImg.src = img.src;
            captionText.innerHTML = img.alt;

            // Add animation class
            modal.classList.add('modal-open');
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('modal-open');
            setTimeout(() => {
                modal.style.display = "none";
            }, 300);
        }

        // Close modal when clicking outside the image
        window.onclick = function (event) {
            const modal = document.getElementById('imageModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <h2 class="section__title">My Services</h2>
            <div class="service__grid">
                <div class="service__card">
                    <div class="service__icon-wrapper">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="service__title">Marketing</h3>
                    <p class="service__description">Strategic solutions to boost your brand's reach and engagement. Let's turn ideas into results with impactful campaigns.</p>
                    <ul class="service__features">
                        <li><i class="fas fa-check"></i> Social Media Marketing</li>
                        <li><i class="fas fa-check"></i> Digital Advertising</li>
                        <li><i class="fas fa-check"></i> Content Strategy</li>
                        <li><i class="fas fa-check"></i> Campaign Management</li>
                    </ul>
                </div>

                <div class="service__card">
                    <div class="service__icon-wrapper">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3 class="service__title">Graphic Design</h3>
                    <p class="service__description">Creative visuals that bring your brand to life. From logos to flyers, we craft designs that make a lasting impression.</p>
                    <ul class="service__features">
                        <li><i class="fas fa-check"></i> Logo Design</li>
                        <li><i class="fas fa-check"></i> Print Materials</li>
                        <li><i class="fas fa-check"></i> Digital Graphics</li>
                        <li><i class="fas fa-check"></i> Brand Collateral</li>
                    </ul>
                </div>

                <div class="service__card">
                    <div class="service__icon-wrapper">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h3 class="service__title">Branding</h3>
                    <p class="service__description">Building a strong and unique identity for your business. Stand out with professional branding that tells your story.</p>
                    <ul class="service__features">
                        <li><i class="fas fa-check"></i> Brand Strategy</li>
                        <li><i class="fas fa-check"></i> Visual Identity</li>
                        <li><i class="fas fa-check"></i> Brand Guidelines</li>
                        <li><i class="fas fa-check"></i> Brand Messaging</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <h2 class="section__title">Contact Us</h2>

            <div class="contact__cards">
                <div class="contact__card">
                    <div class="contact__icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Marketing & Branding</h3>
                    <p>Let's build a strong brand identity together! Contact us for custom branding solutions that make
                        your business stand out</p>
                </div>

                <div class="contact__card">
                    <div class="contact__icon">
                        <i class="fas fa-print"></i>
                    </div>
                    <h3>Printing & Lettering</h3>
                    <p>Get high-quality prints and custom lettering services. Let us bring your designs to life with
                        precision and excellence.</p>
                </div>

                <div class="contact__card">
                    <div class="contact__icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h3>Support</h3>
                    <p>Need assistance? We're here to help! Reach out for inquiries, design consultations, or any
                        support regarding our services</p>
                </div>
            </div>

            <div class="contact__form-container">
                <form class="contact__form" id="contactForm" action="process_contact.php" method="POST">
                    <div class="form__group">
                        <label for="name" class="form__label">Name</label>
                        <input type="text" id="name" name="name" class="form__input" required>
                    </div>
                    <div class="form__group">
                        <label for="email" class="form__label">Email</label>
                        <input type="email" id="email" name="email" class="form__input" required>
                    </div>
                    <div class="form__group">
                        <label for="message" class="form__label">Message</label>
                        <textarea id="message" name="message" class="form__textarea" rows="5" required></textarea>
                    </div>
                    <button type="submit" id="submitBtn" class="btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php
require_once 'includes/footer.php';
?>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submitBtn');
    const formData = new FormData(this);
    
    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';
    
    fetch('process_contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            submitBtn.textContent = 'Submitted';
            submitBtn.classList.add('submitted');
            this.reset();
            alert('Message sent successfully!');
        } else {
            submitBtn.textContent = 'Send Message';
            submitBtn.disabled = false;
            alert(data.message || 'Failed to send message. Please try again.');
        }
    })
    .catch(error => {
        submitBtn.textContent = 'Send Message';
        submitBtn.disabled = false;
        alert('An error occurred. Please try again.');
    });
});
</script>