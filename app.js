document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("[data-scroll-to]").forEach((button) => {
    button.addEventListener("click", () => {
      const id = button.getAttribute("data-scroll-to");
      if (!id) return;
      document.getElementById(id)?.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  initContactForm();
});

function initContactForm() {
  const form = document.getElementById("contact-form");
  const shell = document.getElementById("jadi-contact-form");
  if (!form || !shell) return;

  const submitBtn = form.querySelector('button[type="submit"]');
  const labels = {
    error: form.dataset.error || "Error",
    sent: form.dataset.sent || "Sent",
    sending: form.dataset.sending || "Sending…",
  };

  form.addEventListener("submit", async (event) => {
    event.preventDefault();
    if (form.dataset.submitting === "1") return;

    const validationError = validateContactForm(form);
    if (validationError) {
      pushToast("err", validationError);
      return;
    }

    form.dataset.submitting = "1";
    if (submitBtn) submitBtn.disabled = true;
    setFormLoading(shell, true);

    try {
      const response = await fetch(form.getAttribute("action") || "sendEmail.php", {
        method: "POST",
        body: new FormData(form),
        headers: { Accept: "application/json" },
      });

      let payload = null;
      try {
        payload = await response.json();
      } catch {
        payload = null;
      }

      const ok = response.ok && payload && payload.status === "success";
      pushToast(ok ? "ok" : "err", ok ? labels.sent : labels.error);
      if (ok) form.reset();
    } catch {
      pushToast("err", labels.error);
    } finally {
      form.dataset.submitting = "0";
      if (submitBtn) submitBtn.disabled = false;
      setFormLoading(shell, false);
    }
  });
}

function validateContactForm(form) {
  const name = form.querySelector("#jadi_name");
  const email = form.querySelector("#jadi_email");
  const message = form.querySelector("#jadi_message");

  const nameValue = String(name?.value || "").trim();
  if (nameValue.length < 2) {
    return name?.dataset.requiredMessage || "Name required";
  }

  const emailValue = String(email?.value || "").trim();
  if (emailValue === "") {
    return email?.dataset.requiredMessage || "Email required";
  }
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
    return email?.dataset.emailMessage || "Invalid email";
  }

  const messageValue = String(message?.value || "").trim();
  if (messageValue === "") {
    return message?.dataset.requiredMessage || "Message required";
  }
  if (messageValue.length < 20) {
    return message?.dataset.minLengthMessage || "Message too short";
  }

  return null;
}

function setFormLoading(shell, loading) {
  shell.querySelector(".form-overlay")?.remove();
  if (!loading) {
    shell.removeAttribute("aria-busy");
    return;
  }

  shell.setAttribute("aria-busy", "true");
  const overlay = document.createElement("div");
  overlay.className = "form-overlay";
  overlay.setAttribute("aria-hidden", "true");
  overlay.innerHTML = `
    <div class="form-overlay-card">
      <div class="form-spinner"></div>
    </div>
  `;
  shell.appendChild(overlay);
}

function pushToast(type, message) {
  if (!message) return;

  const root = document.getElementById("toast-root");
  if (!root) return;

  const toast = document.createElement("div");
  toast.className = `toast ${type === "ok" ? "ok" : "err"}`;
  toast.setAttribute("role", "status");
  toast.textContent = message;
  root.appendChild(toast);

  window.setTimeout(() => toast.remove(), 4500);
}
