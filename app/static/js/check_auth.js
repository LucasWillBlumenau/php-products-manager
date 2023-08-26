const redirectToLoginPageIfUserIsntAuthenticated = async () => {
    if (localStorage.getItem('authtoken')) {
        return
    }
    const response = await fetch('/login.php')
    location.href = response.url
}


redirectToLoginPageIfUserIsntAuthenticated()