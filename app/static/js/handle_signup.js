const form = document.querySelector('form')


const createUser = async (username, password) => {
    const data = new FormData()
    data.append('username', username)
    data.append('password', password)
    const response = await fetch('endpoints/authentication/signup.php', {
        method: 'POST',
        body: data
    })

    if (!response.ok) {
        const error = await response.json();
        throw new Error(error.content)
    }

    return response.json()
}


const handleSignUp = async event => {
    event.preventDefault()
    try {
        const [usernameInput, passwordInput, confirmPasswordInput] = event.target
        if (passwordInput.value !== confirmPasswordInput.value) {
            throw new Error('As senhas são diferentes')
        }
        await createUser(usernameInput.value, passwordInput.value)
        await redirect('/login.php')
    } catch (error) {
        alert(error.message)
    }
}


form.addEventListener('submit', handleSignUp)