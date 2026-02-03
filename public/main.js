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
    init: function() {
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
      const showModalAtlasCC = localStorage.getItem("showModalAtlasCC");
      if (sessionStorage.atlas_cc_pageCount) {
        sessionStorage.atlas_cc_pageCount = Number(sessionStorage.atlas_cc_pageCount) + 1;
      } else {
        sessionStorage.atlas_cc_pageCount = 1;
      }
      if (sessionStorage.atlas_cc_pageCount == 1) {
        if (showModalAtlasCC == null) {
          localStorage.setItem("showModalAtlasCC", 1);
          MicroModal.show("nab");
        } else if (showModalAtlasCC >= 1 && showModalAtlasCC <= 5) {
          var visit_count = parseInt(localStorage.getItem("showModalAtlasCC"));
          visit_count++;
          localStorage.setItem("showModalAtlasCC", visit_count);
          MicroModal.show("nab");
        } else {
          var visit_count = parseInt(localStorage.getItem("showModalAtlasCC"));
          visit_count++;
          localStorage.setItem("showModalAtlasCC", visit_count);
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

//# debugId=EDB5D07675EEAF0B64756E2164756E21
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsiLi4vc3JjL2pzL2hlYWRlci5qcyIsICIuLi9zcmMvanMvYW5pbWF0aW9ucy5qcyIsICIuLi9zcmMvanMvdXRpbGl0aWVzLmpzIiwgIi4uL3NyYy9qcy9jb250ZW50LmpzIiwgIi4uL3NyYy9qcy9tb2RhbHMuanMiLCAiLi4vc3JjL2pzL3ByaWNpbmcuanMiLCAiLi4vc3JjL2pzL21haW4uanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbCiAgICAiY29uc3QgbmF2ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5zaXRlLW5hdmlnYXRpb25cIik7XG5jb25zdCBsaW5rTGlzdCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuc2l0ZS1uYXZpZ2F0aW9uIC5saW5rLWxpc3RcIik7XG5jb25zdCBsaW5rR3JvdXAgPSBsaW5rTGlzdC5xdWVyeVNlbGVjdG9yKFwidWxcIik7XG5jb25zdCBtb2JpbGVOYXYgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLm1vYmlsZS1uYXZcIik7XG5cbmZ1bmN0aW9uIHRyYW5zaXRpb25JbigpIHtcbiAgICBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5hZGQoXCJuYXYtb3ZlcmxheS1vcGVuXCIpO1xuXG4gICAgc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgIG5hdi5jbGFzc0xpc3QuYWRkKFwic2xpZGUtaW5cIik7XG4gICAgICAgIGxpbmtMaXN0LmNsYXNzTGlzdC5hZGQoXCJzbGlkZS1pblwiKTtcbiAgICB9LCAxKTtcblxuICAgIHNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICBsaW5rR3JvdXAuY2xhc3NMaXN0LmFkZChcInNob3dcIik7XG4gICAgfSwgMTIwMCk7XG59XG5cbmZ1bmN0aW9uIHRyYW5zaXRpb25PdXQoKSB7XG4gICAgbmF2LmNsYXNzTGlzdC5hZGQoXCJzbGlkZS1vdXRcIik7XG4gICAgbGlua0xpc3QuY2xhc3NMaXN0LmFkZChcInNsaWRlLW91dFwiKTtcbiAgICBsaW5rR3JvdXAuY2xhc3NMaXN0LnJlbW92ZShcInNob3dcIik7XG4gICAgbW9iaWxlTmF2LmNsYXNzTGlzdC5yZW1vdmUoXCJvcGVuXCIpO1xuXG4gICAgc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgIG5hdi5jbGFzc0xpc3QucmVtb3ZlKFwic2xpZGUtb3V0XCIsIFwic2xpZGUtaW5cIik7XG4gICAgICAgIGxpbmtMaXN0LmNsYXNzTGlzdC5yZW1vdmUoXCJzbGlkZS1vdXRcIiwgXCJzbGlkZS1pblwiKTtcbiAgICB9LCAxMjAwKTtcblxuICAgIHNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5yZW1vdmUoXCJuYXYtb3ZlcmxheS1vcGVuXCIpO1xuXG4gICAgICAgIGNvbnN0IGluaXRpYWxUYWIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS10YWItcGFuZWw9XCJpbml0aWFsXCJdJyk7XG4gICAgICAgIGNvbnN0IHRhYkNsb25lID0gaW5pdGlhbFRhYi5jbG9uZU5vZGUodHJ1ZSk7XG4gICAgICAgIGNvbnN0IGFjdGl2ZVRhYiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuc2l0ZS1uYXZpZ2F0aW9uIC5uYXYtY29udGVudCAudGFiLXBhbmVsXCIpO1xuXG4gICAgICAgIGFjdGl2ZVRhYi5yZXBsYWNlV2l0aCh0YWJDbG9uZSk7XG4gICAgfSwgMTIyNSk7XG59XG5cbmNvbnN0IEhlYWRlciA9IHtcbiAgICBlc2MoKSB7XG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJrZXl1cFwiLCAoZSkgPT4ge1xuICAgICAgICAgICAgaWYgKGUua2V5ID09IFwiRXNjYXBlXCIpIHtcbiAgICAgICAgICAgICAgICB0cmFuc2l0aW9uT3V0KCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBzZWFyY2hUb2dnbGUoKSB7XG4gICAgICAgIGNvbnN0IHNlYXJjaFRvZ2dsZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuanMtc2VhcmNoLXRvZ2dsZVwiKTtcbiAgICAgICAgY29uc3Qgc2VhcmNoQ2xvc2UgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLmpzLXNlYXJjaC1jbG9zZVwiKTtcbiAgICAgICAgY29uc3Qgc2VhcmNoQ29udGFpbmVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5zZWFyY2gtY29udGFpbmVyXCIpO1xuICAgICAgICBjb25zdCBzZWFyY2hNb2RhbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuc2VhcmNoLW1vZGFsXCIpO1xuXG4gICAgICAgIHNlYXJjaFRvZ2dsZS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcbiAgICAgICAgICAgIHNlYXJjaENvbnRhaW5lci5jbGFzc0xpc3QudG9nZ2xlKFwic2hvd1wiKTtcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgc2VhcmNoQ2xvc2UuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XG4gICAgICAgICAgICBzZWFyY2hDb250YWluZXIuY2xhc3NMaXN0LnJlbW92ZShcInNob3dcIik7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIH0pO1xuXG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJrZXl1cFwiLCAoZSkgPT4ge1xuICAgICAgICAgICAgaWYgKGUua2V5ID09IFwiRXNjYXBlXCIpIHtcbiAgICAgICAgICAgICAgICBzZWFyY2hDb250YWluZXIuY2xhc3NMaXN0LnJlbW92ZShcInNob3dcIik7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuXG4gICAgICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgaWYgKGUudGFyZ2V0LmNsb3Nlc3QoXCIuc2VhcmNoLW1vZGFsXCIpIHx8IGUudGFyZ2V0LmNsb3Nlc3QoXCIuanMtc2VhcmNoLXRvZ2dsZVwiKSkgcmV0dXJuO1xuICAgICAgICAgICAgc2VhcmNoQ29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoXCJzaG93XCIpO1xuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgbW9iaWxlU2VhcmNoVG9nZ2xlKCkge1xuICAgICAgICBjb25zdCBzZWFyY2hUb2dnbGUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLm1vYmlsZS1uYXYgLmpzLXNlYXJjaC10b2dnbGVcIik7XG4gICAgICAgIGNvbnN0IHNlYXJjaENsb3NlID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5tb2JpbGUtbmF2IC5qcy1zZWFyY2gtY2xvc2VcIik7XG4gICAgICAgIGNvbnN0IHNlYXJjaENvbnRhaW5lciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIubW9iaWxlLW5hdiAuc2VhcmNoLWNvbnRhaW5lclwiKTtcbiAgICAgICAgY29uc3Qgc2VhcmNoTW9kYWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLm1vYmlsZS1uYXYgLnNlYXJjaC1tb2RhbFwiKTtcblxuICAgICAgICBzZWFyY2hUb2dnbGUuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XG4gICAgICAgICAgICBzZWFyY2hDb250YWluZXIuY2xhc3NMaXN0LnRvZ2dsZShcInNob3dcIik7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIH0pO1xuXG4gICAgICAgIHNlYXJjaENsb3NlLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgc2VhcmNoQ29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoXCJzaG93XCIpO1xuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICB9KTtcblxuICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwia2V5dXBcIiwgKGUpID0+IHtcbiAgICAgICAgICAgIGlmIChlLmtleSA9PSBcIkVzY2FwZVwiKSB7XG4gICAgICAgICAgICAgICAgc2VhcmNoQ29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoXCJzaG93XCIpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcblxuICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcbiAgICAgICAgICAgIGlmIChlLnRhcmdldC5jbG9zZXN0KFwiLm1vYmlsZS1uYXYgLnNlYXJjaC1tb2RhbFwiKSB8fCBlLnRhcmdldC5jbG9zZXN0KFwiLm1vYmlsZS1uYXYgLmpzLXNlYXJjaC10b2dnbGVcIikpXG4gICAgICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgICAgc2VhcmNoQ29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoXCJzaG93XCIpO1xuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgZGVza3RvcFN1Yk5hdnMoKSB7XG4gICAgICAgIGNvbnN0IGRlc2t0b3BTdWJOYXZzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnW2RhdGEtc3VibmF2PVwidHJ1ZVwiXScpO1xuICAgICAgICBkZXNrdG9wU3ViTmF2cy5mb3JFYWNoKChkZXNrdG9wU3ViTmF2KSA9PiB7XG4gICAgICAgICAgICBjb25zdCBob3ZlckxpbmsgPSBkZXNrdG9wU3ViTmF2LnF1ZXJ5U2VsZWN0b3IoXCIuZGVza3RvcC1uYXZfX2xpbmtcIik7XG5cbiAgICAgICAgICAgIGRlc2t0b3BTdWJOYXYuYWRkRXZlbnRMaXN0ZW5lcihcIm1vdXNlb3ZlclwiLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgdGhpcy5zZXRBdHRyaWJ1dGUoXCJkYXRhLXN0YXRlXCIsIFwiYWN0aXZlXCIpO1xuICAgICAgICAgICAgICAgIGhvdmVyTGluay5zZXRBdHRyaWJ1dGUoXCJkYXRhLXN0YXRlXCIsIFwiYWN0aXZlXCIpO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgIGRlc2t0b3BTdWJOYXYuYWRkRXZlbnRMaXN0ZW5lcihcIm1vdXNlb3V0XCIsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICB0aGlzLnNldEF0dHJpYnV0ZShcImRhdGEtc3RhdGVcIiwgXCJpbmFjdGl2ZVwiKTtcbiAgICAgICAgICAgICAgICBob3Zlckxpbmsuc2V0QXR0cmlidXRlKFwiZGF0YS1zdGF0ZVwiLCBcImluYWN0aXZlXCIpO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgIGhvdmVyTGluay5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG4gICAgfSxcblxuICAgIG5hdlRhYnMoKSB7XG4gICAgICAgIGNvbnN0IHRhYkxpbmtzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5zaXRlLW5hdmlnYXRpb24gYS50eXBlLXRhYlwiKTtcblxuICAgICAgICB0YWJMaW5rcy5mb3JFYWNoKCh0YWJMaW5rKSA9PiB7XG4gICAgICAgICAgICB0YWJMaW5rLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICAgICAgICAgIHRhYkxpbmtzLmZvckVhY2goKHRhYkFuY2hvcikgPT4ge1xuICAgICAgICAgICAgICAgICAgICB0YWJBbmNob3IuY2xhc3NMaXN0LnJlbW92ZShcImFjdGl2ZVwiKTtcbiAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgIHRhYkxpbmsuY2xhc3NMaXN0LmFkZChcImFjdGl2ZVwiKTtcblxuICAgICAgICAgICAgICAgIGNvbnN0IHRhYlRhcmdldCA9IHRhYkxpbmsuZGF0YXNldC50YWI7XG4gICAgICAgICAgICAgICAgY29uc3QgdGFiID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihgW2RhdGEtdGFiLXBhbmVsPVwiJHt0YWJUYXJnZXR9XCJdYCk7XG4gICAgICAgICAgICAgICAgY29uc3QgdGFiQ2xvbmUgPSB0YWIuY2xvbmVOb2RlKHRydWUpO1xuICAgICAgICAgICAgICAgIGNvbnN0IGFjdGl2ZVRhYiA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuc2l0ZS1uYXZpZ2F0aW9uIC5uYXYtY29udGVudCAudGFiLXBhbmVsXCIpO1xuXG4gICAgICAgICAgICAgICAgYWN0aXZlVGFiLnJlcGxhY2VXaXRoKHRhYkNsb25lKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcblxuICAgICAgICBjb25zdCBtdXRhdGlvbk9ic2VydmVyID0gbmV3IE11dGF0aW9uT2JzZXJ2ZXIoKG11dGF0aW9ucykgPT4ge1xuICAgICAgICAgICAgbXV0YXRpb25zLmZvckVhY2goKG11dGF0aW9uKSA9PiB7XG4gICAgICAgICAgICAgICAgaWYgKG11dGF0aW9uLnR5cGUgPT09IFwiY2hpbGRMaXN0XCIpIHtcbiAgICAgICAgICAgICAgICAgICAgY29uc3QgYWN0aXZlVGFiID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5zaXRlLW5hdmlnYXRpb24gLm5hdi1jb250ZW50IC50YWItcGFuZWxcIik7XG4gICAgICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoKCkgPT4ge1xuICAgICAgICAgICAgICAgICAgICAgICAgYWN0aXZlVGFiLmNsYXNzTGlzdC5hZGQoXCJzaG93XCIpO1xuICAgICAgICAgICAgICAgICAgICB9LCAyMDApO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcblxuICAgICAgICBjb25zdCBuYXZDb250ZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5zaXRlLW5hdmlnYXRpb24gLm5hdi1jb250ZW50XCIpO1xuXG4gICAgICAgIG11dGF0aW9uT2JzZXJ2ZXIub2JzZXJ2ZShuYXZDb250ZW50LCB7XG4gICAgICAgICAgICBjaGlsZExpc3Q6IHRydWUsXG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBtb2JpbGVOYXZTZWN0aW9uVG9nZ2xlKCkge1xuICAgICAgICBjb25zdCBtb2JpbGVUb2dnbGVMaW5rcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIubW9iaWxlLW5hdiAuanMtbW9iaWxlLW5hdi10b2dnbGVcIik7XG5cbiAgICAgICAgbW9iaWxlVG9nZ2xlTGlua3MuZm9yRWFjaCgodG9nZ2xlTGluaykgPT4ge1xuICAgICAgICAgICAgdG9nZ2xlTGluay5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKGUpID0+IHtcbiAgICAgICAgICAgICAgICBjb25zdCB0YXJnZXRTZWN0aW9uSUQgPSB0b2dnbGVMaW5rLmRhdGFzZXQuc2VjdGlvbklkO1xuICAgICAgICAgICAgICAgIGNvbnN0IHRhcmdldFNlY3Rpb24gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKGAubW9iaWxlLW5hdi1ib2R5W2RhdGEtc2VjdGlvbj1cIiR7dGFyZ2V0U2VjdGlvbklEfVwiXWApO1xuXG4gICAgICAgICAgICAgICAgdGFyZ2V0U2VjdGlvbi5jbGFzc0xpc3QudG9nZ2xlKFwiYWN0aXZlXCIpO1xuICAgICAgICAgICAgICAgIHRvZ2dsZUxpbmsuY2xhc3NMaXN0LnRvZ2dsZShcImFjdGl2ZVwiKTtcblxuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgbW9iaWxlTmF2VG9nZ2xlKCkge1xuICAgICAgICBjb25zdCBtb2JpbGVDbG9zZVRvZ2dsZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuanMtbW9iaWxlLW5hdi10cmlnZ2VyXCIpO1xuXG4gICAgICAgIG1vYmlsZUNsb3NlVG9nZ2xlLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgbW9iaWxlTmF2LmNsYXNzTGlzdC50b2dnbGUoXCJvcGVuXCIpO1xuXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBtb2JpbGVOYXZDbG9zZSgpIHtcbiAgICAgICAgY29uc3QgbW9iaWxlQ2xvc2VCdG4gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLmpzLW1vYmlsZS1uYXYtY2xvc2VcIik7XG5cbiAgICAgICAgbW9iaWxlQ2xvc2VCdG4uYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XG4gICAgICAgICAgICBtb2JpbGVOYXYuY2xhc3NMaXN0LnJlbW92ZShcIm9wZW5cIik7XG5cbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgfSk7XG4gICAgfSxcblxuICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdGhpcy5lc2MoKTtcbiAgICAgICAgdGhpcy5kZXNrdG9wU3ViTmF2cygpO1xuICAgICAgICB0aGlzLnNlYXJjaFRvZ2dsZSgpO1xuICAgICAgICB0aGlzLm1vYmlsZVNlYXJjaFRvZ2dsZSgpO1xuICAgICAgICB0aGlzLm5hdlRhYnMoKTtcbiAgICAgICAgdGhpcy5tb2JpbGVOYXZUb2dnbGUoKTtcbiAgICAgICAgdGhpcy5tb2JpbGVOYXZTZWN0aW9uVG9nZ2xlKCk7XG4gICAgICAgIHRoaXMubW9iaWxlTmF2Q2xvc2UoKTtcbiAgICB9LFxufTtcblxuZXhwb3J0IGRlZmF1bHQgSGVhZGVyO1xuIiwKICAgICJjb25zdCBBbmltYXRpb25zID0ge1xuICAgIGZhZGVJbigpIHtcblxuXG5cbiAgICB9LFxuICAgIGluaXQ6IGZ1bmN0aW9uKCkge1xuICAgICAgICB0aGlzLmZhZGVJbigpO1xuICAgIH0sXG59O1xuXG5leHBvcnQgZGVmYXVsdCBBbmltYXRpb25zOyIsCiAgICAiY29uc3QgVXRpbGl0aWVzID0ge1xuICAgIHByaW50KCkge1xuICAgICAgICBjb25zdCBwcmludExpbmtzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLmpzLXByaW50LWxpbmsnKTtcbiAgICAgICAgcHJpbnRMaW5rcy5mb3JFYWNoKChwcmludExpbmspID0+IHtcbiAgICAgICAgICAgIHByaW50TGluay5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIChlKSA9PiB7XG4gICAgICAgICAgICAgICAgd2luZG93LnByaW50KCk7XG5cbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG4gICAgfSxcblxuICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdGhpcy5wcmludCgpO1xuICAgIH0sXG59O1xuXG5leHBvcnQgZGVmYXVsdCBVdGlsaXRpZXM7XG4iLAogICAgImNvbnN0IENvbnRlbnQgPSB7XG4gICAgdG9nZ2xlUmVzb3VyY2VzU2lkZWJhcigpIHtcbiAgICAgICAgY29uc3QgdG9nZ2xlTGluayA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuanMtcmVzb3VyY2VzLXNpZGViYXItdG9nZ2xlXCIpO1xuICAgICAgICBpZiAodG9nZ2xlTGluaykge1xuICAgICAgICAgICAgY29uc3Qgc2lkZWJhciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIucmVzb3VyY2VzLXNpZGViYXItbmF2XCIpO1xuICAgICAgICAgICAgY29uc3Qgc2hvd1RleHQgPSB0b2dnbGVMaW5rLmRhdGFzZXQuc2hvdztcbiAgICAgICAgICAgIGNvbnN0IGhpZGVUZXh0ID0gdG9nZ2xlTGluay5kYXRhc2V0LmhpZGU7XG5cbiAgICAgICAgICAgIHRvZ2dsZUxpbmsuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XG4gICAgICAgICAgICAgICAgc2lkZWJhci5jbGFzc0xpc3QudG9nZ2xlKFwic2hvd1wiKTtcblxuICAgICAgICAgICAgICAgIGNvbnN0IGlzU2hvd24gPSBzaWRlYmFyLmNsYXNzTGlzdC5jb250YWlucyhcInNob3dcIik7XG5cbiAgICAgICAgICAgICAgICBpZiAoaXNTaG93bikge1xuICAgICAgICAgICAgICAgICAgICB0b2dnbGVMaW5rLnRleHRDb250ZW50ID0gaGlkZVRleHQ7XG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgdG9nZ2xlTGluay50ZXh0Q29udGVudCA9IHNob3dUZXh0O1xuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgfSxcblxuICAgIHBhcnRuZXJzRmlsdGVyKCkge1xuICAgICAgICBjb25zdCBwYXJ0bmVyRmlsdGVyTGlua3MgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiLmpzLXBhcnRuZXItZmlsdGVyLWxpbmtcIik7XG4gICAgICAgIGNvbnN0IHBhcnRuZXJzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5wYXJ0bmVycy1ncmlkIC5wYXJ0bmVyXCIpO1xuXG4gICAgICAgIHBhcnRuZXJGaWx0ZXJMaW5rcy5mb3JFYWNoKChmaWx0ZXJMaW5rKSA9PiB7XG4gICAgICAgICAgICBmaWx0ZXJMaW5rLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgICAgIC8vIEFDVElWRSBUQUJcbiAgICAgICAgICAgICAgICBwYXJ0bmVyRmlsdGVyTGlua3MuZm9yRWFjaCgob3RoZXJMaW5rKSA9PiB7XG4gICAgICAgICAgICAgICAgICAgIG90aGVyTGluay5jbGFzc0xpc3QucmVtb3ZlKFwiYWN0aXZlXCIpO1xuICAgICAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICAgICAgZmlsdGVyTGluay5jbGFzc0xpc3QuYWRkKFwiYWN0aXZlXCIpO1xuICAgICAgICAgICAgICAgIGNvbnN0IGZpbHRlciA9IGZpbHRlckxpbmsuZGF0YXNldC5maWx0ZXI7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coZmlsdGVyKTtcblxuICAgICAgICAgICAgICAgIC8vIFNIT1cgT05MWSBGSUxURVJFRCBSRVNVTFRTXG4gICAgICAgICAgICAgICAgcGFydG5lcnMuZm9yRWFjaCgocGFydG5lcikgPT4ge1xuICAgICAgICAgICAgICAgICAgICBjb25zdCBpc0FjdGl2ZSA9IHBhcnRuZXIuY2xhc3NMaXN0LmNvbnRhaW5zKGZpbHRlcik7XG4gICAgICAgICAgICAgICAgICAgIGlmIChmaWx0ZXIgIT09IFwiYWxsXCIpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChpc0FjdGl2ZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHBhcnRuZXIuc3R5bGUuZGlzcGxheSA9IFwiYmxvY2tcIjtcbiAgICAgICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcGFydG5lci5zdHlsZS5kaXNwbGF5ID0gXCJub25lXCI7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBwYXJ0bmVyLnN0eWxlLmRpc3BsYXkgPSBcImJsb2NrXCI7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgbGVhZGVyQmlvcygpIHtcbiAgICAgICAgY29uc3QgYmlvVHJpZ2dlcnMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiLmxlYWRlcl9fYmlvLXRyaWdnZXJcIik7XG5cbiAgICAgICAgYmlvVHJpZ2dlcnMuZm9yRWFjaCgodHJpZ2dlcikgPT4ge1xuICAgICAgICAgICAgY29uc3QgbGVhZGVyID0gdHJpZ2dlci5jbG9zZXN0KFwiLmxlYWRlclwiKTtcbiAgICAgICAgICAgIGNvbnN0IGRpYWxvZyA9IGxlYWRlci5xdWVyeVNlbGVjdG9yKFwiLmxlYWRlcl9fYmlvXCIpO1xuICAgICAgICAgICAgY29uc3QgY2xvc2VCdXR0b24gPSBkaWFsb2cucXVlcnlTZWxlY3RvcihcIi5sZWFkZXJfX2Jpby1jbG9zZVwiKTtcblxuICAgICAgICAgICAgLy8gT3BlbiBkaWFsb2dcbiAgICAgICAgICAgIHRyaWdnZXIuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsICgpID0+IHtcbiAgICAgICAgICAgICAgICBkaWFsb2cuc2hvd01vZGFsKCk7XG4gICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgLy8gQ2xvc2Ugd2l0aCBidXR0b25cbiAgICAgICAgICAgIGNsb3NlQnV0dG9uLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoKSA9PiB7XG4gICAgICAgICAgICAgICAgZGlhbG9nLmNsb3NlKCk7XG4gICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgLy8gQ2xvc2Ugd2hlbiBjbGlja2luZyBvdXRzaWRlXG4gICAgICAgICAgICBkaWFsb2cuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XG4gICAgICAgICAgICAgICAgY29uc3QgZGlhbG9nRGltZW5zaW9ucyA9IGRpYWxvZy5nZXRCb3VuZGluZ0NsaWVudFJlY3QoKTtcbiAgICAgICAgICAgICAgICBpZiAoXG4gICAgICAgICAgICAgICAgICAgIGUuY2xpZW50WCA8IGRpYWxvZ0RpbWVuc2lvbnMubGVmdCB8fFxuICAgICAgICAgICAgICAgICAgICBlLmNsaWVudFggPiBkaWFsb2dEaW1lbnNpb25zLnJpZ2h0IHx8XG4gICAgICAgICAgICAgICAgICAgIGUuY2xpZW50WSA8IGRpYWxvZ0RpbWVuc2lvbnMudG9wIHx8XG4gICAgICAgICAgICAgICAgICAgIGUuY2xpZW50WSA+IGRpYWxvZ0RpbWVuc2lvbnMuYm90dG9tXG4gICAgICAgICAgICAgICAgKSB7XG4gICAgICAgICAgICAgICAgICAgIGRpYWxvZy5jbG9zZSgpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgZnV0dXJlRmVhdHVyZXNUb2dnbGUoKSB7XG4gICAgICAgIGNvbnN0IGZlYXR1cmVJdGVtcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIuZnV0dXJlLWZlYXR1cmVzX19pdGVtXCIpO1xuXG4gICAgICAgIGZlYXR1cmVJdGVtcy5mb3JFYWNoKChpdGVtKSA9PiB7XG4gICAgICAgICAgICBjb25zdCBoZWFkbGluZSA9IGl0ZW0ucXVlcnlTZWxlY3RvcihcIi5mdXR1cmUtZmVhdHVyZXNfX2hlYWRsaW5lXCIpO1xuICAgICAgICAgICAgY29uc3QgY29weSA9IGl0ZW0ucXVlcnlTZWxlY3RvcihcIi5mdXR1cmUtZmVhdHVyZXNfX2NvcHlcIik7XG4gICAgICAgICAgICBjb25zdCBpY29uID0gaGVhZGxpbmUucXVlcnlTZWxlY3RvcihcIi5pY29uIHN2Z1wiKTtcblxuICAgICAgICAgICAgaWYgKGhlYWRsaW5lICYmIGNvcHkpIHtcbiAgICAgICAgICAgICAgICBoZWFkbGluZS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKCkgPT4ge1xuICAgICAgICAgICAgICAgICAgICBjb25zdCBpc0hpZGRlbiA9IGNvcHkuc3R5bGUuZGlzcGxheSA9PT0gXCJub25lXCIgfHwgY29weS5zdHlsZS5kaXNwbGF5ID09PSBcIlwiO1xuXG4gICAgICAgICAgICAgICAgICAgIGlmIChpc0hpZGRlbikge1xuICAgICAgICAgICAgICAgICAgICAgICAgY29weS5zdHlsZS5kaXNwbGF5ID0gXCJibG9ja1wiO1xuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGljb24pIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpY29uLnN0eWxlLnRyYW5zZm9ybSA9IFwicm90YXRlKDE4MGRlZylcIjtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvcHkuc3R5bGUuZGlzcGxheSA9IFwibm9uZVwiO1xuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGljb24pIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpY29uLnN0eWxlLnRyYW5zZm9ybSA9IFwicm90YXRlKDBkZWcpXCI7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgfSxcblxuICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdGhpcy50b2dnbGVSZXNvdXJjZXNTaWRlYmFyKCk7XG4gICAgICAgIHRoaXMucGFydG5lcnNGaWx0ZXIoKTtcbiAgICAgICAgdGhpcy5sZWFkZXJCaW9zKCk7XG4gICAgICAgIHRoaXMuZnV0dXJlRmVhdHVyZXNUb2dnbGUoKTtcbiAgICB9LFxufTtcblxuZXhwb3J0IGRlZmF1bHQgQ29udGVudDtcbiIsCiAgICAiLy8gRHluYW1pY2FsbHkgaW1wb3J0IFN3aXBlciBvbmx5IHdoZW4gbmVlZGVkXG5sZXQgU3dpcGVyID0gbnVsbDtcbmxldCBzd2lwZXJMb2FkaW5nID0gZmFsc2U7XG5cbmFzeW5jIGZ1bmN0aW9uIGxvYWRTd2lwZXIoKSB7XG4gICAgaWYgKFN3aXBlcikgcmV0dXJuIFN3aXBlcjtcblxuICAgIGlmIChzd2lwZXJMb2FkaW5nKSB7XG4gICAgICAgIC8vIFdhaXQgZm9yIGV4aXN0aW5nIGxvYWQgdG8gY29tcGxldGVcbiAgICAgICAgd2hpbGUgKHN3aXBlckxvYWRpbmcpIHtcbiAgICAgICAgICAgIGF3YWl0IG5ldyBQcm9taXNlKChyZXNvbHZlKSA9PiBzZXRUaW1lb3V0KHJlc29sdmUsIDEwKSk7XG4gICAgICAgIH1cbiAgICAgICAgcmV0dXJuIFN3aXBlcjtcbiAgICB9XG5cbiAgICBzd2lwZXJMb2FkaW5nID0gdHJ1ZTtcbiAgICB0cnkge1xuICAgICAgICBjb25zdCBtb2R1bGUgPSBhd2FpdCBpbXBvcnQoXCJodHRwczovL2Nkbi5qc2RlbGl2ci5uZXQvbnBtL3N3aXBlckA4L3N3aXBlci1idW5kbGUuZXNtLmJyb3dzZXIubWluLmpzXCIpO1xuICAgICAgICBTd2lwZXIgPSBtb2R1bGUuZGVmYXVsdDtcbiAgICAgICAgcmV0dXJuIFN3aXBlcjtcbiAgICB9IGZpbmFsbHkge1xuICAgICAgICBzd2lwZXJMb2FkaW5nID0gZmFsc2U7XG4gICAgfVxufVxuXG5jb25zdCBNb2RhbCA9IHtcbiAgICBtb2RhbHM6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgTWljcm9Nb2RhbC5pbml0KHtcbiAgICAgICAgICAgIG9uQ2xvc2U6ICgpID0+IHtcbiAgICAgICAgICAgICAgICBjb25zdCB2aWRlb1BsYXllcnMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiLm1vZGFsX19jb250ZW50IC52aWRlby1wbGF5ZXJcIik7XG5cbiAgICAgICAgICAgICAgICB2aWRlb1BsYXllcnMuZm9yRWFjaCgocGxheWVyKSA9PiB7XG4gICAgICAgICAgICAgICAgICAgIGNvbnN0IGlmcmFtZSA9IHBsYXllci5xdWVyeVNlbGVjdG9yKFwiaWZyYW1lXCIpO1xuICAgICAgICAgICAgICAgICAgICBpZnJhbWUuc2V0QXR0cmlidXRlKFwic3JjXCIsIFwiXCIpO1xuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIGF3YWl0T3BlbkFuaW1hdGlvbjogdHJ1ZSxcbiAgICAgICAgfSk7XG4gICAgfSxcblxuICAgIHZpZGVvTW9kYWw6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgY29uc3QgdmlkZW9MaW5rcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIuanMtdmlkZW8tbW9kYWxcIik7XG5cbiAgICAgICAgdmlkZW9MaW5rcy5mb3JFYWNoKChsaW5rKSA9PiB7XG4gICAgICAgICAgICBjb25zdCBtb2RhbFRhcmdldCA9IGxpbmsuZGF0YXNldC5taWNyb21vZGFsVHJpZ2dlcjtcbiAgICAgICAgICAgIGNvbnN0IG1vZGFsID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQobW9kYWxUYXJnZXQpO1xuICAgICAgICAgICAgY29uc3QgdmlkZW9QbGF5ZXIgPSBtb2RhbC5xdWVyeVNlbGVjdG9yKFwiLnZpZGVvLXBsYXllclwiKTtcbiAgICAgICAgICAgIGNvbnN0IGlmcmFtZSA9IHZpZGVvUGxheWVyLnF1ZXJ5U2VsZWN0b3IoXCJpZnJhbWVcIik7XG4gICAgICAgICAgICBjb25zdCBhdXRvcGxheVVybCA9IHZpZGVvUGxheWVyLmRhdGFzZXQuYXV0b3BsYXlVcmw7XG5cbiAgICAgICAgICAgIGxpbmsuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XG4gICAgICAgICAgICAgICAgaWZyYW1lLnNldEF0dHJpYnV0ZShcInNyY1wiLCBhdXRvcGxheVVybCk7XG5cbiAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG4gICAgfSxcblxuICAgIGFjUGx1c01vZGFsOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0IGFjUGx1c0xpbmtzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5qcy1hYy1wbHVzLW1vZGFsXCIpO1xuXG4gICAgICAgIGFjUGx1c0xpbmtzLmZvckVhY2goKGxpbmspID0+IHtcbiAgICAgICAgICAgIGxpbmsuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGFzeW5jIChlKSA9PiB7XG4gICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgICAgICAgICAgICAgY29uc3Qgc2xpZGVJbmRleCA9IGxpbmsuZGF0YXNldC5zbGlkZUluZGV4O1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHNsaWRlSW5kZXgpO1xuXG4gICAgICAgICAgICAgICAgLy8gTG9hZCBTd2lwZXIgb25seSB3aGVuIG1vZGFsIGlzIHRyaWdnZXJlZFxuICAgICAgICAgICAgICAgIGNvbnN0IFN3aXBlckNsYXNzID0gYXdhaXQgbG9hZFN3aXBlcigpO1xuXG4gICAgICAgICAgICAgICAgY29uc3QgYWNQbHVzU3dpcGVyID0gbmV3IFN3aXBlckNsYXNzKFwiLnN3aXBlclwiLCB7XG4gICAgICAgICAgICAgICAgICAgIGF1dG9wbGF5OiBmYWxzZSxcbiAgICAgICAgICAgICAgICAgICAgc3BlZWQ6IDYwMCxcbiAgICAgICAgICAgICAgICAgICAgc3BhY2VCZXR3ZWVuOiAwLFxuICAgICAgICAgICAgICAgICAgICBpbml0aWFsU2xpZGU6IHBhcnNlRmxvYXQoc2xpZGVJbmRleCksXG4gICAgICAgICAgICAgICAgICAgIGdyYWJDdXJzb3I6IHRydWUsXG4gICAgICAgICAgICAgICAgICAgIGxvb3A6IHRydWUsXG4gICAgICAgICAgICAgICAgICAgIG5hdmlnYXRpb246IGZhbHNlLFxuICAgICAgICAgICAgICAgICAgICBwYWdpbmF0aW9uOiB7XG4gICAgICAgICAgICAgICAgICAgICAgICBlbDogXCIuc3dpcGVyLXBhZ2luYXRpb25cIixcbiAgICAgICAgICAgICAgICAgICAgICAgIHR5cGU6IFwiYnVsbGV0c1wiLFxuICAgICAgICAgICAgICAgICAgICAgICAgY2xpY2thYmxlOiB0cnVlLFxuICAgICAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBsZWFkZXJzaGlwTW9kYWw6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgY29uc3QgbGVhZGVyc2hpcExpbmtzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5qcy1sZWFkZXItbW9kYWxcIik7XG5cbiAgICAgICAgbGVhZGVyc2hpcExpbmtzLmZvckVhY2goKGxpbmspID0+IHtcbiAgICAgICAgICAgIGxpbmsuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PiB7XG4gICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBmb3JtTW9kYWxzOiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0IGZvcm1MaW5rcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIuanMtZm9ybS10cmlnZ2VyXCIpO1xuXG4gICAgICAgIGZvcm1MaW5rcy5mb3JFYWNoKChsaW5rKSA9PiB7XG4gICAgICAgICAgICBsaW5rLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4ge1xuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcbiAgICB9LFxuXG4gICAgbmFiTW9kYWw6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgY29uc3QgbW9kYWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiI25hYlwiKTtcblxuICAgICAgICAvLyBFYXJseSByZXR1cm4gaWYgbW9kYWwgZG9lc24ndCBleGlzdFxuICAgICAgICBpZiAoIW1vZGFsKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICAvLyBEb24ndCBzaG93IG1vZGFsIG9uIHRoZSB0YXJnZXQgcGFnZSBpdHNlbGZcbiAgICAgICAgY29uc3QgY3VycmVudFBhdGggPSB3aW5kb3cubG9jYXRpb24ucGF0aG5hbWU7XG4gICAgICAgIGlmIChjdXJyZW50UGF0aC5pbmNsdWRlcyhcIi9zb2x1dGlvbnMvY29ycG9yYXRlLWNyZWF0aXZlL1wiKSkge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgY29uc3Qgc2hvd01vZGFsQXRsYXNDQyA9IGxvY2FsU3RvcmFnZS5nZXRJdGVtKFwic2hvd01vZGFsQXRsYXNDQ1wiKTtcblxuICAgICAgICBpZiAoc2Vzc2lvblN0b3JhZ2UuYXRsYXNfY2NfcGFnZUNvdW50KSB7XG4gICAgICAgICAgICBzZXNzaW9uU3RvcmFnZS5hdGxhc19jY19wYWdlQ291bnQgPSBOdW1iZXIoc2Vzc2lvblN0b3JhZ2UuYXRsYXNfY2NfcGFnZUNvdW50KSArIDE7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBzZXNzaW9uU3RvcmFnZS5hdGxhc19jY19wYWdlQ291bnQgPSAxO1xuICAgICAgICB9XG5cbiAgICAgICAgaWYgKHNlc3Npb25TdG9yYWdlLmF0bGFzX2NjX3BhZ2VDb3VudCA9PSAxKSB7XG4gICAgICAgICAgICBpZiAoc2hvd01vZGFsQXRsYXNDQyA9PSBudWxsKSB7XG4gICAgICAgICAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oXCJzaG93TW9kYWxBdGxhc0NDXCIsIDEpO1xuICAgICAgICAgICAgICAgIE1pY3JvTW9kYWwuc2hvdyhcIm5hYlwiKTtcbiAgICAgICAgICAgIH0gZWxzZSBpZiAoc2hvd01vZGFsQXRsYXNDQyA+PSAxICYmIHNob3dNb2RhbEF0bGFzQ0MgPD0gNSkge1xuICAgICAgICAgICAgICAgIHZhciB2aXNpdF9jb3VudCA9IHBhcnNlSW50KGxvY2FsU3RvcmFnZS5nZXRJdGVtKFwic2hvd01vZGFsQXRsYXNDQ1wiKSk7XG4gICAgICAgICAgICAgICAgdmlzaXRfY291bnQrKztcbiAgICAgICAgICAgICAgICBsb2NhbFN0b3JhZ2Uuc2V0SXRlbShcInNob3dNb2RhbEF0bGFzQ0NcIiwgdmlzaXRfY291bnQpO1xuICAgICAgICAgICAgICAgIE1pY3JvTW9kYWwuc2hvdyhcIm5hYlwiKTtcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgdmFyIHZpc2l0X2NvdW50ID0gcGFyc2VJbnQobG9jYWxTdG9yYWdlLmdldEl0ZW0oXCJzaG93TW9kYWxBdGxhc0NDXCIpKTtcbiAgICAgICAgICAgICAgICB2aXNpdF9jb3VudCsrO1xuICAgICAgICAgICAgICAgIGxvY2FsU3RvcmFnZS5zZXRJdGVtKFwic2hvd01vZGFsQXRsYXNDQ1wiLCB2aXNpdF9jb3VudCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cblxuICAgICAgICAvL01pY3JvTW9kYWwuc2hvdyhcIm5hYlwiKTtcbiAgICB9LFxuXG4gICAgaG9tZUhlcm9Td2lwZXI6IGFzeW5jIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgY29uc3QgaGVyb1N3aXBlckVsZW1lbnQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLmhlcm8tc3dpcGVyXCIpO1xuXG4gICAgICAgIC8vIE9ubHkgaW5pdGlhbGl6ZSBpZiB0aGUgaGVybyBzd2lwZXIgZWxlbWVudCBleGlzdHNcbiAgICAgICAgaWYgKCFoZXJvU3dpcGVyRWxlbWVudCkge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgLy8gTG9hZCBTd2lwZXIgb25seSB3aGVuIG5lZWRlZFxuICAgICAgICBjb25zdCBTd2lwZXJDbGFzcyA9IGF3YWl0IGxvYWRTd2lwZXIoKTtcblxuICAgICAgICAvLyBBZGQgYSBzbWFsbCBkZWxheSB0byBlbnN1cmUgRE9NIGlzIHN0YWJsZSBiZWZvcmUgaW5pdGlhbGl6YXRpb25cbiAgICAgICAgYXdhaXQgbmV3IFByb21pc2UoKHJlc29sdmUpID0+IHNldFRpbWVvdXQocmVzb2x2ZSwgMTAwKSk7XG5cbiAgICAgICAgY29uc3QgaGVyb1N3aXBlciA9IG5ldyBTd2lwZXJDbGFzcyhcIi5oZXJvLXN3aXBlclwiLCB7XG4gICAgICAgICAgICBhdXRvcGxheToge1xuICAgICAgICAgICAgICAgIGRlbGF5OiA0MDAwLFxuICAgICAgICAgICAgICAgIGRpc2FibGVPbkludGVyYWN0aW9uOiBmYWxzZSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBzcGVlZDogNjAwLFxuICAgICAgICAgICAgZWZmZWN0OiBcImZhZGVcIixcbiAgICAgICAgICAgIGZhZGVFZmZlY3Q6IHtcbiAgICAgICAgICAgICAgICBjcm9zc0ZhZGU6IHRydWUsXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgc3BhY2VCZXR3ZWVuOiAwLFxuICAgICAgICAgICAgZ3JhYkN1cnNvcjogdHJ1ZSxcbiAgICAgICAgICAgIGxvb3A6IHRydWUsXG4gICAgICAgICAgICBuYXZpZ2F0aW9uOiBmYWxzZSxcbiAgICAgICAgICAgIHBhZ2luYXRpb246IHtcbiAgICAgICAgICAgICAgICBlbDogXCIuc3dpcGVyLXBhZ2luYXRpb25cIixcbiAgICAgICAgICAgICAgICB0eXBlOiBcImJ1bGxldHNcIixcbiAgICAgICAgICAgICAgICBjbGlja2FibGU6IHRydWUsXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgLy8gRW5zdXJlIHNtb290aCBpbml0aWFsaXphdGlvbiBhbmQgcGVyZm9ybWFuY2Ugb3B0aW1pemF0aW9uc1xuICAgICAgICAgICAgb2JzZXJ2ZXI6IHRydWUsXG4gICAgICAgICAgICBvYnNlcnZlUGFyZW50czogdHJ1ZSxcbiAgICAgICAgICAgIHdhdGNoU2xpZGVzUHJvZ3Jlc3M6IHRydWUsXG4gICAgICAgICAgICB3YXRjaFNsaWRlc1Zpc2liaWxpdHk6IHRydWUsXG4gICAgICAgICAgICAvLyBPcHRpbWl6ZSBmb3IgcGVyZm9ybWFuY2VcbiAgICAgICAgICAgIHByZWxvYWRJbWFnZXM6IGZhbHNlLFxuICAgICAgICAgICAgbGF6eToge1xuICAgICAgICAgICAgICAgIGxvYWRQcmV2TmV4dDogdHJ1ZSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAvLyBDYWxsYmFjayB0byByZW1vdmUgaW5pdGlhbGl6YXRpb24gYmxvY2tlciBjbGFzc1xuICAgICAgICAgICAgb246IHtcbiAgICAgICAgICAgICAgICBpbml0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgIGhlcm9Td2lwZXJFbGVtZW50LmNsYXNzTGlzdC5hZGQoXCJzd2lwZXItaW5pdGlhbGl6ZWRcIik7XG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgIH0pO1xuICAgIH0sXG5cbiAgICBob21lVmFsdWVzU3dpcGVyOiBhc3luYyBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0IHZhbHVlc1N3aXBlckVsZW1lbnQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLnZhbHVlcy1zd2lwZXJcIik7XG5cbiAgICAgICAgLy8gT25seSBpbml0aWFsaXplIGlmIHRoZSB2YWx1ZXMgc3dpcGVyIGVsZW1lbnQgZXhpc3RzXG4gICAgICAgIGlmICghdmFsdWVzU3dpcGVyRWxlbWVudCkge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgLy8gTG9hZCBTd2lwZXIgb25seSB3aGVuIG5lZWRlZFxuICAgICAgICBjb25zdCBTd2lwZXJDbGFzcyA9IGF3YWl0IGxvYWRTd2lwZXIoKTtcblxuICAgICAgICAvLyBBZGQgYSBzbWFsbCBkZWxheSB0byBlbnN1cmUgRE9NIGlzIHN0YWJsZSBiZWZvcmUgaW5pdGlhbGl6YXRpb25cbiAgICAgICAgYXdhaXQgbmV3IFByb21pc2UoKHJlc29sdmUpID0+IHNldFRpbWVvdXQocmVzb2x2ZSwgMTAwKSk7XG5cbiAgICAgICAgY29uc3QgdmFsdWVzU3dpcGVyID0gbmV3IFN3aXBlckNsYXNzKFwiLnZhbHVlcy1zd2lwZXJcIiwge1xuICAgICAgICAgICAgYXV0b3BsYXk6IHtcbiAgICAgICAgICAgICAgICBkZWxheTogNDAwMCxcbiAgICAgICAgICAgICAgICBkaXNhYmxlT25JbnRlcmFjdGlvbjogZmFsc2UsXG4gICAgICAgICAgICAgICAgcGF1c2VPbk1vdXNlRW50ZXI6IHRydWUsXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgc3BlZWQ6IDYwMCxcbiAgICAgICAgICAgIHNsaWRlc1BlclZpZXc6IDEsXG4gICAgICAgICAgICBzcGFjZUJldHdlZW46IDI0LFxuICAgICAgICAgICAgZ3JhYkN1cnNvcjogdHJ1ZSxcbiAgICAgICAgICAgIGxvb3A6IHRydWUsXG4gICAgICAgICAgICBuYXZpZ2F0aW9uOiB7XG4gICAgICAgICAgICAgICAgbmV4dEVsOiBcIi52YWx1ZXMtc3dpcGVyIC5zd2lwZXItYnV0dG9uLW5leHRcIixcbiAgICAgICAgICAgICAgICBwcmV2RWw6IFwiLnZhbHVlcy1zd2lwZXIgLnN3aXBlci1idXR0b24tcHJldlwiLFxuICAgICAgICAgICAgfSxcblxuICAgICAgICAgICAgYnJlYWtwb2ludHM6IHtcbiAgICAgICAgICAgICAgICA3Njg6IHtcbiAgICAgICAgICAgICAgICAgICAgc2xpZGVzUGVyVmlldzogMixcbiAgICAgICAgICAgICAgICAgICAgc3BhY2VCZXR3ZWVuOiAyNCxcbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgIDk5Mjoge1xuICAgICAgICAgICAgICAgICAgICBzbGlkZXNQZXJWaWV3OiAzLFxuICAgICAgICAgICAgICAgICAgICBzcGFjZUJldHdlZW46IDI0LFxuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgMTYwMDoge1xuICAgICAgICAgICAgICAgICAgICBzbGlkZXNQZXJWaWV3OiA0LFxuICAgICAgICAgICAgICAgICAgICBzcGFjZUJldHdlZW46IDI0LFxuICAgICAgICAgICAgICAgIH0sXG5cbiAgICAgICAgICAgICAgICAxOTIwOiB7XG4gICAgICAgICAgICAgICAgICAgIHNsaWRlc1BlclZpZXc6IDUsXG4gICAgICAgICAgICAgICAgICAgIHNwYWNlQmV0d2VlbjogMjQsXG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAvLyBFbnN1cmUgc21vb3RoIGluaXRpYWxpemF0aW9uIGFuZCBwZXJmb3JtYW5jZSBvcHRpbWl6YXRpb25zXG4gICAgICAgICAgICBvYnNlcnZlcjogdHJ1ZSxcbiAgICAgICAgICAgIG9ic2VydmVQYXJlbnRzOiB0cnVlLFxuICAgICAgICAgICAgd2F0Y2hTbGlkZXNQcm9ncmVzczogdHJ1ZSxcbiAgICAgICAgICAgIHdhdGNoU2xpZGVzVmlzaWJpbGl0eTogdHJ1ZSxcbiAgICAgICAgICAgIC8vIE9wdGltaXplIGZvciBwZXJmb3JtYW5jZVxuICAgICAgICAgICAgcHJlbG9hZEltYWdlczogZmFsc2UsXG4gICAgICAgICAgICBsYXp5OiB7XG4gICAgICAgICAgICAgICAgbG9hZFByZXZOZXh0OiB0cnVlLFxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIC8vIENhbGxiYWNrIHRvIHJlbW92ZSBpbml0aWFsaXphdGlvbiBibG9ja2VyIGNsYXNzXG4gICAgICAgICAgICBvbjoge1xuICAgICAgICAgICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgdmFsdWVzU3dpcGVyRWxlbWVudC5jbGFzc0xpc3QuYWRkKFwic3dpcGVyLWluaXRpYWxpemVkXCIpO1xuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgc2xpZGVDaGFuZ2U6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgLy8gT3B0aW9uYWw6IEFkZCBhbnkgc2xpZGUgY2hhbmdlIGxvZ2ljIGhlcmVcbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgfSxcbiAgICAgICAgfSk7XG4gICAgfSxcbiAgICBpbml0OiBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHRoaXMubW9kYWxzKCk7XG4gICAgICAgIHRoaXMudmlkZW9Nb2RhbCgpO1xuICAgICAgICB0aGlzLmFjUGx1c01vZGFsKCk7XG4gICAgICAgIHRoaXMubGVhZGVyc2hpcE1vZGFsKCk7XG4gICAgICAgIHRoaXMuZm9ybU1vZGFscygpO1xuICAgICAgICB0aGlzLm5hYk1vZGFsKCk7XG4gICAgICAgIHRoaXMuaG9tZUhlcm9Td2lwZXIoKTtcbiAgICAgICAgdGhpcy5ob21lVmFsdWVzU3dpcGVyKCk7XG4gICAgfSxcbn07XG5cbmV4cG9ydCBkZWZhdWx0IE1vZGFsO1xuIiwKICAgICJjb25zdCBQcmljaW5nID0ge1xuICAgIGhlcm9QYWRkaW5nKCkge1xuICAgICAgICBjb25zdCBoZXJvID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5wYWdlLXRlbXBsYXRlLXByaWNpbmcgLmhlcm9cIik7XG4gICAgICAgIGNvbnN0IGZlYXR1cmVzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5wYWdlLXRlbXBsYXRlLXByaWNpbmcgLmZlYXR1cmVzXCIpO1xuICAgICAgICBjb25zdCBvdmVydmlldyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIucGFnZS10ZW1wbGF0ZS1wcmljaW5nIC5vdmVydmlld19fZ3JpZFwiKTtcblxuICAgICAgICBpZiAoaGVybyAmJiBmZWF0dXJlcyAmJiBvdmVydmlldykge1xuICAgICAgICAgICAgY29uc3QgYWRqdXN0UGFkZGluZyA9ICgpID0+IHtcbiAgICAgICAgICAgICAgICBpZiAod2luZG93LmlubmVyV2lkdGggPiA5OTIpIHtcbiAgICAgICAgICAgICAgICAgICAgY29uc3Qgb3ZlcnZpZXdIZWlnaHQgPSBvdmVydmlldy5vZmZzZXRIZWlnaHQ7XG4gICAgICAgICAgICAgICAgICAgIGNvbnN0IGhhbGZPdmVydmlld0hlaWdodCA9IG92ZXJ2aWV3SGVpZ2h0IC8gMjtcbiAgICAgICAgICAgICAgICAgICAgY29uc3QgcGFkZGluZ1ZhbHVlID0gYCR7aGFsZk92ZXJ2aWV3SGVpZ2h0fXB4YDtcbiAgICAgICAgICAgICAgICAgICAgaGVyby5zdHlsZS5wYWRkaW5nQm90dG9tID0gcGFkZGluZ1ZhbHVlO1xuICAgICAgICAgICAgICAgICAgICBmZWF0dXJlcy5zdHlsZS5tYXJnaW5Ub3AgPSBgLSR7aGFsZk92ZXJ2aWV3SGVpZ2h0fXB4YDtcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICBoZXJvLnN0eWxlLnBhZGRpbmdCb3R0b20gPSBcIlwiO1xuICAgICAgICAgICAgICAgICAgICBmZWF0dXJlcy5zdHlsZS5tYXJnaW5Ub3AgPSBcIlwiO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH07XG5cbiAgICAgICAgICAgIC8vIEhpZGUgY29udGVudCBpbml0aWFsbHlcbiAgICAgICAgICAgIGRvY3VtZW50LmJvZHkuc3R5bGUudmlzaWJpbGl0eSA9IFwiaGlkZGVuXCI7XG5cbiAgICAgICAgICAgIC8vIFByZS1jYWxjdWxhdGUgcGFkZGluZ1xuICAgICAgICAgICAgYWRqdXN0UGFkZGluZygpO1xuXG4gICAgICAgICAgICAvLyBTaG93IGNvbnRlbnQgYW5kIGFwcGx5IHRyYW5zaXRpb25zXG4gICAgICAgICAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcihcImxvYWRcIiwgKCkgPT4ge1xuICAgICAgICAgICAgICAgIGRvY3VtZW50LmJvZHkuc3R5bGUudmlzaWJpbGl0eSA9IFwidmlzaWJsZVwiO1xuICAgICAgICAgICAgICAgIGhlcm8uc3R5bGUudHJhbnNpdGlvbiA9IFwicGFkZGluZy1ib3R0b20gMC4zcyBlYXNlLWluLW91dFwiO1xuICAgICAgICAgICAgICAgIGZlYXR1cmVzLnN0eWxlLnRyYW5zaXRpb24gPSBcIm1hcmdpbi10b3AgMC4zcyBlYXNlLWluLW91dFwiO1xuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgIC8vIERlYm91bmNlIHRoZSByZXNpemUgZXZlbnQgaGFuZGxlclxuICAgICAgICAgICAgbGV0IHJlc2l6ZVRpbWVyO1xuICAgICAgICAgICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIoXCJyZXNpemVcIiwgKCkgPT4ge1xuICAgICAgICAgICAgICAgIGNsZWFyVGltZW91dChyZXNpemVUaW1lcik7XG4gICAgICAgICAgICAgICAgcmVzaXplVGltZXIgPSBzZXRUaW1lb3V0KGFkanVzdFBhZGRpbmcsIDI1MCk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgIH0sXG4gICAgdG9nZ2xlRmVhdHVyZUV4cGFuc2lvbigpIHtcbiAgICAgICAgY29uc3QgZmVhdHVyZU5hbWVzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5wYWdlLXRlbXBsYXRlLXByaWNpbmcgLmZlYXR1cmVzX190YWJsZS10ZC5uYW1lXCIpO1xuXG4gICAgICAgIGlmIChmZWF0dXJlTmFtZXMpIHtcbiAgICAgICAgICAgIGZlYXR1cmVOYW1lcy5mb3JFYWNoKChmZWF0dXJlTmFtZSkgPT4ge1xuICAgICAgICAgICAgICAgIGZlYXR1cmVOYW1lLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgIGlmICh3aW5kb3cuaW5uZXJXaWR0aCA+PSA3NjgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMuY2xhc3NMaXN0LnRvZ2dsZShcImV4cGFuZGVkXCIpO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgIH0sXG4gICAgaW5pdDogZnVuY3Rpb24gKCkge1xuICAgICAgICAvL3RoaXMuaGVyb1BhZGRpbmcoKTtcbiAgICAgICAgdGhpcy50b2dnbGVGZWF0dXJlRXhwYW5zaW9uKCk7XG4gICAgfSxcbn07XG5cbmV4cG9ydCBkZWZhdWx0IFByaWNpbmc7XG4iLAogICAgImltcG9ydCBIZWFkZXIgZnJvbSBcIi4vaGVhZGVyLmpzXCI7XG5pbXBvcnQgQW5pbWF0aW9ucyBmcm9tIFwiLi9hbmltYXRpb25zLmpzXCI7XG5pbXBvcnQgVXRpbGl0aWVzIGZyb20gXCIuL3V0aWxpdGllcy5qc1wiO1xuaW1wb3J0IENvbnRlbnQgZnJvbSBcIi4vY29udGVudC5qc1wiO1xuaW1wb3J0IE1vZGFscyBmcm9tIFwiLi9tb2RhbHMuanNcIjtcbmltcG9ydCBQcmljaW5nIGZyb20gXCIuL3ByaWNpbmcuanNcIjtcblxuKCgpID0+IHtcbiAgICBIZWFkZXIuaW5pdCgpO1xuICAgIEFuaW1hdGlvbnMuaW5pdCgpO1xuICAgIFV0aWxpdGllcy5pbml0KCk7XG4gICAgTW9kYWxzLmluaXQoKTtcbiAgICBDb250ZW50LmluaXQoKTtcbiAgICBQcmljaW5nLmluaXQoKTtcbn0pKCk7XG4iCiAgXSwKICAibWFwcGluZ3MiOiAiOzs7Ozs7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QUFRLFlBQVksVUFBVTtBQUFBLFFBQzlCLE1BQU0sZ0JBQWdCLE1BQU07QUFBQSxVQUN4QixJQUFJLE9BQU8sYUFBYSxLQUFLO0FBQUEsWUFDekIsTUFBTSxpQkFBaUIsU0FBUztBQUFBLFlBQ2hDLE1BQU0scUJBQXFCLGlCQUFpQjtBQUFBLFlBQzVDLE1BQU0sZUFBZSxHQUFHO0FBQUEsWUFDeEIsS0FBSyxNQUFNLGdCQUFnQjtBQUFBLFlBQzNCLFNBQVMsTUFBTSxZQUFZLElBQUk7QUFBQSxVQUNuQyxFQUFPO0FBQUEsWUFDSCxLQUFLLE1BQU0sZ0JBQWdCO0FBQUEsWUFDM0IsU0FBUyxNQUFNLFlBQVk7QUFBQTtBQUFBO0FBQUEsUUFLbkMsU0FBUyxLQUFLLE1BQU0sYUFBYTtBQUFBLFFBR2pDLGNBQWM7QUFBQSxRQUdkLE9BQU8saUJBQWlCLFFBQVEsTUFBTTtBQUFBLFVBQ2xDLFNBQVMsS0FBSyxNQUFNLGFBQWE7QUFBQSxVQUNqQyxLQUFLLE1BQU0sYUFBYTtBQUFBLFVBQ3hCLFNBQVMsTUFBTSxhQUFhO0FBQUEsU0FDL0I7QUFBQSxRQUdELElBQUk7QUFBQSxRQUNKLE9BQU8saUJBQWlCLFVBQVUsTUFBTTtBQUFBLFVBQ3BDLGFBQWEsV0FBVztBQUFBLFVBQ3hCLGNBQWMsV0FBVyxlQUFlLEdBQUc7QUFBQSxTQUM5QztBQUFBLE1BQ0w7QUFBQTtBQUFBLElBRUosc0JBQXNCLEdBQUc7QUFBQSxNQUNyQixNQUFNLGVBQWUsU0FBUyxpQkFBaUIsaURBQWlEO0FBQUEsTUFFaEcsSUFBSSxjQUFjO0FBQUEsUUFDZCxhQUFhLFFBQVEsQ0FBQyxnQkFBZ0I7QUFBQSxVQUNsQyxZQUFZLGlCQUFpQixTQUFTLFFBQVMsR0FBRztBQUFBLFlBQzlDLElBQUksT0FBTyxjQUFjLEtBQUs7QUFBQSxjQUMxQixLQUFLLFVBQVUsT0FBTyxVQUFVO0FBQUEsWUFDcEM7QUFBQSxXQUNIO0FBQUEsU0FDSjtBQUFBLE1BQ0w7QUFBQTtBQUFBLElBRUosTUFBTSxRQUFTLEdBQUc7QUFBQSxNQUVkLEtBQUssdUJBQXVCO0FBQUE7QUFBQSxFQUVwQztBQUFBLEVBRUEsSUFBZTs7O0dDckRkLE1BQU07QUFBQSxJQUNILGVBQU8sS0FBSztBQUFBLElBQ1osbUJBQVcsS0FBSztBQUFBLElBQ2hCLGtCQUFVLEtBQUs7QUFBQSxJQUNmLGVBQU8sS0FBSztBQUFBLElBQ1osZ0JBQVEsS0FBSztBQUFBLElBQ2IsZ0JBQVEsS0FBSztBQUFBLEtBQ2Q7IiwKICAiZGVidWdJZCI6ICJFREI1RDA3Njc1RUVBRjBCNjQ3NTZFMjE2NDc1NkUyMSIsCiAgIm5hbWVzIjogW10KfQ==
