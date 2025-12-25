"use strict";

// Main JavaScript file

// Import modules here if needed

// DOM Content Loaded
document.addEventListener('DOMContentLoaded', function () {
  console.log('Document is ready!');

  // Initialize your app here
  initApp();
});

// Initialize application
function initApp() {
  // Mobile menu toggle
  var mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
  var mobileMenu = document.querySelector('.mobile-menu');
  if (mobileMenuToggle && mobileMenu) {
    mobileMenuToggle.addEventListener('click', function () {
      mobileMenu.classList.toggle('active');
    });
  }

  // Smooth scroll for anchor links
  var anchorLinks = document.querySelectorAll('a[href^="#"]');
  anchorLinks.forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      var targetId = this.getAttribute('href');
      var targetElement = document.querySelector(targetId);
      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
}

// Utility functions
var utils = {
  // Debounce function
  debounce: function debounce(func, wait) {
    var timeout;
    return function executedFunction() {
      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }
      var later = function later() {
        clearTimeout(timeout);
        func.apply(void 0, args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  },
  // Throttle function
  throttle: function throttle(func, limit) {
    var inThrottle;
    return function () {
      var args = arguments;
      var context = this;
      if (!inThrottle) {
        func.apply(context, args);
        inThrottle = true;
        setTimeout(function () {
          return inThrottle = false;
        }, limit);
      }
    };
  }
};

// Export for use in other modules
if (typeof module !== 'undefined' && module.exports) {
  module.exports = {
    utils: utils
  };
}
//# sourceMappingURL=main.js.map
