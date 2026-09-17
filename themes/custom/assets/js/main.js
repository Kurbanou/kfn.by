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
