(function () {
  var nav = document.querySelector("[data-tml-nav]");
  if (!nav) return;

  function each(sel, fn) {
    Array.prototype.forEach.call(document.querySelectorAll(sel), fn);
  }

  /* ── Mega Menu ── */
  var hideTimer = null;

  function showPanel(panel) {
    if (hideTimer) { clearTimeout(hideTimer); hideTimer = null; }
    each("[data-tml-mega-panel]", function (p) {
      p.classList.add("opacity-0", "-translate-y-2", "pointer-events-none");
      p.classList.remove("opacity-100", "translate-y-0", "pointer-events-auto");
    });
    each("[data-tml-mega] svg.tml-chevron", function (c) {
      c.classList.remove("rotate-180");
    });
    panel.classList.remove("opacity-0", "-translate-y-2", "pointer-events-none");
    panel.classList.add("opacity-100", "translate-y-0", "pointer-events-auto");
    var parent = panel.getAttribute("data-tml-mega-panel");
    var trigger = document.querySelector('[data-tml-mega="' + parent + '"] svg.tml-chevron');
    if (trigger) trigger.classList.add("rotate-180");
  }

  function hidePanels() {
    each("[data-tml-mega-panel]", function (p) {
      p.classList.add("opacity-0", "-translate-y-2", "pointer-events-none");
      p.classList.remove("opacity-100", "translate-y-0", "pointer-events-auto");
    });
    each("[data-tml-mega] svg.tml-chevron", function (c) {
      c.classList.remove("rotate-180");
    });
  }

  function scheduledHide() {
    hideTimer = setTimeout(hidePanels, 150);
  }

  each("[data-tml-mega]", function (el) {
    var key = el.getAttribute("data-tml-mega");
    var panel = document.querySelector('[data-tml-mega-panel="' + key + '"]');
    if (!panel) return;
    el.addEventListener("mouseenter", function () { showPanel(panel); });
    el.addEventListener("mouseleave", scheduledHide);
    panel.addEventListener("mouseenter", function () {
      if (hideTimer) { clearTimeout(hideTimer); hideTimer = null; }
    });
    panel.addEventListener("mouseleave", scheduledHide);
  });
  window.addEventListener("scroll", hidePanels, { passive: true });

  /* ── Scroll Background Transition ── */
  var navBar = document.querySelector("[data-tml-nav-bar]");
  if (navBar) {
    var scrolled = false;
    window.addEventListener("scroll", function () {
      var isScrolled = window.scrollY > 50;
      if (isScrolled !== scrolled) {
        scrolled = isScrolled;
        if (scrolled) {
          navBar.classList.remove("bg-black/40");
          navBar.classList.add("bg-black/80", "shadow-[0_8px_32px_rgba(0,0,0,0.4)]");
        } else {
          navBar.classList.add("bg-black/40");
          navBar.classList.remove("bg-black/80", "shadow-[0_8px_32px_rgba(0,0,0,0.4)]");
        }
      }
    }, { passive: true });
  }

  /* ── Mobile Menu ── */
  var openBtn = document.querySelector("[data-tml-mobile-open]");
  var closeBtn = document.querySelector("[data-tml-mobile-close]");
  var menu = document.querySelector("[data-tml-mobile-menu]");
  var overlay = document.querySelector("[data-tml-mobile-overlay]");
  function openMobile() {
    if (menu) {
      menu.classList.remove("pointer-events-none", "opacity-0", "-translate-y-4");
      menu.classList.add("opacity-100", "translate-y-0");
    }
    if (overlay) {
      overlay.classList.remove("pointer-events-none", "opacity-0");
      overlay.classList.add("opacity-100");
    }
    if (openBtn) openBtn.classList.add("hidden");
    if (closeBtn) closeBtn.classList.remove("hidden");
  }
  function closeMobile() {
    if (menu) {
      menu.classList.add("pointer-events-none", "opacity-0", "-translate-y-4");
      menu.classList.remove("opacity-100", "translate-y-0");
    }
    if (overlay) {
      overlay.classList.add("pointer-events-none", "opacity-0");
      overlay.classList.remove("opacity-100");
    }
    if (openBtn) openBtn.classList.remove("hidden");
    if (closeBtn) closeBtn.classList.add("hidden");
  }
  if (openBtn) openBtn.addEventListener("click", openMobile);
  if (closeBtn) closeBtn.addEventListener("click", closeMobile);
  if (overlay) overlay.addEventListener("click", closeMobile);

  /* ── Animated Counters ── */
  function animateCounter(el) {
    var target = parseInt(el.getAttribute("data-counter-target") || "0", 10);
    var suffix = el.getAttribute("data-counter-suffix") || "";
    var prefix = el.getAttribute("data-counter-prefix") || "";
    var dur = 1500;
    var start = null;
    function step(ts) {
      if (!start) start = ts;
      var p = Math.min((ts - start) / dur, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      el.textContent = prefix + Math.floor(eased * target) + suffix;
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  var counterIO = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        if (e.target.hasAttribute("data-counter-target")) animateCounter(e.target);
        counterIO.unobserve(e.target);
      });
    },
    { threshold: 0.35 }
  );
  each("[data-counter-target]", function (el) { counterIO.observe(el); });

  /* ── Scroll Reveal ── */
  var revealIO = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        e.target.classList.add("is-visible");
        revealIO.unobserve(e.target);
      });
    },
    { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
  );
  each(".scroll-reveal, .scroll-reveal-scale", function (el) { revealIO.observe(el); });

  /* ── Lazy Video Loading ── */
  var videoIO = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        var video = e.target;
        var src = video.getAttribute("data-src");
        if (src && !video.src) {
          video.src = src;
          video.load();
          // Trigger autoplay for muted videos after lazy-loading the src
          if (video.hasAttribute("autoplay") || video.muted) {
            video.muted = true;
            video.play().catch(function () {});
          }
        }
        videoIO.unobserve(video);
      });
    },
    { threshold: 0.1, rootMargin: "200px" }
  );
  each("video[data-src]", function (el) { videoIO.observe(el); });

  /* ── FAQ Accordion ── */
  each("[data-tml-faq]", function (el) {
    var btn = el.querySelector("[data-tml-faq-toggle]");
    var body = el.querySelector("[data-tml-faq-body]");
    var icon = el.querySelector("[data-tml-faq-icon]");
    if (!btn || !body) return;
    btn.addEventListener("click", function () {
      var isOpen = body.classList.contains("tml-faq-open");
      if (isOpen) {
        body.style.maxHeight = "0px";
        body.classList.remove("tml-faq-open");
        el.classList.remove("tml-faq-active");
        if (icon) icon.textContent = "+";
      } else {
        body.style.maxHeight = body.scrollHeight + "px";
        body.classList.add("tml-faq-open");
        el.classList.add("tml-faq-active");
        if (icon) icon.textContent = "−";
      }
    });
  });

  /* ── Back to Top ── */
  var btt = document.querySelector("[data-tml-btt]");
  if (btt) {
    window.addEventListener("scroll", function () {
      if (window.scrollY > 600) {
        btt.classList.remove("opacity-0", "pointer-events-none");
        btt.classList.add("opacity-100");
      } else {
        btt.classList.add("opacity-0", "pointer-events-none");
        btt.classList.remove("opacity-100");
      }
    }, { passive: true });
    btt.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  /* ── Testimonial Auto-Rotate (mobile) ── */
  var testScroll = document.querySelector("[data-tml-testimonial-scroll]");
  if (testScroll) {
    var dots = document.querySelectorAll("[data-tml-testimonial-dot]");
    var cards = testScroll.children;
    var current = 0;
    function updateDots() {
      dots.forEach(function (d, i) {
        d.classList.toggle("bg-[#ff4500]", i === current);
        d.classList.toggle("bg-white/20", i !== current);
      });
    }
    if (dots.length && cards.length > 1 && window.innerWidth < 768) {
      setInterval(function () {
        current = (current + 1) % cards.length;
        cards[current].scrollIntoView({ behavior: "smooth", inline: "center", block: "nearest" });
        updateDots();
      }, 6000);
    }
  }

  /* ── Video Showcase Drag Scroll ── */
  var showcase = document.querySelector("[data-tml-video-scroll]");
  if (showcase) {
    var isDown = false, startX, scrollLeft;
    showcase.addEventListener("mousedown", function (e) { isDown = true; startX = e.pageX - showcase.offsetLeft; scrollLeft = showcase.scrollLeft; showcase.style.cursor = "grabbing"; });
    showcase.addEventListener("mouseleave", function () { isDown = false; showcase.style.cursor = "grab"; });
    showcase.addEventListener("mouseup", function () { isDown = false; showcase.style.cursor = "grab"; });
    showcase.addEventListener("mousemove", function (e) { if (!isDown) return; e.preventDefault(); var x = e.pageX - showcase.offsetLeft; showcase.scrollLeft = scrollLeft - (x - startX); });
  }
})();
