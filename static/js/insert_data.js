const form = document.querySelector('form')


const insertData = async (data) => {
    const response = await fetch('endpoints/insert.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'Application/JSON',
            'Charset': 'UTF8'
        },
        body: JSON.stringify(data)
    })
    return response
}

const submitData = async event => {
    event.preventDefault()
    const [name, price] = [event.target[0].value, event.target[1].value]
    const response = await insertData({name: name, price: price})
    if (!response.ok) {
        alert('Erro ao inserir dados')
        return
    }
    alert('Dados inseridos com sucesso')
    form.reset()
}


const init = async () => {
    
}

form.addEventListener('submit', submitData)

init()
