//Common Header For CodeConfig

  function updateHeaderHeights() {
    const ccCommonHeader = document.querySelector("#cc-header");
    const ccAnnounceBar = document.querySelector("#countDownTimerSection");
    const ccAdminBar = document.querySelector("#wpadminbar");
    const headerHeight = ccCommonHeader?.clientHeight || 0;

    const announceBarHeight = ccAnnounceBar?.clientHeight || 0;
    const adminBarHeight = ccAdminBar?.clientHeight || 0;
    // const only_header_height = ccCommonHeader?.clientHeight || 0;

    const header_announce_admin_height =
      headerHeight + announceBarHeight + adminBarHeight;
    const admin_announce_height = adminBarHeight + announceBarHeight;
    const header_announce_height = headerHeight + announceBarHeight;

    document.body.style.setProperty(
      "--header-height",
      `${header_announce_admin_height}px`
    );
    document.body.style.setProperty(
      "--header-top-space",
      `${admin_announce_height}px`
    );
    document.body.style.setProperty(
      "--header-announce-height",
      `${header_announce_height}px`
    );

    document.body.style.setProperty(
      "--only-header-height",
      `${headerHeight}px`
    );
  }
  function ccpCommonHeader() {
    const common_header = document.getElementById("cc-header");
    const hamburger_menu_open = document.querySelector(".ccp-mobile-menu-open");
    const hamburger_menu_close = document.querySelector(
      ".ccp-mobile-menu-close"
    );

    if (common_header && hamburger_menu_open) {
      // common_header.classList.add("sticky-bar", "sticky-hero");

      hamburger_menu_open.addEventListener("click", function () {
        common_header.classList.toggle("ccp-mobile-menu-active");
      });
      hamburger_menu_close?.addEventListener("click", function () {
        if (common_header.classList.contains("ccp-mobile-menu-active")) {
          common_header.classList.remove("ccp-mobile-menu-active");
        }
      });

      let lastScrollY = window.scrollY;
      let removeStickyTimeout;

      function stickyFunction() {
        return setTimeout(function () {
          common_header.classList.remove("sticky-bar");
        }, 2000);
      }

      // Add sticky behavior based on scroll
      window.onscroll = function () {
        let currentScrollY = window.scrollY;

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
    updateHeaderHeights();
    ccpCommonHeader();
  }
  window.addEventListener("DOMContentLoaded", codeConfigGlobalOnLoad);//# sourceMappingURL=main.js.map
