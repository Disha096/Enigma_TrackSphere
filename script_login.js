const userLogin = document.getElementById('user-login');
const adminLogin = document.getElementById('admin-login');
const switchToAdmin = document.getElementById('switchToAdmin');
const switchToUser = document.getElementById('switchToUser');

switchToAdmin.addEventListener('click', (e) => {
    e.preventDefault();
    userLogin.classList.add('hidden');
    adminLogin.classList.remove('hidden');
});

switchToUser.addEventListener('click', (e) => {
    e.preventDefault();
    adminLogin.classList.add('hidden');
    userLogin.classList.remove('hidden');
});
