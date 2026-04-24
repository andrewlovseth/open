// Bundled JavaScript - Do not edit directly, edit src/js/ files instead
(() => {
  var __create = Object.create;
  var __getProtoOf = Object.getPrototypeOf;
  var __defProp = Object.defineProperty;
  var __getOwnPropNames = Object.getOwnPropertyNames;
  var __hasOwnProp = Object.prototype.hasOwnProperty;
  var __toESM = (mod, isNodeMode, target) => {
    target = mod != null ? __create(__getProtoOf(mod)) : {};
    const to = isNodeMode || !mod || !mod.__esModule ? __defProp(target, "default", { value: mod, enumerable: true }) : target;
    for (let key of __getOwnPropNames(mod))
      if (!__hasOwnProp.call(to, key))
        __defProp(to, key, {
          get: () => mod[key],
          enumerable: true
        });
    return to;
  };
  var __require = /* @__PURE__ */ ((x) => typeof require !== "undefined" ? require : typeof Proxy !== "undefined" ? new Proxy(x, {
    get: (a, b) => (typeof require !== "undefined" ? require : a)[b]
  }) : x)(function(x) {
    if (typeof require !== "undefined")
      return require.apply(this, arguments);
    throw Error('Dynamic require of "' + x + '" is not supported');
  });

  // src/js/header.js
  var nav = document.querySelector(".site-navigation");
  var linkList = document.querySelector(".site-navigation .link-list");
  var linkGroup = linkList.querySelector("ul");
  var mobileNav = document.querySelector(".mobile-nav");
  function transitionOut() {
    nav.classList.add("slide-out");
    linkList.classList.add("slide-out");
    linkGroup.classList.remove("show");
    mobileNav.classList.remove("open");
    setTimeout(function() {
      nav.classList.remove("slide-out", "slide-in");
      linkList.classList.remove("slide-out", "slide-in");
    }, 1200);
    setTimeout(function() {
      document.body.classList.remove("nav-overlay-open");
      const initialTab = document.querySelector('[data-tab-panel="initial"]');
      const tabClone = initialTab.cloneNode(true);
      const activeTab = document.querySelector(".site-navigation .nav-content .tab-panel");
      activeTab.replaceWith(tabClone);
    }, 1225);
  }
  var Header = {
    esc() {
      document.addEventListener("keyup", (e) => {
        if (e.key == "Escape") {
          transitionOut();
        }
      });
    },
    searchToggle() {
      const searchToggle = document.querySelector(".js-search-toggle");
      const searchClose = document.querySelector(".js-search-close");
      const searchContainer = document.querySelector(".search-container");
      const searchModal = document.querySelector(".search-modal");
      searchToggle.addEventListener("click", (e) => {
        searchContainer.classList.toggle("show");
        e.preventDefault();
      });
      searchClose.addEventListener("click", (e) => {
        searchContainer.classList.remove("show");
        e.preventDefault();
      });
      document.addEventListener("keyup", (e) => {
        if (e.key == "Escape") {
          searchContainer.classList.remove("show");
        }
      });
      document.addEventListener("click", (e) => {
        if (e.target.closest(".search-modal") || e.target.closest(".js-search-toggle"))
          return;
        searchContainer.classList.remove("show");
      });
    },
    mobileSearchToggle() {
      const searchToggle = document.querySelector(".mobile-nav .js-search-toggle");
      const searchClose = document.querySelector(".mobile-nav .js-search-close");
      const searchContainer = document.querySelector(".mobile-nav .search-container");
      const searchModal = document.querySelector(".mobile-nav .search-modal");
      searchToggle.addEventListener("click", (e) => {
        searchContainer.classList.toggle("show");
        e.preventDefault();
      });
      searchClose.addEventListener("click", (e) => {
        searchContainer.classList.remove("show");
        e.preventDefault();
      });
      document.addEventListener("keyup", (e) => {
        if (e.key == "Escape") {
          searchContainer.classList.remove("show");
        }
      });
      document.addEventListener("click", (e) => {
        if (e.target.closest(".mobile-nav .search-modal") || e.target.closest(".mobile-nav .js-search-toggle"))
          return;
        searchContainer.classList.remove("show");
      });
    },
    desktopSubNavs() {
      const desktopSubNavs = document.querySelectorAll('[data-subnav="true"]');
      desktopSubNavs.forEach((desktopSubNav) => {
        const hoverLink = desktopSubNav.querySelector(".desktop-nav__link");
        desktopSubNav.addEventListener("mouseover", function() {
          this.setAttribute("data-state", "active");
          hoverLink.setAttribute("data-state", "active");
        });
        desktopSubNav.addEventListener("mouseout", function() {
          this.setAttribute("data-state", "inactive");
          hoverLink.setAttribute("data-state", "inactive");
        });
        hoverLink.addEventListener("click", (e) => {
          e.preventDefault();
        });
      });
    },
    navTabs() {
      const tabLinks = document.querySelectorAll(".site-navigation a.type-tab");
      tabLinks.forEach((tabLink) => {
        tabLink.addEventListener("click", (e) => {
          e.preventDefault();
          tabLinks.forEach((tabAnchor) => {
            tabAnchor.classList.remove("active");
          });
          tabLink.classList.add("active");
          const tabTarget = tabLink.dataset.tab;
          const tab = document.querySelector(`[data-tab-panel="${tabTarget}"]`);
          const tabClone = tab.cloneNode(true);
          const activeTab = document.querySelector(".site-navigation .nav-content .tab-panel");
          activeTab.replaceWith(tabClone);
        });
      });
      const mutationObserver = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
          if (mutation.type === "childList") {
            const activeTab = document.querySelector(".site-navigation .nav-content .tab-panel");
            setTimeout(() => {
              activeTab.classList.add("show");
            }, 200);
          }
        });
      });
      const navContent = document.querySelector(".site-navigation .nav-content");
      mutationObserver.observe(navContent, {
        childList: true
      });
    },
    mobileNavSectionToggle() {
      const mobileToggleLinks = document.querySelectorAll(".mobile-nav .js-mobile-nav-toggle");
      mobileToggleLinks.forEach((toggleLink) => {
        toggleLink.addEventListener("click", (e) => {
          const targetSectionID = toggleLink.dataset.sectionId;
          const targetSection = document.querySelector(`.mobile-nav-body[data-section="${targetSectionID}"]`);
          targetSection.classList.toggle("active");
          toggleLink.classList.toggle("active");
          e.preventDefault();
        });
      });
    },
    mobileNavToggle() {
      const mobileCloseToggle = document.querySelector(".js-mobile-nav-trigger");
      mobileCloseToggle.addEventListener("click", (e) => {
        mobileNav.classList.toggle("open");
        e.preventDefault();
      });
    },
    mobileNavClose() {
      const mobileCloseBtn = document.querySelector(".js-mobile-nav-close");
      mobileCloseBtn.addEventListener("click", (e) => {
        mobileNav.classList.remove("open");
        e.preventDefault();
      });
    },
    bannerOffset() {
      const banner = document.querySelector("aside.banner");
      if (!banner)
        return;
      function update() {
        const h = banner.offsetHeight;
        document.documentElement.style.setProperty("--banner-height", h + "px");
      }
      update();
      window.addEventListener("resize", update);
    },
    init: function() {
      this.bannerOffset();
      this.esc();
      this.desktopSubNavs();
      this.searchToggle();
      this.mobileSearchToggle();
      this.navTabs();
      this.mobileNavToggle();
      this.mobileNavSectionToggle();
      this.mobileNavClose();
    }
  };
  var header_default = Header;

  // src/js/animations.js
  var Animations = {
    fadeIn() {},
    init: function() {
      this.fadeIn();
    }
  };
  var animations_default = Animations;

  // src/js/utilities.js
  var Utilities = {
    print() {
      const printLinks = document.querySelectorAll(".js-print-link");
      printLinks.forEach((printLink) => {
        printLink.addEventListener("click", (e) => {
          window.print();
          e.preventDefault();
        });
      });
    },
    init: function() {
      this.print();
    }
  };
  var utilities_default = Utilities;

  // src/js/content.js
  var Content = {
    toggleResourcesSidebar() {
      const toggleLink = document.querySelector(".js-resources-sidebar-toggle");
      if (toggleLink) {
        const sidebar = document.querySelector(".resources-sidebar-nav");
        const showText = toggleLink.dataset.show;
        const hideText = toggleLink.dataset.hide;
        toggleLink.addEventListener("click", (e) => {
          sidebar.classList.toggle("show");
          const isShown = sidebar.classList.contains("show");
          if (isShown) {
            toggleLink.textContent = hideText;
          } else {
            toggleLink.textContent = showText;
          }
          e.preventDefault();
        });
      }
    },
    partnersFilter() {
      const partnerFilterLinks = document.querySelectorAll(".js-partner-filter-link");
      const partners = document.querySelectorAll(".partners-grid .partner");
      partnerFilterLinks.forEach((filterLink) => {
        filterLink.addEventListener("click", (e) => {
          partnerFilterLinks.forEach((otherLink) => {
            otherLink.classList.remove("active");
          });
          filterLink.classList.add("active");
          const filter = filterLink.dataset.filter;
          console.log(filter);
          partners.forEach((partner) => {
            const isActive = partner.classList.contains(filter);
            if (filter !== "all") {
              if (isActive) {
                partner.style.display = "block";
              } else {
                partner.style.display = "none";
              }
            } else {
              partner.style.display = "block";
            }
          });
          e.preventDefault();
        });
      });
    },
    leaderBios() {
      const bioTriggers = document.querySelectorAll(".leader__bio-trigger");
      bioTriggers.forEach((trigger) => {
        const leader = trigger.closest(".leader");
        const dialog = leader.querySelector(".leader__bio");
        const closeButton = dialog.querySelector(".leader__bio-close");
        trigger.addEventListener("click", () => {
          dialog.showModal();
        });
        closeButton.addEventListener("click", () => {
          dialog.close();
        });
        dialog.addEventListener("click", (e) => {
          const dialogDimensions = dialog.getBoundingClientRect();
          if (e.clientX < dialogDimensions.left || e.clientX > dialogDimensions.right || e.clientY < dialogDimensions.top || e.clientY > dialogDimensions.bottom) {
            dialog.close();
          }
        });
      });
    },
    futureFeaturesToggle() {
      const featureItems = document.querySelectorAll(".future-features__item");
      featureItems.forEach((item) => {
        const headline = item.querySelector(".future-features__headline");
        const copy = item.querySelector(".future-features__copy");
        const icon = headline.querySelector(".icon svg");
        if (headline && copy) {
          headline.addEventListener("click", () => {
            const isHidden = copy.style.display === "none" || copy.style.display === "";
            if (isHidden) {
              copy.style.display = "block";
              if (icon) {
                icon.style.transform = "rotate(180deg)";
              }
            } else {
              copy.style.display = "none";
              if (icon) {
                icon.style.transform = "rotate(0deg)";
              }
            }
          });
        }
      });
    },
    init: function() {
      this.toggleResourcesSidebar();
      this.partnersFilter();
      this.leaderBios();
      this.futureFeaturesToggle();
    }
  };
  var content_default = Content;

  // src/js/modals.js
  var Swiper = null;
  var swiperLoading = false;
  async function loadSwiper() {
    if (Swiper)
      return Swiper;
    if (swiperLoading) {
      while (swiperLoading) {
        await new Promise((resolve) => setTimeout(resolve, 10));
      }
      return Swiper;
    }
    swiperLoading = true;
    try {
      const module = await import("https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js");
      Swiper = module.default;
      return Swiper;
    } finally {
      swiperLoading = false;
    }
  }
  var Modal = {
    modals: function() {
      MicroModal.init({
        onClose: () => {
          const videoPlayers = document.querySelectorAll(".modal__content .video-player");
          videoPlayers.forEach((player) => {
            const iframe = player.querySelector("iframe");
            iframe.setAttribute("src", "");
          });
        },
        awaitOpenAnimation: true
      });
    },
    videoModal: function() {
      const videoLinks = document.querySelectorAll(".js-video-modal");
      videoLinks.forEach((link) => {
        const modalTarget = link.dataset.micromodalTrigger;
        const modal = document.getElementById(modalTarget);
        const videoPlayer = modal.querySelector(".video-player");
        const iframe = videoPlayer.querySelector("iframe");
        const autoplayUrl = videoPlayer.dataset.autoplayUrl;
        link.addEventListener("click", (e) => {
          iframe.setAttribute("src", autoplayUrl);
          e.preventDefault();
        });
      });
    },
    acPlusModal: function() {
      const acPlusLinks = document.querySelectorAll(".js-ac-plus-modal");
      acPlusLinks.forEach((link) => {
        link.addEventListener("click", async (e) => {
          e.preventDefault();
          const slideIndex = link.dataset.slideIndex;
          console.log(slideIndex);
          const SwiperClass = await loadSwiper();
          const acPlusSwiper = new SwiperClass(".swiper", {
            autoplay: false,
            speed: 600,
            spaceBetween: 0,
            initialSlide: parseFloat(slideIndex),
            grabCursor: true,
            loop: true,
            navigation: false,
            pagination: {
              el: ".swiper-pagination",
              type: "bullets",
              clickable: true
            }
          });
        });
      });
    },
    leadershipModal: function() {
      const leadershipLinks = document.querySelectorAll(".js-leader-modal");
      leadershipLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
          e.preventDefault();
        });
      });
    },
    formModals: function() {
      const formLinks = document.querySelectorAll(".js-form-trigger");
      formLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
          e.preventDefault();
        });
      });
    },
    nabModal: function() {
      const modal = document.querySelector("#nab");
      if (!modal) {
        return;
      }
      const currentPath = window.location.pathname;
      if (currentPath.includes("/solutions/corporate-creative/")) {
        return;
      }
      const showModalAtlasCCPostNab = localStorage.getItem("showModalAtlasCCPostNab");
      if (sessionStorage.atlas_cc_post_nab_pageCount) {
        sessionStorage.atlas_cc_post_nab_pageCount = Number(sessionStorage.atlas_cc_post_nab_pageCount) + 1;
      } else {
        sessionStorage.atlas_cc_post_nab_pageCount = 1;
      }
      if (sessionStorage.atlas_cc_post_nab_pageCount == 1) {
        if (showModalAtlasCCPostNab == null) {
          localStorage.setItem("showModalAtlasCCPostNab", 1);
          MicroModal.show("nab");
        } else if (showModalAtlasCCPostNab >= 1 && showModalAtlasCCPostNab <= 5) {
          var visit_count = parseInt(localStorage.getItem("showModalAtlasCCPostNab"));
          visit_count++;
          localStorage.setItem("showModalAtlasCCPostNab", visit_count);
          MicroModal.show("nab");
        } else {
          var visit_count = parseInt(localStorage.getItem("showModalAtlasCCPostNab"));
          visit_count++;
          localStorage.setItem("showModalAtlasCCPostNab", visit_count);
        }
      }
    },
    homeHeroSwiper: async function() {
      const heroSwiperElement = document.querySelector(".hero-swiper");
      if (!heroSwiperElement) {
        return;
      }
      const SwiperClass = await loadSwiper();
      await new Promise((resolve) => setTimeout(resolve, 100));
      const heroSwiper = new SwiperClass(".hero-swiper", {
        autoplay: {
          delay: 4000,
          disableOnInteraction: false
        },
        speed: 600,
        effect: "fade",
        fadeEffect: {
          crossFade: true
        },
        spaceBetween: 0,
        grabCursor: true,
        loop: true,
        navigation: false,
        pagination: {
          el: ".swiper-pagination",
          type: "bullets",
          clickable: true
        },
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        preloadImages: false,
        lazy: {
          loadPrevNext: true
        },
        on: {
          init: function() {
            heroSwiperElement.classList.add("swiper-initialized");
          }
        }
      });
    },
    homeValuesSwiper: async function() {
      const valuesSwiperElement = document.querySelector(".values-swiper");
      if (!valuesSwiperElement) {
        return;
      }
      const SwiperClass = await loadSwiper();
      await new Promise((resolve) => setTimeout(resolve, 100));
      const valuesSwiper = new SwiperClass(".values-swiper", {
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true
        },
        speed: 600,
        slidesPerView: 1,
        spaceBetween: 24,
        grabCursor: true,
        loop: true,
        navigation: {
          nextEl: ".values-swiper .swiper-button-next",
          prevEl: ".values-swiper .swiper-button-prev"
        },
        breakpoints: {
          768: {
            slidesPerView: 2,
            spaceBetween: 24
          },
          992: {
            slidesPerView: 3,
            spaceBetween: 24
          },
          1600: {
            slidesPerView: 4,
            spaceBetween: 24
          },
          1920: {
            slidesPerView: 5,
            spaceBetween: 24
          }
        },
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        preloadImages: false,
        lazy: {
          loadPrevNext: true
        },
        on: {
          init: function() {
            valuesSwiperElement.classList.add("swiper-initialized");
          },
          slideChange: function() {}
        }
      });
    },
    init: function() {
      this.modals();
      this.videoModal();
      this.acPlusModal();
      this.leadershipModal();
      this.formModals();
      this.nabModal();
      this.homeHeroSwiper();
      this.homeValuesSwiper();
    }
  };
  var modals_default = Modal;

  // src/js/pricing.js
  var Pricing = {
    heroPadding() {
      const hero = document.querySelector(".page-template-pricing .hero");
      const features = document.querySelector(".page-template-pricing .features");
      const overview = document.querySelector(".page-template-pricing .overview__grid");
      if (hero && features && overview) {
        const adjustPadding = () => {
          if (window.innerWidth > 992) {
            const overviewHeight = overview.offsetHeight;
            const halfOverviewHeight = overviewHeight / 2;
            const paddingValue = `${halfOverviewHeight}px`;
            hero.style.paddingBottom = paddingValue;
            features.style.marginTop = `-${halfOverviewHeight}px`;
          } else {
            hero.style.paddingBottom = "";
            features.style.marginTop = "";
          }
        };
        document.body.style.visibility = "hidden";
        adjustPadding();
        window.addEventListener("load", () => {
          document.body.style.visibility = "visible";
          hero.style.transition = "padding-bottom 0.3s ease-in-out";
          features.style.transition = "margin-top 0.3s ease-in-out";
        });
        let resizeTimer;
        window.addEventListener("resize", () => {
          clearTimeout(resizeTimer);
          resizeTimer = setTimeout(adjustPadding, 250);
        });
      }
    },
    toggleFeatureExpansion() {
      const featureNames = document.querySelectorAll(".page-template-pricing .features__table-td.name");
      if (featureNames) {
        featureNames.forEach((featureName) => {
          featureName.addEventListener("click", function() {
            if (window.innerWidth >= 768) {
              this.classList.toggle("expanded");
            }
          });
        });
      }
    },
    init: function() {
      this.toggleFeatureExpansion();
    }
  };
  var pricing_default = Pricing;

  // src/js/main.js
  (() => {
    header_default.init();
    animations_default.init();
    utilities_default.init();
    modals_default.init();
    content_default.init();
    pricing_default.init();
  })();
})();

//# debugId=8E6ADC769A94A0B964756E2164756E21
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsiLi4vc3JjL2pzL2hlYWRlci5qcyIsICIuLi9zcmMvanMvYW5pbWF0aW9ucy5qcyIsICIuLi9zcmMvanMvdXRpbGl0aWVzLmpzIiwgIi4uL3NyYy9qcy9jb250ZW50LmpzIiwgIi4uL3NyYy9qcy9tb2RhbHMuanMiLCAiLi4vc3JjL2pzL3ByaWNpbmcuanMiLCAiLi4vc3JjL2pzL21haW4uanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbCiAgICAiY29uc3QgbmF2ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5zaXRlLW5hdmlnYXRpb25cIik7XG5jb25zdCBsaW5rTGlzdCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuc2l0ZS1uYXZpZ2F0aW9uIC5saW5rLWxpc3RcIik7XG5jb25zdCBsaW5rR3JvdXAgPSBsaW5rTGlzdC5xdWVyeVNlbGVjdG9yKFwidWxcIik7XG5jb25zdCBtb2JpbGVOYXYgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLm1vYmlsZS1uYXZcIik7XG5cbmZ1bmN0aW9uIHRyYW5zaXRpb25JbigpIHtcbiAgICBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5hZGQoXCJuYXYtb3ZlcmxheS1vcGVuXCIpO1xuXG4gICAgc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgIG5hdi5jbGFzc0xpc3QuYWRkKFwic2xpZGUtaW5cIik7XG4gICAgICAgIGxpbmtMaXN0LmNsYXNzTGlzdC5hZGQoXCJzbGlkZS1pblwiKTtcbiAgICB9LCAxKTtcblxuICAgIHNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICBsaW5rR3JvdXAuY2xhc3NMaXN0LmFkZChcInNob3dcIik7XG4gICAgfSwgMTIwMCk7XG59XG5cbmZ1bmN0aW9uIHRyYW5zaXRpb25PdXQoKSB7XG4gICAgbmF2LmNsYXNzTGlzdC5hZGQoXCJzbGlkZS1vdXRcIik7XG4gICAgbGlua0xpc3QuY2xhc3NMaXN0LmFkZChcInNsaWRlLW91dFwiKTtcbiAgICBsaW5rR3JvdXAuY2xhc3NMaXN0LnJlbW92ZShcInNob3dcIik7XG4gICAgbW9iaWxlTmF2LmNsYXNzTGlzdC5yZW1vdmUoXCJvcGVuXCIpO1xuXG4gICAgc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgIG5hdi5jbGFzc0xpc3QucmVtb3ZlKFwic2xpZGUtb3V0XCIsIFwic2xpZGUtaW5cIik7XG4gICAgICAgIGxpbmtMaXN0LmNsYXNzTGlzdC5yZW1vdmUoXCJzbGlkZS1vdXRcIiwgXCJzbGlkZS1pblwiKTtcbiAgICB9LCAxMjAwKTtcblxuICAgIHNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5yZW1vdmUoXCJuYXYtb3ZlcmxheS1vcGVuXCIpO1xuXG4gICAgICAgIGNvbnN0IGluaXRpYWxUYWIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS10YWItcGFuZWw9XCJpbml0aWFsXCJdJyk7XG4gICAgICAgIGNvbnN0IHRhYkNsb25lID0gaW5pdGlhbFRhYi5jbG9uZU5vZGUodHJ1ZSk7XG4gICAgICAgIGNvbnN0IGFjdGl2ZVRhYiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuc2l0ZS1uYXZpZ2F0aW9uIC5uYXYtY29udGVudCAudGFiLXBhbmVsXCIpO1xuXG4gICAgICAgIGFjdGl2ZVRhYi5yZXBsYWNlV2l0aCh0YWJDbG9uZSk7XG4gICAgfSwgMTIyNSk7XG59XG5cbmNvbnN0IEhlYWRlciA9IHtcbiAgICBlc2MoKSB7XG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJrZXl1cFwiLCAoZSkgPT4ge1xuICAgICAgICAgICAgaWYgKGUua2V5ID09IFwiRXNjYXBlXCIpIHtcbiAgICAgICAgICAgICAgICB0cmFuc2l0aW9uT3V0KCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBzZWFyY2hUb2dnbGUoKSB7XG4gICAgICAgIGNvbnN0IHNlYXJjaFRvZ2dsZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuanMtc2VhcmNoLXRvZ2dsZVwiKTtcbiAgICAgICAgY29uc3Qgc2VhcmNoQ2xvc2UgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLmpzLXNlYXJjaC1jbG9zZVwiKTtcbiAgICAgICAgY29uc3Qgc2VhcmNoQ29udGFpbmVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5zZWFyY2gtY29udGFpbmVyXCIpO1xuICAgICAgICBjb25zdCBzZWFyY2hNb2RhbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuc2VhcmNoLW1vZGFsXCIpO1xuXG4gICAgICAgIHNlYXJjaFRvZ2dsZS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcbiAgICAgICAgICAgIHNlYXJjaENvbnRhaW5lci5jbGFzc0xpc3QudG9nZ2xlKFwic2hvd1wiKTtcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgc2VhcmNoQ2xvc2UuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XG4gICAgICAgICAgICBzZWFyY2hDb250YWluZXIuY2xhc3NMaXN0LnJlbW92ZShcInNob3dcIik7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIH0pO1xuXG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJrZXl1cFwiLCAoZSkgPT4ge1xuICAgICAgICAgICAgaWYgKGUua2V5ID09IFwiRXNjYXBlXCIpIHtcbiAgICAgICAgICAgICAgICBzZWFyY2hDb250YWluZXIuY2xhc3NMaXN0LnJlbW92ZShcInNob3dcIik7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuXG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgaWYgKGUudGFyZ2V0LmNsb3Nlc3QoXCIuc2VhcmNoLW1vZGFsXCIpIHx8IGUudGFyZ2V0LmNsb3Nlc3QoXCIuanMtc2VhcmNoLXRvZ2dsZVwiKSkgcmV0dXJuO1xuICAgICAgICAgICAgc2VhcmNoQ29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoXCJzaG93XCIpO1xuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgbW9iaWxlU2VhcmNoVG9nZ2xlKCkge1xuICAgICAgICBjb25zdCBzZWFyY2hUb2dnbGUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLm1vYmlsZS1uYXYgLmpzLXNlYXJjaC10b2dnbGVcIik7XG4gICAgICAgIGNvbnN0IHNlYXJjaENsb3NlID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5tb2JpbGUtbmF2IC5qcy1zZWFyY2gtY2xvc2VcIik7XG4gICAgICAgIGNvbnN0IHNlYXJjaENvbnRhaW5lciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIubW9iaWxlLW5hdiAuc2VhcmNoLWNvbnRhaW5lclwiKTtcbiAgICAgICAgY29uc3Qgc2VhcmNoTW9kYWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLm1vYmlsZS1uYXYgLnNlYXJjaC1tb2RhbFwiKTtcblxuICAgICAgICBzZWFyY2hUb2dnbGUuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XG4gICAgICAgICAgICBzZWFyY2hDb250YWluZXIuY2xhc3NMaXN0LnRvZ2dsZShcInNob3dcIik7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIH0pO1xuXG4gICAgICAgIHNlYXJjaENsb3NlLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgc2VhcmNoQ29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoXCJzaG93XCIpO1xuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICB9KTtcblxuICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwia2V5dXBcIiwgKGUpID0+IHtcbiAgICAgICAgICAgIGlmIChlLmtleSA9PSBcIkVzY2FwZVwiKSB7XG4gICAgICAgICAgICAgICAgc2VhcmNoQ29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoXCJzaG93XCIpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcblxuICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcbiAgICAgICAgICAgIGlmIChlLnRhcmdldC5jbG9zZXN0KFwiLm1vYmlsZS1uYXYgLnNlYXJjaC1tb2RhbFwiKSB8fCBlLnRhcmdldC5jbG9zZXN0KFwiLm1vYmlsZS1uYXYgLmpzLXNlYXJjaC10b2dnbGVcIikpXG4gICAgICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgICAgc2VhcmNoQ29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoXCJzaG93XCIpO1xuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgZGVza3RvcFN1Yk5hdnMoKSB7XG4gICAgICAgIGNvbnN0IGRlc2t0b3BTdWJOYXZzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnW2RhdGEtc3VibmF2PVwidHJ1ZVwiXScpO1xuICAgICAgICBkZXNrdG9wU3ViTmF2cy5mb3JFYWNoKChkZXNrdG9wU3ViTmF2KSA9PiB7XG4gICAgICAgICAgICBjb25zdCBob3ZlckxpbmsgPSBkZXNrdG9wU3ViTmF2LnF1ZXJ5U2VsZWN0b3IoXCIuZGVza3RvcC1uYXZfX2xpbmtcIik7XG5cbiAgICAgICAgICAgIGRlc2t0b3BTdWJOYXYuYWRkRXZlbnRMaXN0ZW5lcihcIm1vdXNlb3ZlclwiLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgdGhpcy5zZXRBdHRyaWJ1dGUoXCJkYXRhLXN0YXRlXCIsIFwiYWN0aXZlXCIpO1xuICAgICAgICAgICAgICAgIGhvdmVyTGluay5zZXRBdHRyaWJ1dGUoXCJkYXRhLXN0YXRlXCIsIFwiYWN0aXZlXCIpO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgIGRlc2t0b3BTdWJOYXYuYWRkRXZlbnRMaXN0ZW5lcihcIm1vdXNlb3V0XCIsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICB0aGlzLnNldEF0dHJpYnV0ZShcImRhdGEtc3RhdGVcIiwgXCJpbmFjdGl2ZVwiKTtcbiAgICAgICAgICAgICAgICBob3Zlckxpbmsuc2V0QXR0cmlidXRlKFwiZGF0YS1zdGF0ZVwiLCBcImluYWN0aXZlXCIpO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgIGhvdmVyTGluay5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG4gICAgfSxcblxuICAgIG5hdlRhYnMoKSB7XG4gICAgICAgIGNvbnN0IHRhYkxpbmtzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5zaXRlLW5hdmlnYXRpb24gYS50eXBlLXRhYlwiKTtcblxuICAgICAgICB0YWJMaW5rcy5mb3JFYWNoKCh0YWJMaW5rKSA9PiB7XG4gICAgICAgICAgICB0YWJMaW5rLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICAgICAgICAgIHRhYkxpbmtzLmZvckVhY2goKHRhYkFuY2hvcikgPT4ge1xuICAgICAgICAgICAgICAgICAgICB0YWJBbmNob3IuY2xhc3NMaXN0LnJlbW92ZShcImFjdGl2ZVwiKTtcbiAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgIHRhYkxpbmsuY2xhc3NMaXN0LmFkZChcImFjdGl2ZVwiKTtcblxuICAgICAgICAgICAgICAgIGNvbnN0IHRhYlRhcmdldCA9IHRhYkxpbmsuZGF0YXNldC50YWI7XG4gICAgICAgICAgICAgICAgY29uc3QgdGFiID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihgW2RhdGEtdGFiLXBhbmVsPVwiJHt0YWJUYXJnZXR9XCJdYCk7XG4gICAgICAgICAgICAgICAgY29uc3QgdGFiQ2xvbmUgPSB0YWIuY2xvbmVOb2RlKHRydWUpO1xuICAgICAgICAgICAgICAgIGNvbnN0IGFjdGl2ZVRhYiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuc2l0ZS1uYXZpZ2F0aW9uIC5uYXYtY29udGVudCAudGFiLXBhbmVsXCIpO1xuXG4gICAgICAgICAgICAgICAgYWN0aXZlVGFiLnJlcGxhY2VXaXRoKHRhYkNsb25lKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcblxuICAgICAgICBjb25zdCBtdXRhdGlvbk9ic2VydmVyID0gbmV3IE11dGF0aW9uT2JzZXJ2ZXIoKG11dGF0aW9ucykgPT4ge1xuICAgICAgICAgICAgbXV0YXRpb25zLmZvckVhY2goKG11dGF0aW9uKSA9PiB7XG4gICAgICAgICAgICAgICAgaWYgKG11dGF0aW9uLnR5cGUgPT09IFwiY2hpbGRMaXN0XCIpIHtcbiAgICAgICAgICAgICAgICAgICAgY29uc3QgYWN0aXZlVGFiID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5zaXRlLW5hdmlnYXRpb24gLm5hdi1jb250ZW50IC50YWItcGFuZWxcIik7XG4gICAgICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoKCkgPT4ge1xuICAgICAgICAgICAgICAgICAgICAgICAgYWN0aXZlVGFiLmNsYXNzTGlzdC5hZGQoXCJzaG93XCIpO1xuICAgICAgICAgICAgICAgICAgICB9LCAyMDApO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcblxuICAgICAgICBjb25zdCBuYXZDb250ZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5zaXRlLW5hdmlnYXRpb24gLm5hdi1jb250ZW50XCIpO1xuXG4gICAgICAgIG11dGF0aW9uT2JzZXJ2ZXIub2JzZXJ2ZShuYXZDb250ZW50LCB7XG4gICAgICAgICAgICBjaGlsZExpc3Q6IHRydWUsXG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBtb2JpbGVOYXZTZWN0aW9uVG9nZ2xlKCkge1xuICAgICAgICBjb25zdCBtb2JpbGVUb2dnbGVMaW5rcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIubW9iaWxlLW5hdiAuanMtbW9iaWxlLW5hdi10b2dnbGVcIik7XG5cbiAgICAgICAgbW9iaWxlVG9nZ2xlTGlua3MuZm9yRWFjaCgodG9nZ2xlTGluaykgPT4ge1xuICAgICAgICAgICAgdG9nZ2xlTGluay5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcbiAgICAgICAgICAgICAgICBjb25zdCB0YXJnZXRTZWN0aW9uSUQgPSB0b2dnbGVMaW5rLmRhdGFzZXQuc2VjdGlvbklkO1xuICAgICAgICAgICAgICAgIGNvbnN0IHRhcmdldFNlY3Rpb24gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKGAubW9iaWxlLW5hdi1ib2R5W2RhdGEtc2VjdGlvbj1cIiR7dGFyZ2V0U2VjdGlvbklEfVwiXWApO1xuXG4gICAgICAgICAgICAgICAgdGFyZ2V0U2VjdGlvbi5jbGFzc0xpc3QudG9nZ2xlKFwiYWN0aXZlXCIpO1xuICAgICAgICAgICAgICAgIHRvZ2dsZUxpbmsuY2xhc3NMaXN0LnRvZ2dsZShcImFjdGl2ZVwiKTtcblxuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgbW9iaWxlTmF2VG9nZ2xlKCkge1xuICAgICAgICBjb25zdCBtb2JpbGVDbG9zZVRvZ2dsZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuanMtbW9iaWxlLW5hdi10cmlnZ2VyXCIpO1xuXG4gICAgICAgIG1vYmlsZUNsb3NlVG9nZ2xlLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgbW9iaWxlTmF2LmNsYXNzTGlzdC50b2dnbGUoXCJvcGVuXCIpO1xuXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBtb2JpbGVOYXZDbG9zZSgpIHtcbiAgICAgICAgY29uc3QgbW9iaWxlQ2xvc2VCdG4gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLmpzLW1vYmlsZS1uYXYtY2xvc2VcIik7XG5cbiAgICAgICAgbW9iaWxlQ2xvc2VCdG4uYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XG4gICAgICAgICAgICBtb2JpbGVOYXYuY2xhc3NMaXN0LnJlbW92ZShcIm9wZW5cIik7XG5cbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgfSk7XG4gICAgfSxcblxuICAgIGJhbm5lck9mZnNldCgpIHtcbiAgICAgICAgY29uc3QgYmFubmVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcImFzaWRlLmJhbm5lclwiKTtcbiAgICAgICAgaWYgKCFiYW5uZXIpIHJldHVybjtcblxuICAgICAgICBmdW5jdGlvbiB1cGRhdGUoKSB7XG4gICAgICAgICAgICBjb25zdCBoID0gYmFubmVyLm9mZnNldEhlaWdodDtcbiAgICAgICAgICAgIGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5zdHlsZS5zZXRQcm9wZXJ0eShcIi0tYmFubmVyLWhlaWdodFwiLCBoICsgXCJweFwiKTtcbiAgICAgICAgfVxuXG4gICAgICAgIHVwZGF0ZSgpO1xuICAgICAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcihcInJlc2l6ZVwiLCB1cGRhdGUpO1xuICAgIH0sXG5cbiAgICBpbml0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMuYmFubmVyT2Zmc2V0KCk7XG4gICAgICAgIHRoaXMuZXNjKCk7XG4gICAgICAgIHRoaXMuZGVza3RvcFN1Yk5hdnMoKTtcbiAgICAgICAgdGhpcy5zZWFyY2hUb2dnbGUoKTtcbiAgICAgICAgdGhpcy5tb2JpbGVTZWFyY2hUb2dnbGUoKTtcbiAgICAgICAgdGhpcy5uYXZUYWJzKCk7XG4gICAgICAgIHRoaXMubW9iaWxlTmF2VG9nZ2xlKCk7XG4gICAgICAgIHRoaXMubW9iaWxlTmF2U2VjdGlvblRvZ2dsZSgpO1xuICAgICAgICB0aGlzLm1vYmlsZU5hdkNsb3NlKCk7XG4gICAgfSxcbn07XG5cbmV4cG9ydCBkZWZhdWx0IEhlYWRlcjtcbiIsCiAgICAiY29uc3QgQW5pbWF0aW9ucyA9IHtcbiAgICBmYWRlSW4oKSB7XG5cblxuXG4gICAgfSxcbiAgICBpbml0OiBmdW5jdGlvbigpIHtcbiAgICAgICAgdGhpcy5mYWRlSW4oKTtcbiAgICB9LFxufTtcblxuZXhwb3J0IGRlZmF1bHQgQW5pbWF0aW9uczsiLAogICAgImNvbnN0IFV0aWxpdGllcyA9IHtcbiAgICBwcmludCgpIHtcbiAgICAgICAgY29uc3QgcHJpbnRMaW5rcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5qcy1wcmludC1saW5rJyk7XG4gICAgICAgIHByaW50TGlua3MuZm9yRWFjaCgocHJpbnRMaW5rKSA9PiB7XG4gICAgICAgICAgICBwcmludExpbmsuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoZSkgPT4ge1xuICAgICAgICAgICAgICAgIHdpbmRvdy5wcmludCgpO1xuXG4gICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBpbml0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMucHJpbnQoKTtcbiAgICB9LFxufTtcblxuZXhwb3J0IGRlZmF1bHQgVXRpbGl0aWVzO1xuIiwKICAgICJjb25zdCBDb250ZW50ID0ge1xuICAgIHRvZ2dsZVJlc291cmNlc1NpZGViYXIoKSB7XG4gICAgICAgIGNvbnN0IHRvZ2dsZUxpbmsgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLmpzLXJlc291cmNlcy1zaWRlYmFyLXRvZ2dsZVwiKTtcbiAgICAgICAgaWYgKHRvZ2dsZUxpbmspIHtcbiAgICAgICAgICAgIGNvbnN0IHNpZGViYXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLnJlc291cmNlcy1zaWRlYmFyLW5hdlwiKTtcbiAgICAgICAgICAgIGNvbnN0IHNob3dUZXh0ID0gdG9nZ2xlTGluay5kYXRhc2V0LnNob3c7XG4gICAgICAgICAgICBjb25zdCBoaWRlVGV4dCA9IHRvZ2dsZUxpbmsuZGF0YXNldC5oaWRlO1xuXG4gICAgICAgICAgICB0b2dnbGVMaW5rLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgICAgIHNpZGViYXIuY2xhc3NMaXN0LnRvZ2dsZShcInNob3dcIik7XG5cbiAgICAgICAgICAgICAgICBjb25zdCBpc1Nob3duID0gc2lkZWJhci5jbGFzc0xpc3QuY29udGFpbnMoXCJzaG93XCIpO1xuXG4gICAgICAgICAgICAgICAgaWYgKGlzU2hvd24pIHtcbiAgICAgICAgICAgICAgICAgICAgdG9nZ2xlTGluay50ZXh0Q29udGVudCA9IGhpZGVUZXh0O1xuICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgIHRvZ2dsZUxpbmsudGV4dENvbnRlbnQgPSBzaG93VGV4dDtcbiAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgIH0sXG5cbiAgICBwYXJ0bmVyc0ZpbHRlcigpIHtcbiAgICAgICAgY29uc3QgcGFydG5lckZpbHRlckxpbmtzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5qcy1wYXJ0bmVyLWZpbHRlci1saW5rXCIpO1xuICAgICAgICBjb25zdCBwYXJ0bmVycyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIucGFydG5lcnMtZ3JpZCAucGFydG5lclwiKTtcblxuICAgICAgICBwYXJ0bmVyRmlsdGVyTGlua3MuZm9yRWFjaCgoZmlsdGVyTGluaykgPT4ge1xuICAgICAgICAgICAgZmlsdGVyTGluay5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcbiAgICAgICAgICAgICAgICAvLyBBQ1RJVkUgVEFCXG4gICAgICAgICAgICAgICAgcGFydG5lckZpbHRlckxpbmtzLmZvckVhY2goKG90aGVyTGluaykgPT4ge1xuICAgICAgICAgICAgICAgICAgICBvdGhlckxpbmsuY2xhc3NMaXN0LnJlbW92ZShcImFjdGl2ZVwiKTtcbiAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgIGZpbHRlckxpbmsuY2xhc3NMaXN0LmFkZChcImFjdGl2ZVwiKTtcbiAgICAgICAgICAgICAgICBjb25zdCBmaWx0ZXIgPSBmaWx0ZXJMaW5rLmRhdGFzZXQuZmlsdGVyO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGZpbHRlcik7XG5cbiAgICAgICAgICAgICAgICAvLyBTSE9XIE9OTFkgRklMVEVSRUQgUkVTVUxUU1xuICAgICAgICAgICAgICAgIHBhcnRuZXJzLmZvckVhY2goKHBhcnRuZXIpID0+IHtcbiAgICAgICAgICAgICAgICAgICAgY29uc3QgaXNBY3RpdmUgPSBwYXJ0bmVyLmNsYXNzTGlzdC5jb250YWlucyhmaWx0ZXIpO1xuICAgICAgICAgICAgICAgICAgICBpZiAoZmlsdGVyICE9PSBcImFsbFwiKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoaXNBY3RpdmUpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwYXJ0bmVyLnN0eWxlLmRpc3BsYXkgPSBcImJsb2NrXCI7XG4gICAgICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHBhcnRuZXIuc3R5bGUuZGlzcGxheSA9IFwibm9uZVwiO1xuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAgICAgcGFydG5lci5zdHlsZS5kaXNwbGF5ID0gXCJibG9ja1wiO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG4gICAgfSxcblxuICAgIGxlYWRlckJpb3MoKSB7XG4gICAgICAgIGNvbnN0IGJpb1RyaWdnZXJzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5sZWFkZXJfX2Jpby10cmlnZ2VyXCIpO1xuXG4gICAgICAgIGJpb1RyaWdnZXJzLmZvckVhY2goKHRyaWdnZXIpID0+IHtcbiAgICAgICAgICAgIGNvbnN0IGxlYWRlciA9IHRyaWdnZXIuY2xvc2VzdChcIi5sZWFkZXJcIik7XG4gICAgICAgICAgICBjb25zdCBkaWFsb2cgPSBsZWFkZXIucXVlcnlTZWxlY3RvcihcIi5sZWFkZXJfX2Jpb1wiKTtcbiAgICAgICAgICAgIGNvbnN0IGNsb3NlQnV0dG9uID0gZGlhbG9nLnF1ZXJ5U2VsZWN0b3IoXCIubGVhZGVyX19iaW8tY2xvc2VcIik7XG5cbiAgICAgICAgICAgIC8vIE9wZW4gZGlhbG9nXG4gICAgICAgICAgICB0cmlnZ2VyLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoKSA9PiB7XG4gICAgICAgICAgICAgICAgZGlhbG9nLnNob3dNb2RhbCgpO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgIC8vIENsb3NlIHdpdGggYnV0dG9uXG4gICAgICAgICAgICBjbG9zZUJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKCkgPT4ge1xuICAgICAgICAgICAgICAgIGRpYWxvZy5jbG9zZSgpO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgIC8vIENsb3NlIHdoZW4gY2xpY2tpbmcgb3V0c2lkZVxuICAgICAgICAgICAgZGlhbG9nLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgICAgIGNvbnN0IGRpYWxvZ0RpbWVuc2lvbnMgPSBkaWFsb2cuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCk7XG4gICAgICAgICAgICAgICAgaWYgKFxuICAgICAgICAgICAgICAgICAgICBlLmNsaWVudFggPCBkaWFsb2dEaW1lbnNpb25zLmxlZnQgfHxcbiAgICAgICAgICAgICAgICAgICAgZS5jbGllbnRYID4gZGlhbG9nRGltZW5zaW9ucy5yaWdodCB8fFxuICAgICAgICAgICAgICAgICAgICBlLmNsaWVudFkgPCBkaWFsb2dEaW1lbnNpb25zLnRvcCB8fFxuICAgICAgICAgICAgICAgICAgICBlLmNsaWVudFkgPiBkaWFsb2dEaW1lbnNpb25zLmJvdHRvbVxuICAgICAgICAgICAgICAgICkge1xuICAgICAgICAgICAgICAgICAgICBkaWFsb2cuY2xvc2UoKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG4gICAgfSxcblxuICAgIGZ1dHVyZUZlYXR1cmVzVG9nZ2xlKCkge1xuICAgICAgICBjb25zdCBmZWF0dXJlSXRlbXMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiLmZ1dHVyZS1mZWF0dXJlc19faXRlbVwiKTtcblxuICAgICAgICBmZWF0dXJlSXRlbXMuZm9yRWFjaCgoaXRlbSkgPT4ge1xuICAgICAgICAgICAgY29uc3QgaGVhZGxpbmUgPSBpdGVtLnF1ZXJ5U2VsZWN0b3IoXCIuZnV0dXJlLWZlYXR1cmVzX19oZWFkbGluZVwiKTtcbiAgICAgICAgICAgIGNvbnN0IGNvcHkgPSBpdGVtLnF1ZXJ5U2VsZWN0b3IoXCIuZnV0dXJlLWZlYXR1cmVzX19jb3B5XCIpO1xuICAgICAgICAgICAgY29uc3QgaWNvbiA9IGhlYWRsaW5lLnF1ZXJ5U2VsZWN0b3IoXCIuaWNvbiBzdmdcIik7XG5cbiAgICAgICAgICAgIGlmIChoZWFkbGluZSAmJiBjb3B5KSB7XG4gICAgICAgICAgICAgICAgaGVhZGxpbmUuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsICgpID0+IHtcbiAgICAgICAgICAgICAgICAgICAgY29uc3QgaXNIaWRkZW4gPSBjb3B5LnN0eWxlLmRpc3BsYXkgPT09IFwibm9uZVwiIHx8IGNvcHkuc3R5bGUuZGlzcGxheSA9PT0gXCJcIjtcblxuICAgICAgICAgICAgICAgICAgICBpZiAoaXNIaWRkZW4pIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvcHkuc3R5bGUuZGlzcGxheSA9IFwiYmxvY2tcIjtcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChpY29uKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbi5zdHlsZS50cmFuc2Zvcm0gPSBcInJvdGF0ZSgxODBkZWcpXCI7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBjb3B5LnN0eWxlLmRpc3BsYXkgPSBcIm5vbmVcIjtcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChpY29uKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbi5zdHlsZS50cmFuc2Zvcm0gPSBcInJvdGF0ZSgwZGVnKVwiO1xuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBpbml0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMudG9nZ2xlUmVzb3VyY2VzU2lkZWJhcigpO1xuICAgICAgICB0aGlzLnBhcnRuZXJzRmlsdGVyKCk7XG4gICAgICAgIHRoaXMubGVhZGVyQmlvcygpO1xuICAgICAgICB0aGlzLmZ1dHVyZUZlYXR1cmVzVG9nZ2xlKCk7XG4gICAgfSxcbn07XG5cbmV4cG9ydCBkZWZhdWx0IENvbnRlbnQ7XG4iLAogICAgIi8vIER5bmFtaWNhbGx5IGltcG9ydCBTd2lwZXIgb25seSB3aGVuIG5lZWRlZFxubGV0IFN3aXBlciA9IG51bGw7XG5sZXQgc3dpcGVyTG9hZGluZyA9IGZhbHNlO1xuXG5hc3luYyBmdW5jdGlvbiBsb2FkU3dpcGVyKCkge1xuICAgIGlmIChTd2lwZXIpIHJldHVybiBTd2lwZXI7XG5cbiAgICBpZiAoc3dpcGVyTG9hZGluZykge1xuICAgICAgICAvLyBXYWl0IGZvciBleGlzdGluZyBsb2FkIHRvIGNvbXBsZXRlXG4gICAgICAgIHdoaWxlIChzd2lwZXJMb2FkaW5nKSB7XG4gICAgICAgICAgICBhd2FpdCBuZXcgUHJvbWlzZSgocmVzb2x2ZSkgPT4gc2V0VGltZW91dChyZXNvbHZlLCAxMCkpO1xuICAgICAgICB9XG4gICAgICAgIHJldHVybiBTd2lwZXI7XG4gICAgfVxuXG4gICAgc3dpcGVyTG9hZGluZyA9IHRydWU7XG4gICAgdHJ5IHtcbiAgICAgICAgY29uc3QgbW9kdWxlID0gYXdhaXQgaW1wb3J0KFwiaHR0cHM6Ly9jZG4uanNkZWxpdnIubmV0L25wbS9zd2lwZXJAOC9zd2lwZXItYnVuZGxlLmVzbS5icm93c2VyLm1pbi5qc1wiKTtcbiAgICAgICAgU3dpcGVyID0gbW9kdWxlLmRlZmF1bHQ7XG4gICAgICAgIHJldHVybiBTd2lwZXI7XG4gICAgfSBmaW5hbGx5IHtcbiAgICAgICAgc3dpcGVyTG9hZGluZyA9IGZhbHNlO1xuICAgIH1cbn1cblxuY29uc3QgTW9kYWwgPSB7XG4gICAgbW9kYWxzOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIE1pY3JvTW9kYWwuaW5pdCh7XG4gICAgICAgICAgICBvbkNsb3NlOiAoKSA9PiB7XG4gICAgICAgICAgICAgICAgY29uc3QgdmlkZW9QbGF5ZXJzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5tb2RhbF9fY29udGVudCAudmlkZW8tcGxheWVyXCIpO1xuXG4gICAgICAgICAgICAgICAgdmlkZW9QbGF5ZXJzLmZvckVhY2goKHBsYXllcikgPT4ge1xuICAgICAgICAgICAgICAgICAgICBjb25zdCBpZnJhbWUgPSBwbGF5ZXIucXVlcnlTZWxlY3RvcihcImlmcmFtZVwiKTtcbiAgICAgICAgICAgICAgICAgICAgaWZyYW1lLnNldEF0dHJpYnV0ZShcInNyY1wiLCBcIlwiKTtcbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBhd2FpdE9wZW5BbmltYXRpb246IHRydWUsXG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICB2aWRlb01vZGFsOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0IHZpZGVvTGlua3MgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiLmpzLXZpZGVvLW1vZGFsXCIpO1xuXG4gICAgICAgIHZpZGVvTGlua3MuZm9yRWFjaCgobGluaykgPT4ge1xuICAgICAgICAgICAgY29uc3QgbW9kYWxUYXJnZXQgPSBsaW5rLmRhdGFzZXQubWljcm9tb2RhbFRyaWdnZXI7XG4gICAgICAgICAgICBjb25zdCBtb2RhbCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKG1vZGFsVGFyZ2V0KTtcbiAgICAgICAgICAgIGNvbnN0IHZpZGVvUGxheWVyID0gbW9kYWwucXVlcnlTZWxlY3RvcihcIi52aWRlby1wbGF5ZXJcIik7XG4gICAgICAgICAgICBjb25zdCBpZnJhbWUgPSB2aWRlb1BsYXllci5xdWVyeVNlbGVjdG9yKFwiaWZyYW1lXCIpO1xuICAgICAgICAgICAgY29uc3QgYXV0b3BsYXlVcmwgPSB2aWRlb1BsYXllci5kYXRhc2V0LmF1dG9wbGF5VXJsO1xuXG4gICAgICAgICAgICBsaW5rLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgICAgIGlmcmFtZS5zZXRBdHRyaWJ1dGUoXCJzcmNcIiwgYXV0b3BsYXlVcmwpO1xuXG4gICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBhY1BsdXNNb2RhbDogZnVuY3Rpb24gKCkge1xuICAgICAgICBjb25zdCBhY1BsdXNMaW5rcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIuanMtYWMtcGx1cy1tb2RhbFwiKTtcblxuICAgICAgICBhY1BsdXNMaW5rcy5mb3JFYWNoKChsaW5rKSA9PiB7XG4gICAgICAgICAgICBsaW5rLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBhc3luYyAoZSkgPT4ge1xuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICAgICAgICAgIGNvbnN0IHNsaWRlSW5kZXggPSBsaW5rLmRhdGFzZXQuc2xpZGVJbmRleDtcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhzbGlkZUluZGV4KTtcblxuICAgICAgICAgICAgICAgIC8vIExvYWQgU3dpcGVyIG9ubHkgd2hlbiBtb2RhbCBpcyB0cmlnZ2VyZWRcbiAgICAgICAgICAgICAgICBjb25zdCBTd2lwZXJDbGFzcyA9IGF3YWl0IGxvYWRTd2lwZXIoKTtcblxuICAgICAgICAgICAgICAgIGNvbnN0IGFjUGx1c1N3aXBlciA9IG5ldyBTd2lwZXJDbGFzcyhcIi5zd2lwZXJcIiwge1xuICAgICAgICAgICAgICAgICAgICBhdXRvcGxheTogZmFsc2UsXG4gICAgICAgICAgICAgICAgICAgIHNwZWVkOiA2MDAsXG4gICAgICAgICAgICAgICAgICAgIHNwYWNlQmV0d2VlbjogMCxcbiAgICAgICAgICAgICAgICAgICAgaW5pdGlhbFNsaWRlOiBwYXJzZUZsb2F0KHNsaWRlSW5kZXgpLFxuICAgICAgICAgICAgICAgICAgICBncmFiQ3Vyc29yOiB0cnVlLFxuICAgICAgICAgICAgICAgICAgICBsb29wOiB0cnVlLFxuICAgICAgICAgICAgICAgICAgICBuYXZpZ2F0aW9uOiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgICAgcGFnaW5hdGlvbjoge1xuICAgICAgICAgICAgICAgICAgICAgICAgZWw6IFwiLnN3aXBlci1wYWdpbmF0aW9uXCIsXG4gICAgICAgICAgICAgICAgICAgICAgICB0eXBlOiBcImJ1bGxldHNcIixcbiAgICAgICAgICAgICAgICAgICAgICAgIGNsaWNrYWJsZTogdHJ1ZSxcbiAgICAgICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgbGVhZGVyc2hpcE1vZGFsOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0IGxlYWRlcnNoaXBMaW5rcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIuanMtbGVhZGVyLW1vZGFsXCIpO1xuXG4gICAgICAgIGxlYWRlcnNoaXBMaW5rcy5mb3JFYWNoKChsaW5rKSA9PiB7XG4gICAgICAgICAgICBsaW5rLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgZm9ybU1vZGFsczogZnVuY3Rpb24gKCkge1xuICAgICAgICBjb25zdCBmb3JtTGlua3MgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiLmpzLWZvcm0tdHJpZ2dlclwiKTtcblxuICAgICAgICBmb3JtTGlua3MuZm9yRWFjaCgobGluaykgPT4ge1xuICAgICAgICAgICAgbGluay5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG4gICAgfSxcblxuICAgIG5hYk1vZGFsOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0IG1vZGFsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNuYWJcIik7XG5cbiAgICAgICAgLy8gRWFybHkgcmV0dXJuIGlmIG1vZGFsIGRvZXNuJ3QgZXhpc3RcbiAgICAgICAgaWYgKCFtb2RhbCkge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgY29uc3QgY3VycmVudFBhdGggPSB3aW5kb3cubG9jYXRpb24ucGF0aG5hbWU7XG4gICAgICAgIGlmIChjdXJyZW50UGF0aC5pbmNsdWRlcyhcIi9zb2x1dGlvbnMvY29ycG9yYXRlLWNyZWF0aXZlL1wiKSkge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgY29uc3Qgc2hvd01vZGFsQXRsYXNDQ1Bvc3ROYWIgPSBsb2NhbFN0b3JhZ2UuZ2V0SXRlbShcInNob3dNb2RhbEF0bGFzQ0NQb3N0TmFiXCIpO1xuXG4gICAgICAgIGlmIChzZXNzaW9uU3RvcmFnZS5hdGxhc19jY19wb3N0X25hYl9wYWdlQ291bnQpIHtcbiAgICAgICAgICAgIHNlc3Npb25TdG9yYWdlLmF0bGFzX2NjX3Bvc3RfbmFiX3BhZ2VDb3VudCA9IE51bWJlcihzZXNzaW9uU3RvcmFnZS5hdGxhc19jY19wb3N0X25hYl9wYWdlQ291bnQpICsgMTtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgIHNlc3Npb25TdG9yYWdlLmF0bGFzX2NjX3Bvc3RfbmFiX3BhZ2VDb3VudCA9IDE7XG4gICAgICAgIH1cblxuICAgICAgICBpZiAoc2Vzc2lvblN0b3JhZ2UuYXRsYXNfY2NfcG9zdF9uYWJfcGFnZUNvdW50ID09IDEpIHtcbiAgICAgICAgICAgIGlmIChzaG93TW9kYWxBdGxhc0NDUG9zdE5hYiA9PSBudWxsKSB7XG4gICAgICAgICAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oXCJzaG93TW9kYWxBdGxhc0NDUG9zdE5hYlwiLCAxKTtcbiAgICAgICAgICAgICAgICBNaWNyb01vZGFsLnNob3coXCJuYWJcIik7XG4gICAgICAgICAgICB9IGVsc2UgaWYgKHNob3dNb2RhbEF0bGFzQ0NQb3N0TmFiID49IDEgJiYgc2hvd01vZGFsQXRsYXNDQ1Bvc3ROYWIgPD0gNSkge1xuICAgICAgICAgICAgICAgIHZhciB2aXNpdF9jb3VudCA9IHBhcnNlSW50KGxvY2FsU3RvcmFnZS5nZXRJdGVtKFwic2hvd01vZGFsQXRsYXNDQ1Bvc3ROYWJcIikpO1xuICAgICAgICAgICAgICAgIHZpc2l0X2NvdW50Kys7XG4gICAgICAgICAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oXCJzaG93TW9kYWxBdGxhc0NDUG9zdE5hYlwiLCB2aXNpdF9jb3VudCk7XG4gICAgICAgICAgICAgICAgTWljcm9Nb2RhbC5zaG93KFwibmFiXCIpO1xuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICB2YXIgdmlzaXRfY291bnQgPSBwYXJzZUludChsb2NhbFN0b3JhZ2UuZ2V0SXRlbShcInNob3dNb2RhbEF0bGFzQ0NQb3N0TmFiXCIpKTtcbiAgICAgICAgICAgICAgICB2aXNpdF9jb3VudCsrO1xuICAgICAgICAgICAgICAgIGxvY2FsU3RvcmFnZS5zZXRJdGVtKFwic2hvd01vZGFsQXRsYXNDQ1Bvc3ROYWJcIiwgdmlzaXRfY291bnQpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG5cbiAgICAgICAgLy9NaWNyb01vZGFsLnNob3coXCJuYWJcIik7XG4gICAgfSxcblxuICAgIGhvbWVIZXJvU3dpcGVyOiBhc3luYyBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0IGhlcm9Td2lwZXJFbGVtZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5oZXJvLXN3aXBlclwiKTtcblxuICAgICAgICAvLyBPbmx5IGluaXRpYWxpemUgaWYgdGhlIGhlcm8gc3dpcGVyIGVsZW1lbnQgZXhpc3RzXG4gICAgICAgIGlmICghaGVyb1N3aXBlckVsZW1lbnQpIHtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuXG4gICAgICAgIC8vIExvYWQgU3dpcGVyIG9ubHkgd2hlbiBuZWVkZWRcbiAgICAgICAgY29uc3QgU3dpcGVyQ2xhc3MgPSBhd2FpdCBsb2FkU3dpcGVyKCk7XG5cbiAgICAgICAgLy8gQWRkIGEgc21hbGwgZGVsYXkgdG8gZW5zdXJlIERPTSBpcyBzdGFibGUgYmVmb3JlIGluaXRpYWxpemF0aW9uXG4gICAgICAgIGF3YWl0IG5ldyBQcm9taXNlKChyZXNvbHZlKSA9PiBzZXRUaW1lb3V0KHJlc29sdmUsIDEwMCkpO1xuXG4gICAgICAgIGNvbnN0IGhlcm9Td2lwZXIgPSBuZXcgU3dpcGVyQ2xhc3MoXCIuaGVyby1zd2lwZXJcIiwge1xuICAgICAgICAgICAgYXV0b3BsYXk6IHtcbiAgICAgICAgICAgICAgICBkZWxheTogNDAwMCxcbiAgICAgICAgICAgICAgICBkaXNhYmxlT25JbnRlcmFjdGlvbjogZmFsc2UsXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgc3BlZWQ6IDYwMCxcbiAgICAgICAgICAgIGVmZmVjdDogXCJmYWRlXCIsXG4gICAgICAgICAgICBmYWRlRWZmZWN0OiB7XG4gICAgICAgICAgICAgICAgY3Jvc3NGYWRlOiB0cnVlLFxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIHNwYWNlQmV0d2VlbjogMCxcbiAgICAgICAgICAgIGdyYWJDdXJzb3I6IHRydWUsXG4gICAgICAgICAgICBsb29wOiB0cnVlLFxuICAgICAgICAgICAgbmF2aWdhdGlvbjogZmFsc2UsXG4gICAgICAgICAgICBwYWdpbmF0aW9uOiB7XG4gICAgICAgICAgICAgICAgZWw6IFwiLnN3aXBlci1wYWdpbmF0aW9uXCIsXG4gICAgICAgICAgICAgICAgdHlwZTogXCJidWxsZXRzXCIsXG4gICAgICAgICAgICAgICAgY2xpY2thYmxlOiB0cnVlLFxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIC8vIEVuc3VyZSBzbW9vdGggaW5pdGlhbGl6YXRpb24gYW5kIHBlcmZvcm1hbmNlIG9wdGltaXphdGlvbnNcbiAgICAgICAgICAgIG9ic2VydmVyOiB0cnVlLFxuICAgICAgICAgICAgb2JzZXJ2ZVBhcmVudHM6IHRydWUsXG4gICAgICAgICAgICB3YXRjaFNsaWRlc1Byb2dyZXNzOiB0cnVlLFxuICAgICAgICAgICAgd2F0Y2hTbGlkZXNWaXNpYmlsaXR5OiB0cnVlLFxuICAgICAgICAgICAgLy8gT3B0aW1pemUgZm9yIHBlcmZvcm1hbmNlXG4gICAgICAgICAgICBwcmVsb2FkSW1hZ2VzOiBmYWxzZSxcbiAgICAgICAgICAgIGxhenk6IHtcbiAgICAgICAgICAgICAgICBsb2FkUHJldk5leHQ6IHRydWUsXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgLy8gQ2FsbGJhY2sgdG8gcmVtb3ZlIGluaXRpYWxpemF0aW9uIGJsb2NrZXIgY2xhc3NcbiAgICAgICAgICAgIG9uOiB7XG4gICAgICAgICAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICBoZXJvU3dpcGVyRWxlbWVudC5jbGFzc0xpc3QuYWRkKFwic3dpcGVyLWluaXRpYWxpemVkXCIpO1xuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICB9LFxuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgaG9tZVZhbHVlc1N3aXBlcjogYXN5bmMgZnVuY3Rpb24gKCkge1xuICAgICAgICBjb25zdCB2YWx1ZXNTd2lwZXJFbGVtZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi52YWx1ZXMtc3dpcGVyXCIpO1xuXG4gICAgICAgIC8vIE9ubHkgaW5pdGlhbGl6ZSBpZiB0aGUgdmFsdWVzIHN3aXBlciBlbGVtZW50IGV4aXN0c1xuICAgICAgICBpZiAoIXZhbHVlc1N3aXBlckVsZW1lbnQpIHtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuXG4gICAgICAgIC8vIExvYWQgU3dpcGVyIG9ubHkgd2hlbiBuZWVkZWRcbiAgICAgICAgY29uc3QgU3dpcGVyQ2xhc3MgPSBhd2FpdCBsb2FkU3dpcGVyKCk7XG5cbiAgICAgICAgLy8gQWRkIGEgc21hbGwgZGVsYXkgdG8gZW5zdXJlIERPTSBpcyBzdGFibGUgYmVmb3JlIGluaXRpYWxpemF0aW9uXG4gICAgICAgIGF3YWl0IG5ldyBQcm9taXNlKChyZXNvbHZlKSA9PiBzZXRUaW1lb3V0KHJlc29sdmUsIDEwMCkpO1xuXG4gICAgICAgIGNvbnN0IHZhbHVlc1N3aXBlciA9IG5ldyBTd2lwZXJDbGFzcyhcIi52YWx1ZXMtc3dpcGVyXCIsIHtcbiAgICAgICAgICAgIGF1dG9wbGF5OiB7XG4gICAgICAgICAgICAgICAgZGVsYXk6IDQwMDAsXG4gICAgICAgICAgICAgICAgZGlzYWJsZU9uSW50ZXJhY3Rpb246IGZhbHNlLFxuICAgICAgICAgICAgICAgIHBhdXNlT25Nb3VzZUVudGVyOiB0cnVlLFxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIHNwZWVkOiA2MDAsXG4gICAgICAgICAgICBzbGlkZXNQZXJWaWV3OiAxLFxuICAgICAgICAgICAgc3BhY2VCZXR3ZWVuOiAyNCxcbiAgICAgICAgICAgIGdyYWJDdXJzb3I6IHRydWUsXG4gICAgICAgICAgICBsb29wOiB0cnVlLFxuICAgICAgICAgICAgbmF2aWdhdGlvbjoge1xuICAgICAgICAgICAgICAgIG5leHRFbDogXCIudmFsdWVzLXN3aXBlciAuc3dpcGVyLWJ1dHRvbi1uZXh0XCIsXG4gICAgICAgICAgICAgICAgcHJldkVsOiBcIi52YWx1ZXMtc3dpcGVyIC5zd2lwZXItYnV0dG9uLXByZXZcIixcbiAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgIGJyZWFrcG9pbnRzOiB7XG4gICAgICAgICAgICAgICAgNzY4OiB7XG4gICAgICAgICAgICAgICAgICAgIHNsaWRlc1BlclZpZXc6IDIsXG4gICAgICAgICAgICAgICAgICAgIHNwYWNlQmV0d2VlbjogMjQsXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICA5OTI6IHtcbiAgICAgICAgICAgICAgICAgICAgc2xpZGVzUGVyVmlldzogMyxcbiAgICAgICAgICAgICAgICAgICAgc3BhY2VCZXR3ZWVuOiAyNCxcbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgIDE2MDA6IHtcbiAgICAgICAgICAgICAgICAgICAgc2xpZGVzUGVyVmlldzogNCxcbiAgICAgICAgICAgICAgICAgICAgc3BhY2VCZXR3ZWVuOiAyNCxcbiAgICAgICAgICAgICAgICB9LFxuXG4gICAgICAgICAgICAgICAgMTkyMDoge1xuICAgICAgICAgICAgICAgICAgICBzbGlkZXNQZXJWaWV3OiA1LFxuICAgICAgICAgICAgICAgICAgICBzcGFjZUJldHdlZW46IDI0LFxuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgLy8gRW5zdXJlIHNtb290aCBpbml0aWFsaXphdGlvbiBhbmQgcGVyZm9ybWFuY2Ugb3B0aW1pemF0aW9uc1xuICAgICAgICAgICAgb2JzZXJ2ZXI6IHRydWUsXG4gICAgICAgICAgICBvYnNlcnZlUGFyZW50czogdHJ1ZSxcbiAgICAgICAgICAgIHdhdGNoU2xpZGVzUHJvZ3Jlc3M6IHRydWUsXG4gICAgICAgICAgICB3YXRjaFNsaWRlc1Zpc2liaWxpdHk6IHRydWUsXG4gICAgICAgICAgICAvLyBPcHRpbWl6ZSBmb3IgcGVyZm9ybWFuY2VcbiAgICAgICAgICAgIHByZWxvYWRJbWFnZXM6IGZhbHNlLFxuICAgICAgICAgICAgbGF6eToge1xuICAgICAgICAgICAgICAgIGxvYWRQcmV2TmV4dDogdHJ1ZSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAvLyBDYWxsYmFjayB0byByZW1vdmUgaW5pdGlhbGl6YXRpb24gYmxvY2tlciBjbGFzc1xuICAgICAgICAgICAgb246IHtcbiAgICAgICAgICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlc1N3aXBlckVsZW1lbnQuY2xhc3NMaXN0LmFkZChcInN3aXBlci1pbml0aWFsaXplZFwiKTtcbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgIHNsaWRlQ2hhbmdlOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgIC8vIE9wdGlvbmFsOiBBZGQgYW55IHNsaWRlIGNoYW5nZSBsb2dpYyBoZXJlXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgIH0pO1xuICAgIH0sXG4gICAgaW5pdDogZnVuY3Rpb24gKCkge1xuICAgICAgICB0aGlzLm1vZGFscygpO1xuICAgICAgICB0aGlzLnZpZGVvTW9kYWwoKTtcbiAgICAgICAgdGhpcy5hY1BsdXNNb2RhbCgpO1xuICAgICAgICB0aGlzLmxlYWRlcnNoaXBNb2RhbCgpO1xuICAgICAgICB0aGlzLmZvcm1Nb2RhbHMoKTtcbiAgICAgICAgdGhpcy5uYWJNb2RhbCgpO1xuICAgICAgICB0aGlzLmhvbWVIZXJvU3dpcGVyKCk7XG4gICAgICAgIHRoaXMuaG9tZVZhbHVlc1N3aXBlcigpO1xuICAgIH0sXG59O1xuXG5leHBvcnQgZGVmYXVsdCBNb2RhbDtcbiIsCiAgICAiY29uc3QgUHJpY2luZyA9IHtcbiAgICBoZXJvUGFkZGluZygpIHtcbiAgICAgICAgY29uc3QgaGVybyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIucGFnZS10ZW1wbGF0ZS1wcmljaW5nIC5oZXJvXCIpO1xuICAgICAgICBjb25zdCBmZWF0dXJlcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIucGFnZS10ZW1wbGF0ZS1wcmljaW5nIC5mZWF0dXJlc1wiKTtcbiAgICAgICAgY29uc3Qgb3ZlcnZpZXcgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLnBhZ2UtdGVtcGxhdGUtcHJpY2luZyAub3ZlcnZpZXdfX2dyaWRcIik7XG5cbiAgICAgICAgaWYgKGhlcm8gJiYgZmVhdHVyZXMgJiYgb3ZlcnZpZXcpIHtcbiAgICAgICAgICAgIGNvbnN0IGFkanVzdFBhZGRpbmcgPSAoKSA9PiB7XG4gICAgICAgICAgICAgICAgaWYgKHdpbmRvdy5pbm5lcldpZHRoID4gOTkyKSB7XG4gICAgICAgICAgICAgICAgICAgIGNvbnN0IG92ZXJ2aWV3SGVpZ2h0ID0gb3ZlcnZpZXcub2Zmc2V0SGVpZ2h0O1xuICAgICAgICAgICAgICAgICAgICBjb25zdCBoYWxmT3ZlcnZpZXdIZWlnaHQgPSBvdmVydmlld0hlaWdodCAvIDI7XG4gICAgICAgICAgICAgICAgICAgIGNvbnN0IHBhZGRpbmdWYWx1ZSA9IGAke2hhbGZPdmVydmlld0hlaWdodH1weGA7XG4gICAgICAgICAgICAgICAgICAgIGhlcm8uc3R5bGUucGFkZGluZ0JvdHRvbSA9IHBhZGRpbmdWYWx1ZTtcbiAgICAgICAgICAgICAgICAgICAgZmVhdHVyZXMuc3R5bGUubWFyZ2luVG9wID0gYC0ke2hhbGZPdmVydmlld0hlaWdodH1weGA7XG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgaGVyby5zdHlsZS5wYWRkaW5nQm90dG9tID0gXCJcIjtcbiAgICAgICAgICAgICAgICAgICAgZmVhdHVyZXMuc3R5bGUubWFyZ2luVG9wID0gXCJcIjtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9O1xuXG4gICAgICAgICAgICAvLyBIaWRlIGNvbnRlbnQgaW5pdGlhbGx5XG4gICAgICAgICAgICBkb2N1bWVudC5ib2R5LnN0eWxlLnZpc2liaWxpdHkgPSBcImhpZGRlblwiO1xuXG4gICAgICAgICAgICAvLyBQcmUtY2FsY3VsYXRlIHBhZGRpbmdcbiAgICAgICAgICAgIGFkanVzdFBhZGRpbmcoKTtcblxuICAgICAgICAgICAgLy8gU2hvdyBjb250ZW50IGFuZCBhcHBseSB0cmFuc2l0aW9uc1xuICAgICAgICAgICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoXCJsb2FkXCIsICgpID0+IHtcbiAgICAgICAgICAgICAgICBkb2N1bWVudC5ib2R5LnN0eWxlLnZpc2liaWxpdHkgPSBcInZpc2libGVcIjtcbiAgICAgICAgICAgICAgICBoZXJvLnN0eWxlLnRyYW5zaXRpb24gPSBcInBhZGRpbmctYm90dG9tIDAuM3MgZWFzZS1pbi1vdXRcIjtcbiAgICAgICAgICAgICAgICBmZWF0dXJlcy5zdHlsZS50cmFuc2l0aW9uID0gXCJtYXJnaW4tdG9wIDAuM3MgZWFzZS1pbi1vdXRcIjtcbiAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICAvLyBEZWJvdW5jZSB0aGUgcmVzaXplIGV2ZW50IGhhbmRsZXJcbiAgICAgICAgICAgIGxldCByZXNpemVUaW1lcjtcbiAgICAgICAgICAgIHdpbmRvdy5hZGRFdmVudExpc3RlbmVyKFwicmVzaXplXCIsICgpID0+IHtcbiAgICAgICAgICAgICAgICBjbGVhclRpbWVvdXQocmVzaXplVGltZXIpO1xuICAgICAgICAgICAgICAgIHJlc2l6ZVRpbWVyID0gc2V0VGltZW91dChhZGp1c3RQYWRkaW5nLCAyNTApO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICB9LFxuICAgIHRvZ2dsZUZlYXR1cmVFeHBhbnNpb24oKSB7XG4gICAgICAgIGNvbnN0IGZlYXR1cmVOYW1lcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIucGFnZS10ZW1wbGF0ZS1wcmljaW5nIC5mZWF0dXJlc19fdGFibGUtdGQubmFtZVwiKTtcblxuICAgICAgICBpZiAoZmVhdHVyZU5hbWVzKSB7XG4gICAgICAgICAgICBmZWF0dXJlTmFtZXMuZm9yRWFjaCgoZmVhdHVyZU5hbWUpID0+IHtcbiAgICAgICAgICAgICAgICBmZWF0dXJlTmFtZS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICBpZiAod2luZG93LmlubmVyV2lkdGggPj0gNzY4KSB7XG4gICAgICAgICAgICAgICAgICAgICAgICB0aGlzLmNsYXNzTGlzdC50b2dnbGUoXCJleHBhbmRlZFwiKTtcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICB9LFxuICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgLy90aGlzLmhlcm9QYWRkaW5nKCk7XG4gICAgICAgIHRoaXMudG9nZ2xlRmVhdHVyZUV4cGFuc2lvbigpO1xuICAgIH0sXG59O1xuXG5leHBvcnQgZGVmYXVsdCBQcmljaW5nO1xuIiwKICAgICJpbXBvcnQgSGVhZGVyIGZyb20gXCIuL2hlYWRlci5qc1wiO1xuaW1wb3J0IEFuaW1hdGlvbnMgZnJvbSBcIi4vYW5pbWF0aW9ucy5qc1wiO1xuaW1wb3J0IFV0aWxpdGllcyBmcm9tIFwiLi91dGlsaXRpZXMuanNcIjtcbmltcG9ydCBDb250ZW50IGZyb20gXCIuL2NvbnRlbnQuanNcIjtcbmltcG9ydCBNb2RhbHMgZnJvbSBcIi4vbW9kYWxzLmpzXCI7XG5pbXBvcnQgUHJpY2luZyBmcm9tIFwiLi9wcmljaW5nLmpzXCI7XG5cbigoKSA9PiB7XG4gICAgSGVhZGVyLmluaXQoKTtcbiAgICBBbmltYXRpb25zLmluaXQoKTtcbiAgICBVdGlsaXRpZXMuaW5pdCgpO1xuICAgIE1vZGFscy5pbml0KCk7XG4gICAgQ29udGVudC5pbml0KCk7XG4gICAgUHJpY2luZy5pbml0KCk7XG59KSgpO1xuIgogIF0sCiAgIm1hcHBpbmdzIjogIjs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0VBQUEsSUFBTSxNQUFNLFNBQVMsY0FBYyxrQkFBa0I7QUFBQSxFQUNyRCxJQUFNLFdBQVcsU0FBUyxjQUFjLDZCQUE2QjtBQUFBLEVBQ3JFLElBQU0sWUFBWSxTQUFTLGNBQWMsSUFBSTtBQUFBLEVBQzdDLElBQU0sWUFBWSxTQUFTLGNBQWMsYUFBYTtFQWV0RCxTQUFTLGFBQWEsR0FBRztBQUFBLElBQ3JCLElBQUksVUFBVSxJQUFJLFdBQVc7QUFBQSxJQUM3QixTQUFTLFVBQVUsSUFBSSxXQUFXO0FBQUEsSUFDbEMsVUFBVSxVQUFVLE9BQU8sTUFBTTtBQUFBLElBQ2pDLFVBQVUsVUFBVSxPQUFPLE1BQU07QUFBQSxJQUVqQyxXQUFXLFFBQVMsR0FBRztBQUFBLE1BQ25CLElBQUksVUFBVSxPQUFPLGFBQWEsVUFBVTtBQUFBLE1BQzVDLFNBQVMsVUFBVSxPQUFPLGFBQWEsVUFBVTtBQUFBLE9BQ2xELElBQUk7QUFBQSxJQUVQ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
