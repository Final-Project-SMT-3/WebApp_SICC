(function () {
  "use strict";

  /**
   * Easy select element
   */
  const select = (el, all = false) => {
    el = el.trim();
    if (all) {
      return [...document.querySelectorAll(el)];
    } else {
      return document.querySelector(el);
    }
  };

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all);
    if (selectEl) {
      if (all) {
        selectEl.forEach((e) => e.addEventListener(type, listener));
      } else {
        selectEl.addEventListener(type, listener);
      }
    }
  };

  /**
   * Easy on scroll event listener
   */
  const onscroll = (el, listener) => {
    el.addEventListener("scroll", listener);
  };

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select("#navbarNav .scrollto", true);
  const navbarlinksActive = () => {
    let position = window.scrollY + 200;
    navbarlinks.forEach((navbarlink) => {
      if (!navbarlink.hash) return;
      let section = select(navbarlink.hash);
      if (!section) return;
      if (
        position >= section.offsetTop &&
        position <= section.offsetTop + section.offsetHeight
      ) {
        navbarlink.classList.add("active");
      } else {
        navbarlink.classList.remove("active");
      }
    });
  };
  window.addEventListener("load", navbarlinksActive);
  onscroll(document, navbarlinksActive);

  /**
   * Preloader
   */
  let preloader = select("#preloader");
  if (preloader) {
    window.addEventListener("load", () => {
      preloader.remove();
    });
  }

  /**
   * Scroll Navbar Effect
   */
  const navbarlinksBackground = () => {
    const navbar = document.getElementById("navbar");
    const navbarLink = document.getElementById("navbarLink");

    if (window.scrollY > 100) {
      navbar.classList.remove("transparent");
      navbar.classList.add("scrolled");

      navbarLink.classList.remove("hitam");
      navbarLink.classList.add("biru");
    } else {
      navbar.classList.remove("scrolled");
      navbar.classList.add("transparent");

      navbarLink.classList.remove("biru");
      navbarLink.classList.add("hitam");
    }
  };
  onscroll(window, navbarlinksBackground);
})();
