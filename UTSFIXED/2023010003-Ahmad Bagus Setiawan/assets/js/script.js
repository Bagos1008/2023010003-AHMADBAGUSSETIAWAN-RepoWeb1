// Login Popup
const openLogin = document.getElementById('openLogin');
const loginPopup = document.getElementById('loginPopup');
const closeLogin = document.getElementById('closeLogin');

openLogin.addEventListener('click', () => {
  loginPopup.style.display = 'flex';
});

closeLogin.addEventListener('click', () => {
  loginPopup.style.display = 'none';
});

// Register Popup
const openRegister = document.getElementById('openRegister');
const registerPopup = document.getElementById('registerPopup');
const closeRegister = document.getElementById('closeRegister');

openRegister.addEventListener('click', () => {
  registerPopup.style.display = 'flex';
});

closeRegister.addEventListener('click', () => {
  registerPopup.style.display = 'none';
});

// Close popup when clicking outside
window.addEventListener('click', (e) => {
  if (e.target === loginPopup) {
    loginPopup.style.display = 'none';
  }
  if (e.target === registerPopup) {
    registerPopup.style.display = 'none';
  }
});
