"use strict";

//Common Header For CodeConfig
function ccpCommonHeader() {
  var common_header = document.getElementById("cc-header");
  var hamburger_menu_open = document.querySelector(".ccp-mobile-menu-open");
  var hamburger_menu_close = document.querySelector(".ccp-mobile-menu-close");
  if (common_header && hamburger_menu_open) {
    var stickyFunction = function stickyFunction() {
      return setTimeout(function () {
        common_header.classList.remove("sticky-bar");
      }, 2000);
    }; // Add sticky behavior based on scroll
    // common_header.classList.add("sticky-bar", "sticky-hero");

    hamburger_menu_open.addEventListener("click", function () {
      common_header.classList.toggle("ccp-mobile-menu-active");
    });
    hamburger_menu_close === null || hamburger_menu_close === void 0 || hamburger_menu_close.addEventListener("click", function () {
      if (common_header.classList.contains("ccp-mobile-menu-active")) {
        common_header.classList.remove("ccp-mobile-menu-active");
      }
    });
    var lastScrollY = window.scrollY;
    var removeStickyTimeout;
    window.onscroll = function () {
      var currentScrollY = window.scrollY;
      if (window.pageYOffset > 1) {
        common_header.classList.add("sticky");
      } else {
        common_header.classList.remove("sticky");
      }
      if (currentScrollY < 500) {
        if (removeStickyTimeout) {
          clearTimeout(removeStickyTimeout);
        }
        common_header.classList.add("sticky-bar");
        common_header.classList.add("sticky-hero");
        return;
      }
      if (currentScrollY > lastScrollY) {
        clearTimeout(removeStickyTimeout);
        removeStickyTimeout = stickyFunction();
        common_header.classList.remove("sticky-hero");
      } else {
        clearTimeout(removeStickyTimeout);
        common_header.classList.add("sticky-bar");
      }
      lastScrollY = currentScrollY;
    };
    common_header.addEventListener("mouseover", function () {
      clearTimeout(removeStickyTimeout);
      common_header.classList.add("sticky-bar");
    });
    common_header.addEventListener("mouseout", function () {
      removeStickyTimeout = stickyFunction();
    });
  }
}

// Global On Load
function codeConfigGlobalOnLoad() {
  ccpCommonHeader();
}
window.addEventListener("DOMContentLoaded", codeConfigGlobalOnLoad);
//# sourceMappingURL=main.js.map
