document.addEventListener("DOMContentLoaded", () => {
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  document.querySelectorAll(".btn-scroll-contact").forEach((btn) => {
    btn.addEventListener("click", () => {
      document.getElementById("contact")?.scrollIntoView({ behavior: "smooth" });
    });
  });

  document.querySelectorAll(".btn-scroll-work").forEach((btn) => {
    btn.addEventListener("click", () => {
      document.getElementById("work")?.scrollIntoView({ behavior: "smooth" });
    });
  });

  if (!reduceMotion) {
    const root = document.documentElement;
    let ticking = false;
    window.addEventListener(
      "scroll",
      () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(() => {
          root.style.setProperty("--scroll-y", String(window.scrollY));
          ticking = false;
        });
      },
      { passive: true },
    );
  }

  if (!reduceMotion) {
    const primary = document.querySelector(".hero .btn-primary");
    if (primary) {
      setTimeout(() => primary.classList.add("cta-pulse"), 900);
    }
  }

  initWorkSlider();
  initContactForm();
});

function initWorkSlider() {
  const root = document.querySelector("[data-work-slider]");
  if (!root) return;

  const slides = Array.from(root.querySelectorAll("[data-work-slide]"));
  const prevBtn = root.querySelector("[data-work-prev]");
  const nextBtn = root.querySelector("[data-work-next]");
  const indexEl = root.querySelector("[data-work-index]");
  if (slides.length === 0) return;

  let index = Math.max(
    0,
    slides.findIndex((slide) => slide.classList.contains("is-active")),
  );

  const pad = (n) => String(n).padStart(2, "0");

  const show = (next) => {
    const target = (next + slides.length) % slides.length;
    if (target === index && root.dataset.ready === "1") return;
    index = target;
    slides.forEach((slide, i) => {
      slide.classList.toggle("is-active", i === index);
      slide.setAttribute("aria-hidden", i === index ? "false" : "true");
    });
    if (indexEl) {
      indexEl.textContent = `${pad(index + 1)} / ${pad(slides.length)}`;
    }
  };

  prevBtn?.addEventListener("click", () => show(index - 1));
  nextBtn?.addEventListener("click", () => show(index + 1));

  root.addEventListener("keydown", (e) => {
    if (e.key === "ArrowLeft") {
      e.preventDefault();
      show(index - 1);
    }
    if (e.key === "ArrowRight") {
      e.preventDefault();
      show(index + 1);
    }
  });

  let touchX = null;
  root.addEventListener(
    "touchstart",
    (e) => {
      touchX = e.changedTouches[0]?.clientX ?? null;
    },
    { passive: true },
  );
  root.addEventListener(
    "touchend",
    (e) => {
      if (touchX == null) return;
      const dx = (e.changedTouches[0]?.clientX ?? touchX) - touchX;
      if (Math.abs(dx) > 48) {
        show(dx < 0 ? index + 1 : index - 1);
      }
      touchX = null;
    },
    { passive: true },
  );

  slides.forEach((slide, i) => {
    slide.setAttribute("aria-hidden", i === index ? "false" : "true");
  });
  if (indexEl) {
    indexEl.textContent = `${pad(index + 1)} / ${pad(slides.length)}`;
  }
  root.dataset.ready = "1";
}

function initContactForm() {
  const form = document.getElementById("contact-form");
  if (!form) return;

  const submitBtn = form.querySelector(".form-submit");
  const labels = {
    default: submitBtn?.dataset.label || "Send",
    sending: submitBtn?.dataset.sending || "Sending…",
    ok: submitBtn?.dataset.ok || "Message sent.",
    err: submitBtn?.dataset.err || "Send failed.",
    net: submitBtn?.dataset.net || "Network error.",
  };

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    if (!submitBtn) return;

    submitBtn.disabled = true;
    submitBtn.textContent = labels.sending;

    try {
      const res = await fetch(form.getAttribute("action") || "sendEmail.php", {
        method: "POST",
        body: new FormData(form),
        headers: { Accept: "application/json" },
      });

      let data = null;
      try {
        data = await res.json();
      } catch {
        throw new Error("bad-json");
      }

      const ok = res.ok && data && data.status === "success";
      showStatus(ok ? labels.ok : labels.err, ok);
      if (ok) form.reset();
    } catch {
      showStatus(labels.net, false);
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = labels.default;
    }
  });
}

function showStatus(message, isSuccess) {
  document.querySelectorAll(".status-toast").forEach((el) => el.remove());

  const toast = document.createElement("div");
  toast.className = `status-toast ${isSuccess ? "ok" : "err"}`;
  toast.setAttribute("role", "status");
  toast.textContent = message;
  document.body.appendChild(toast);
  setTimeout(() => toast.remove(), 4500);
}
