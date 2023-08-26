const logoutLink = document.querySelector('[data-js="logout-link"]')


logoutLink.addEventListener('click', () => {
    localStorage.removeItem('authtoken')
    redirect('/login.php')
})