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

  // Фразы
  const htmlText = "Hello, World!";

  // CSS-код (печатается после HTML)
  const cssSteps = [
    { text: ".browser__viewport h4 {\n", type: "selector" },
    { text: "  font-size: 42px;\n", type: "prop" },
    { text: "  font-weight: 800;\n", type: "prop" },
    {
      text: "  background: linear-gradient(135deg, #2563eb, #7c3aed);\n",
      type: "prop",
    },
    { text: "  -webkit-background-clip: text;\n", type: "prop" },
    { text: "  -webkit-text-fill-color: transparent;\n", type: "prop" },
    { text: "  letter-spacing: -0.02em;\n", type: "prop" },
    { text: "  font-size: 22px;\n", type: "prop" },
    { text: '  font-family: "Inter", sans-serif;\n', type: "prop" },
    { text: "  transition: transform 0.3s ease;\n", type: "prop" },
    { text: "}\n", type: "brace" },
    { text: "\n", type: "punct" },
    { text: ".browser__viewport h4:hover {\n", type: "selector" },
    { text: "  transform: scale(1.05);\n", type: "prop" },
    { text: "}\n", type: "brace" },
  ];

  let phase = "html"; // 'html' → 'css' → 'done'
  let htmlIndex = 0;
  let stepIndex = 0;
  let charIndex = 0;

  function reset() {
    phase = "html";
    htmlIndex = 0;
    stepIndex = 0;
    charIndex = 0;
    ideEl.innerHTML = "";
    stylesEl.textContent = "";
    titleEl.textContent = "";
    titleEl.classList.remove("is-visible");
    if (restartBtn) restartBtn.classList.remove("is-visible");
  }

  function typeHTML() {
    if (htmlIndex < htmlText.length) {
      titleEl.textContent += htmlText[htmlIndex];
      htmlIndex++;
      setTimeout(typeHTML, 80);
    } else {
      // HTML готов — начинаем CSS
      ideEl.insertAdjacentHTML(
        "beforeend",
        '<span class="tok-punct">\n</span>',
      );
      phase = "css";
      typeCSS();
    }
  }

  function typeCSS() {
    if (stepIndex >= cssSteps.length) {
      // Всё готово — показать кнопку
      phase = "done";
      if (restartBtn) restartBtn.classList.add("is-visible");
      return;
    }

    const step = cssSteps[stepIndex];
    const char = step.text[charIndex];

    ideEl.insertAdjacentHTML("beforeend", highlightChar(char, step.type));
    stylesEl.textContent =
      cssSteps
        .slice(0, stepIndex)
        .map((s) => s.text)
        .join("") + step.text.slice(0, charIndex + 1);
    ideEl.scrollTop = ideEl.scrollHeight;

    charIndex++;
    if (charIndex >= step.text.length) {
      charIndex = 0;
      stepIndex++;
    }

    setTimeout(typeCSS, 20 + Math.random() * 30);
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
    // Мгновенный финал
    titleEl.textContent = htmlText;
    ideEl.textContent = cssSteps.map((s) => s.text).join("");
    stylesEl.textContent = cssSteps.map((s) => s.text).join("");
    if (restartBtn) restartBtn.classList.add("is-visible");
    return;
  }

  if (restartBtn) {
    restartBtn.addEventListener("click", function () {
      reset();
      typeHTML();
    });
  }

  // Запуск: сначала HTML, потом CSS
  typeHTML();
})();

// ==========================================================
// HEADER — скрытие при скролле вниз, появление при скролле вверх
// ==========================================================
(function () {
  const header = document.querySelector(".header");
  if (!header) return;

  let lastScrollTop = 0;
  let ticking = false;
  const scrollThreshold = 100; // начинаем скрывать после 100px скролла

  function updateHeader() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // В самом верху — всегда показываем
    if (scrollTop < 10) {
      header.classList.remove("header--hidden");
      lastScrollTop = scrollTop;
      ticking = false;
      return;
    }

    // Если скроллим вниз и прошли порог — скрываем
    if (scrollTop > lastScrollTop && scrollTop > scrollThreshold) {
      header.classList.add("header--hidden");
    } else {
      // Скроллим вверх — показываем
      header.classList.remove("header--hidden");
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    ticking = false;
  }

  window.addEventListener(
    "scroll",
    function () {
      if (!ticking) {
        window.requestAnimationFrame(updateHeader);
        ticking = true;
      }
    },
    { passive: true },
  );
})();

// ==========================================================
// BURGER — открытие/закрытие мобильного меню
// ==========================================================
(function () {
  const burger = document.querySelector(".header__burger");
  const nav = document.querySelector(".nav");
  const header = document.querySelector(".header");
  if (!burger || !nav) return;

  // Функция закрытия меню
  function closeMenu() {
    nav.classList.remove("is-open");
    burger.classList.remove("is-open");
    burger.setAttribute("aria-expanded", "false");
    burger.setAttribute("aria-label", "Открыть меню");
    document.documentElement.classList.remove("nav-open");
  }

  // Переключение меню по клику на бургер
  burger.addEventListener("click", function (e) {
    e.stopPropagation(); // Чтобы клик не долетал до document
    const isOpen = nav.classList.toggle("is-open");
    burger.classList.toggle("is-open", isOpen);
    burger.setAttribute("aria-expanded", isOpen ? "true" : "false");
    burger.setAttribute("aria-label", isOpen ? "Закрыть меню" : "Открыть меню");

    // Блокируем скролл на теге <html>
    document.documentElement.classList.toggle("nav-open", isOpen);

    // Если открыли меню, принудительно возвращаем скрытую шапку на экран
    if (isOpen && header) {
      header.classList.remove("header--hidden");
    }
  });

  // Закрыть меню при клике на любую ссылку внутри (для якорей типа /#form)
  nav.querySelectorAll("a").forEach(function (link) {
    link.addEventListener("click", closeMenu);
  });

  // Закрыть меню при клике в любое место экрана за пределами меню
  document.addEventListener("click", function (e) {
    if (!nav.classList.contains("is-open")) return;

    if (!nav.contains(e.target) && !burger.contains(e.target)) {
      closeMenu();
    }
  });

  // --- Умное скрытие шапки при прокрутке страницы вниз ---
  if (header) {
    let lastScrollTop = 0;
    const scrollThreshold = 10; // Порог в px, чтобы игнорировать микро-движения

    window.addEventListener(
      "scroll",
      function () {
        // Если мобильное меню открыто — не прячем шапку
        if (nav.classList.contains("is-open")) return;

        const scrollTop = window.scrollY || document.documentElement.scrollTop;

        // Игнорируем мелкую тряску скролла
        if (Math.abs(lastScrollTop - scrollTop) <= scrollThreshold) return;

        // В самом верху страницы всегда показываем шапку
        if (scrollTop <= 0) {
          header.classList.remove("header--hidden");
          lastScrollTop = scrollTop;
          return;
        }

        if (scrollTop > lastScrollTop) {
          // Листаем вниз — скрываем
          header.classList.add("header--hidden");
        } else {
          // Листаем вверх — мгновенно показываем
          header.classList.remove("header--hidden");
        }

        lastScrollTop = scrollTop;
      },
      { passive: true },
    ); // passive ускоряет работу скролла на мобильных
  }
})();

// ==========================================================
// COOKIE BANNER
// ==========================================================
(function () {
  const banner = document.getElementById("cookie-banner");
  const acceptBtn = document.getElementById("cookie-accept");
  const declineBtn = document.getElementById("cookie-decline");
  const settingsLink = document.getElementById("cookie-settings");

  if (!banner) return;

  // Проверяем, есть ли уже согласие
  const consent = localStorage.getItem("cookie_consent");

  if (!consent) {
    banner.hidden = false;
  }

  // Принять
  if (acceptBtn) {
    acceptBtn.addEventListener("click", function () {
      localStorage.setItem("cookie_consent", "accepted");
      banner.hidden = true;
      // Здесь можно загрузить скрипты аналитики (Метрика, GA)
      // loadAnalytics();
    });
  }

  // Отклонить
  if (declineBtn) {
    declineBtn.addEventListener("click", function () {
      localStorage.setItem("cookie_consent", "declined");
      banner.hidden = true;
    });
  }

  // Настройки cookie (сброс)
  if (settingsLink) {
    settingsLink.addEventListener("click", function (e) {
      e.preventDefault();
      localStorage.removeItem("cookie_consent");
      banner.hidden = false;
    });
  }
})();
