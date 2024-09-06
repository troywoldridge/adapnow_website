import axios from 'axios';
window.axios = axios;

// Set the default headers for Axios requests
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Import Bootstrap CSS and JS
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';  // Includes Popper.js for dropdowns and tooltips

// Ensure Bootstrap JS is included for dropdown functionality
document.addEventListener('DOMContentLoaded', function() {
    var dropdownElements = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
    dropdownElements.forEach(function(dropdown) {
        new bootstrap.Dropdown(dropdown);
    });
});
