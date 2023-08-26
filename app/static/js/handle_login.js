const form = document.querySelector('form')


const sendLoginCrendetials = async (username, password) => {
    const data = new FormData()
    data.append('username', username)
    data.append('password', password)
    const response = await fetch('endpoints/authentication/login.php', {
        method: 'POST',
        body: data
    })
    if (response.status === 400) {
        throw new Error('As crendenciais de acesso estão incorretas')
    }
    if (!response.ok) {
        throw new Error('Problemas ao fazer login')
    }

    return response.json()
}

const redirect = async relativeURLPath => {
    const response = await fetch(relativeURLPath)
    location.href = response.url
} 


const handleLogin = async event => {
    event.preventDefault()
    const [usernameInput, passwordInput] = event.target
    try {
        const data = await sendLoginCrendetials(usernameInput.value, passwordInput.value)
        localStorage.setItem('authtoken', data.token)
        redirect('/')
    } catch (error) {
        alert(error.message)
    }
}

form.addEventListener('submit', handleLogin)