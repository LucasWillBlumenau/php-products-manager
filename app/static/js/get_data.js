const tbody = document.querySelector('tbody')


const deleteRecord = async (recordID) => {

    const data = new FormData()
    data.append('id', recordID)

    const response = await fetch('endpoints/products/delete.php', {
        headers: {
            'Authorization-Token': localStorage.getItem('authtoken')
        },
        method: 'POST',
        body: data
    })

    if (!response.ok) {
        throw new Error('Não foi possível deletar o produto')
    }
}


const createOptionsTd = () => {
    const optionsTd = document.createElement('td')
    optionsTd.setAttribute('class', 'options-container')
    const deleteButton = document.createElement('button')
    deleteButton.innerHTML = '<i class="fa-solid fa-trash"></i>'
    optionsTd.appendChild(deleteButton)
    return optionsTd
}


const createRowElement = ({ id, name, price }) => {

    const tr = document.createElement('tr')
    
    const nameTd = document.createElement('td')
    nameTd.textContent = name

    const priceTd = document.createElement('td')
    priceTd.textContent = `R$${price}`
    
    const optionsTd = createOptionsTd(id)

    
    tr.appendChild(nameTd)
    tr.appendChild(priceTd)
    tr.appendChild(optionsTd)

    const deleteButton = optionsTd.querySelector('button')
    deleteButton.addEventListener('click', async () => {
        try {
            await deleteRecord(id)
            tbody.removeChild(tr)
        } catch (error) {
            alert(error.message)
        }
    })


    return tr
}


const insertRecordsIntoDOM = (records) => {
    const fragment = document.createDocumentFragment()
    records.forEach(record => {
        fragment.appendChild(createRowElement(record))
    })
    tbody.appendChild(fragment)
}


const init = async () => {
    const response = await fetch('endpoints/products/select.php', {
        headers: {
            'Authorization-Token': localStorage.getItem('authtoken')
        }
    })
    const data = await response.json()
    insertRecordsIntoDOM(data)
}

init()