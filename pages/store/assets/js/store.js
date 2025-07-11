document.addEventListener("DOMContentLoaded", () => {
  const categoryPopup = document.getElementById("mobile-category-popup");
  const categoryToggle = document.getElementById("mobile-category-toggle");

  const cartPopup = document.getElementById("mobile-cart-popup");
  const cartToggle = document.getElementById("mobile-cart-toggle");
  const cancelBtnMobile = document.getElementById("cancel-btn-mobile");

  // Toggle mobile category popup
  categoryToggle.addEventListener("click", () => {
    categoryPopup.classList.toggle("hidden");
  });

  // Toggle mobile cart popup
  cartToggle.addEventListener("click", () => {
    cartPopup.classList.toggle("hidden");
  });

  // Close when clicking outside content
  categoryPopup.addEventListener("click", (e) => {
    if (e.target === categoryPopup) categoryPopup.classList.add("hidden");
  });

  cartPopup.addEventListener("click", (e) => {
    if (e.target === cartPopup) cartPopup.classList.add("hidden");
  });

  // Cancel cart
  cancelBtnMobile.addEventListener("click", () => {
    cartPopup.classList.add("hidden");
  });
});