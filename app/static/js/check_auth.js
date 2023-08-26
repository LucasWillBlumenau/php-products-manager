const redirectToLoginPageIfUserIsntAuthenticated = async () => {
    if (localStorage.getItem('authtoken')) {
        return
    }
    await redirect('/login.php')
}


redirectToLoginPageIfUserIsntAuthenticated()