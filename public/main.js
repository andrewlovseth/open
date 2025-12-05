// Bundled JavaScript - Do not edit directly, edit src/js/ files instead
(() => {
  var __create = Object.create;
  var __defProp = Object.defineProperty;
  var __getOwnPropDesc = Object.getOwnPropertyDescriptor;
  var __getOwnPropNames = Object.getOwnPropertyNames;
  var __getProtoOf = Object.getPrototypeOf;
  var __hasOwnProp = Object.prototype.hasOwnProperty;
  var __require = /* @__PURE__ */ ((x) => typeof require !== "undefined" ? require : typeof Proxy !== "undefined" ? new Proxy(x, {
    get: (a, b) => (typeof require !== "undefined" ? require : a)[b]
  }) : x)(function(x) {
    if (typeof require !== "undefined")
      return require.apply(this, arguments);
    throw Error('Dynamic require of "' + x + '" is not supported');
  });
  var __copyProps = (to, from, except, desc) => {
    if (from && typeof from === "object" || typeof from === "function") {
      for (let key of __getOwnPropNames(from))
        if (!__hasOwnProp.call(to, key) && key !== except)
          __defProp(to, key, { get: () => from[key], enumerable: !(desc = __getOwnPropDesc(from, key)) || desc.enumerable });
    }
    return to;
  };
  var __toESM = (mod, isNodeMode, target) => (target = mod != null ? __create(__getProtoOf(mod)) : {}, __copyProps(
    // If the importer is in node compatibility mode or this is not an ESM
    // file that has been converted to a CommonJS file using a Babel-
    // compatible transform (i.e. "__esModule" has not been set), then set
    // "default" to the CommonJS "module.exports" for node compatibility.
    isNodeMode || !mod || !mod.__esModule ? __defProp(target, "default", { value: mod, enumerable: true }) : target,
    mod
  ));

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
    fadeIn() {
    },
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
          delay: 4e3,
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
        // Ensure smooth initialization and performance optimizations
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        // Optimize for performance
        preloadImages: false,
        lazy: {
          loadPrevNext: true
        },
        // Callback to remove initialization blocker class
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
          delay: 4e3,
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
        // Ensure smooth initialization and performance optimizations
        observer: true,
        observeParents: true,
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        // Optimize for performance
        preloadImages: false,
        lazy: {
          loadPrevNext: true
        },
        // Callback to remove initialization blocker class
        on: {
          init: function() {
            valuesSwiperElement.classList.add("swiper-initialized");
          },
          slideChange: function() {
          }
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
//# sourceMappingURL=main.js.map
