const form = document.querySelector('form')


const insertData = async ({ name: name, price: price }) => {
    const data = new FormData()
    data.append('name', name)
    data.append('price', price)
    const response = await fetch('endpoints/insert.php', {
        method: 'POST',
        headers: {
            'Charset': 'UTF8'
        },
        body: data
    })
    return response
}

const submitData = async event => {
    event.preventDefault()
    const [name, price] = [event.target[0].value, event.target[1].value]
    const response = await insertData({ name: name, price: price })
    console.log(await response.json());
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
