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

  // Scroll To Top
  function scrollToTop() {
    const cc_scroll_top_button = document.querySelector(".cc-scroll-top-btn");
    if (cc_scroll_top_button) {
      cc_scroll_top_button.addEventListener("click", () => {
        window.scrollTo({
          top: 0,
          behavior: "smooth",
        });
      });
    }
  }

  // Accordion 
  function ccAccordion() {
    document.querySelectorAll('.accordion-head').forEach(function(head){
      head.addEventListener('click', function(){

          const item = this.closest('.accordion-item');

          document.querySelectorAll('.accordion-item').forEach(function(el){
              if(el !== item){
                  el.classList.remove('accordion-active');
              }
          });

          item.classList.toggle('accordion-active');
        });
    });
  }

  // Free Download PopUp start
  function freeDownloadPopUp() {
      const ccpFreeDownloadButtons = document.querySelectorAll(".ccp-free-download-btn");
      const popupSection = document.querySelector(".ccp-download-popup-section");
      const popupBox = document.querySelector(".ccp-download-popup");
      const closeButtons = document.querySelectorAll(".ccp-popup-close-btn");
      const ccpFreeDownloadLinkEl = document.getElementById("ccp-free-download-link-url");

      let lastFocusedElement = null;

      if (popupSection && ccpFreeDownloadButtons.length) {

          /* =========================
            OPEN POPUP
          ========================== */
          function openPopup(triggerBtn) {
              lastFocusedElement = triggerBtn;

              popupSection.classList.add("active");
              popupSection.setAttribute("aria-hidden", "false");

              // Move focus to first focusable element
              const focusable = popupBox.querySelector(
                  'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
              );
              focusable?.focus();

              document.addEventListener("keydown", handleKeydown);
          }

          /* =========================
            CLOSE POPUP
          ========================== */
          function closePopup() {
              popupSection.classList.remove("active");
              popupSection.setAttribute("aria-hidden", "true");

              document.removeEventListener("keydown", handleKeydown);

              // Restore focus
              lastFocusedElement?.focus();
          }

          /* =========================
            KEYBOARD HANDLING
          ========================== */
          function handleKeydown(e) {
              if (e.key === "Escape") {
                  closePopup();
              }

              // Focus trap
              if (e.key === "Tab") {
                  const focusableElements = popupBox.querySelectorAll(
                      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
                  );

                  const first = focusableElements[0];
                  const last = focusableElements[focusableElements.length - 1];

                  if (e.shiftKey && document.activeElement === first) {
                      e.preventDefault();
                      last.focus();
                  } else if (!e.shiftKey && document.activeElement === last) {
                      e.preventDefault();
                      first.focus();
                  }
              }
          }

          /* =========================
            BUTTON OPEN
          ========================== */
          ccpFreeDownloadButtons.forEach(btn => {
              btn.addEventListener("click", () => openPopup(btn));
          });

          /* =========================
            CLOSE BUTTONS
          ========================== */
          closeButtons.forEach(btn => {
              btn.addEventListener("click", closePopup);
          });

          /* =========================
            OUTSIDE CLICK CLOSE
          ========================== */
          popupSection.addEventListener("click", e => {
              if (!popupBox.contains(e.target)) {
                  closePopup();
              }
          });

          /* =========================
            CF7 SUCCESS → DOWNLOAD + CLOSE
          ========================== */
          document.addEventListener("wpcf7mailsent", function(event) {
              if (!event.target.closest('.free-downolad-form')) return;

              if (!ccpFreeDownloadLinkEl) return;

              const fileUrl = ccpFreeDownloadLinkEl.getAttribute("href");
              if (!fileUrl) return;

              const a = document.createElement("a");
              a.href = fileUrl;
              a.download = "";
              document.body.appendChild(a);
              a.click();
              document.body.removeChild(a);

              closePopup();
          });
      }
    }
    // Free Download PopUp JS end

  // Global On Load
  function codeConfigGlobalOnLoad() {
    updateHeaderHeights();
    ccpCommonHeader();
    scrollToTop();
    ccAccordion();
    freeDownloadPopUp();
  }
  window.addEventListener("DOMContentLoaded", codeConfigGlobalOnLoad);//# sourceMappingURL=main.js.map
