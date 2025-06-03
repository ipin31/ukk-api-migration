document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector(".form_container");
  const loginBtn = document.querySelector(".login_btn");

  if (window.location.pathname === '/register') {
    container.classList.add('active');
  }

  if (loginBtn) {
    loginBtn.addEventListener('click', (e) => {
      // Cek apakah ada error dari Livewire (dengan class dari @error)
      const hasErrors = document.querySelectorAll('.text-red-500').length > 0;

      if (!hasErrors) {
        container.classList.remove('active');
      } else {
        // Jangan lakukan toggle jika error
        e.preventDefault();
      }
    });
  }

  // Toggle password eye icon
  const togglePasswordBtns = document.querySelectorAll('.togglePasswordBtn');
  togglePasswordBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetInputId = btn.getAttribute('data-target');
      const targetInput = document.getElementById(targetInputId);

      if (!targetInput) return;

      if (targetInput.type === "password") {
        targetInput.type = "text";
        btn.classList.remove('fa-eye');
        btn.classList.add('fa-eye-slash');
      } else {
        targetInput.type = "password";
        btn.classList.remove('fa-eye-slash');
        btn.classList.add('fa-eye');
      }
    });
  });
});
