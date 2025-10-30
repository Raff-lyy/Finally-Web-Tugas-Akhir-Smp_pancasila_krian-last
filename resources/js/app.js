import './bootstrap';
import '../css/app.css';

// Additional JavaScript functionality for SMP Pancasila Krian website

// Enhanced mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle with animation
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            const isOpen = !mobileMenu.classList.contains('hidden');
            
            if (isOpen) {
                // Close menu
                mobileMenu.style.maxHeight = '0px';
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            } else {
                // Open menu
                mobileMenu.classList.remove('hidden');
                mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
            }
        });
    }
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (mobileMenu && !mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.style.maxHeight = '0px';
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }
        }
    });
});

// Enhanced form validation
function validateForm(form) {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        const errorElement = field.parentNode.querySelector('.error-message');
        
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('border-red-500');
            
            if (!errorElement) {
                const error = document.createElement('div');
                error.className = 'error-message text-red-500 text-sm mt-1';
                error.textContent = 'Field ini wajib diisi';
                field.parentNode.appendChild(error);
            }
        } else {
            field.classList.remove('border-red-500');
            if (errorElement) {
                errorElement.remove();
            }
        }
    });
    
    return isValid;
}

// Email validation
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Phone validation (Indonesian format)
function validatePhone(phone) {
    const re = /^(\+62|62|0)8[1-9][0-9]{6,9}$/;
    return re.test(phone.replace(/\s/g, ''));
}

// Lazy loading for images
function initLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        images.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback for browsers without IntersectionObserver
        images.forEach(img => {
            img.src = img.dataset.src;
            img.classList.remove('lazy');
        });
    }
}

// Initialize lazy loading when DOM is ready
document.addEventListener('DOMContentLoaded', initLazyLoading);

// Accessibility improvements
document.addEventListener('DOMContentLoaded', function() {
    // Add focus indicators for keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
    });
    
    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });
    
    // Skip to main content link
    const skipLink = document.createElement('a');
    skipLink.href = '#main';
    skipLink.textContent = 'Skip to main content';
    skipLink.className = 'sr-only focus:not-sr-only focus:absolute focus:top-0 focus:left-0 bg-primary-600 text-white p-2 z-50';
    document.body.insertBefore(skipLink, document.body.firstChild);
});

// Performance monitoring
if ('performance' in window) {
    window.addEventListener('load', function() {
        setTimeout(() => {
            const perfData = performance.getEntriesByType('navigation')[0];
            console.log('Page load time:', perfData.loadEventEnd - perfData.loadEventStart, 'ms');
        }, 0);
    });
}

// Export functions for global use
window.validateForm = validateForm;
window.validateEmail = validateEmail;
window.validatePhone = validatePhone;

