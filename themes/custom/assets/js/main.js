/* Валидация и отправка формы заявки через WP AJAX */
(function () {
  const form = document.querySelector(".cta__form");
  if (!form || typeof WP_LEAD === "undefined") return;

  const btn = form.querySelector('button[type="submit"]');
  const btnText = btn.textContent;

  // Honeypot (скрытое поле против ботов)
  const honeypot = document.createElement("input");
  honeypot.type = "text";
  honeypot.name = "website";
  honeypot.tabIndex = -1;
  honeypot.autocomplete = "off";
  honeypot.style.cssText = "position:absolute;left:-9999px;opacity:0;";
  form.appendChild(honeypot);

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const name = form.name.value.trim();
    const phone = form.phone.value.trim();
    const message = form.message.value.trim();

    // Клиентская валидация
    if (!name || !phone) {
      showMessage("Пожалуйста, заполните имя и телефон", "error");
      return;
    }

    btn.disabled = true;
    btn.textContent = "Отправляем...";

    try {
      const data = new FormData();
      data.append("action", "send_lead_form");
      data.append("nonce", WP_LEAD.nonce);
      data.append("name", name);
      data.append("phone", phone);
      data.append("message", message);
      data.append("website", honeypot.value); // для спам-проверки

      const res = await fetch(WP_LEAD.ajaxUrl, {
        method: "POST",
        body: data,
        credentials: "same-origin",
      });

      const json = await res.json();

      if (json.success) {
        form.reset();
        showMessage(
          json.data.message || "Спасибо! Мы свяжемся с вами.",
          "success",
        );
      } else {
        showMessage(json.data?.message || "Ошибка отправки", "error");
      }
    } catch (err) {
      console.error(err);
      showMessage("Ошибка сети. Попробуйте позвонить нам.", "error");
    } finally {
      btn.disabled = false;
      btn.textContent = btnText;
    }
  });

  function showMessage(text, type) {
    let box = form.querySelector(".form__result");
    if (!box) {
      box = document.createElement("p");
      box.className = "form__result";
      form.appendChild(box);
    }
    box.textContent = text;
    box.dataset.type = type;
  }
})();

// ==========================================================
// HERO IDE DEMO — Браузер с заголовком
// ==========================================================

(function () {
  const ideEl = document.getElementById("ide-code");
  const stylesEl = document.getElementById("live-styles");
  const titleEl = document.getElementById("browser-title");
  const restartBtn = document.getElementById("browser-restart");

  if (!ideEl || !stylesEl || !titleEl) return;

  const codeSteps = [
    { text: "h4 {\n", type: "selector" },
    { text: "  font-size: 22px;\n", type: "prop" },
    { text: "  font-weight: 800;\n", type: "prop" },
    {
      text: "  background: linear-gradient(135deg, #2563eb, #7c3aed);\n",
      type: "prop",
    },
    { text: "  -webkit-background-clip: text;\n", type: "prop" },
    { text: "  -webkit-text-fill-color: transparent;\n", type: "prop" },
    { text: "  letter-spacing: -0.02em;\n", type: "prop" },
    { text: '  font-family: "Inter", sans-serif;\n', type: "prop" },
    { text: "  transition: transform 0.3s ease;\n", type: "prop" },
    { text: "}\n", type: "brace" },
    { text: "\n", type: "punct" },
    { text: "h4:hover {\n", type: "selector" },
    { text: "  transform: scale(1.05);\n", type: "prop" },
    { text: "}\n", type: "brace" },
  ];

  let stepIndex = 0;
  let charIndex = 0;

  function reset() {
    stepIndex = 0;
    charIndex = 0;
    ideEl.innerHTML = "";
    stylesEl.textContent = "";
    titleEl.classList.remove("is-visible");
    if (restartBtn) restartBtn.classList.remove("is-visible");
  }

  function typeNext() {
    if (stepIndex >= codeSteps.length) {
      // Анимация завершена — показать заголовок
      titleEl.classList.add("is-visible");
      // Спустя 0.8 сек — показать кнопку (через class)
      if (restartBtn) restartBtn.classList.add("is-visible");
      return;
    }

    const step = codeSteps[stepIndex];
    const char = step.text[charIndex];

    ideEl.insertAdjacentHTML("beforeend", highlightChar(char, step.type));
    stylesEl.textContent =
      ".browser__viewport " +
      codeSteps
        .slice(0, stepIndex)
        .map((s) => s.text)
        .join("") +
      step.text.slice(0, charIndex + 1);

    ideEl.scrollTop = ideEl.scrollHeight;

    charIndex++;
    if (charIndex >= step.text.length) {
      charIndex = 0;
      stepIndex++;
    }

    setTimeout(typeNext, 20 + Math.random() * 30);
  }

  function highlightChar(char, type) {
    const escaped = char === "\n" ? "\n" : escapeHtml(char);
    switch (type) {
      case "selector":
        return `<span class="tok-selector">${escaped}</span>`;
      case "prop":
        return `<span class="tok-prop">${escaped}</span>`;
      case "value":
        return `<span class="tok-value">${escaped}</span>`;
      case "brace":
        return `<span class="tok-brace">${escaped}</span>`;
      case "punct":
        return `<span class="tok-punct">${escaped}</span>`;
      default:
        return escaped;
    }
  }

  function escapeHtml(str) {
    return str
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;");
  }

  const reducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)",
  ).matches;

  if (reducedMotion) {
    ideEl.textContent = codeSteps.map((s) => s.text).join("");
    stylesEl.textContent =
      ".browser__viewport " + codeSteps.map((s) => s.text).join("");
    if (restartBtn) restartBtn.hidden = true;
    return;
  }

  if (restartBtn) {
    restartBtn.addEventListener("click", function () {
      reset();
      typeNext();
    });
  }

  typeNext();
})();
