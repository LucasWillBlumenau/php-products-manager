const form = document.querySelector('form')


const fetchData = async recordID => {
    const response = await fetch(`/endpoints/select_product.php?id=${recordID}`)
    
    if (response.status === 404) {
        throw new Error('Não há nenhum produto com o id informado')
    }
    
    if (!response.ok) {
        throw new Error('Houve problemas ao carregar dados')
    }

    return response.json()
}


const createPopupInfoElement = (key, value) => {
    const popupInfo = document.createElement('div')
    popupInfo.setAttribute('class', 'popup-info')

    const keySpan = document.createElement('span')
    keySpan.textContent = key

    const valueSpan = document.createElement('span')
    valueSpan.textContent = value

    popupInfo.appendChild(keySpan)
    popupInfo.appendChild(valueSpan)

    return popupInfo
}


const createProductModal = (recordData) => {
    const modal = document.createElement('div')
    modal.setAttribute('class', 'modal')

    const popup = document.createElement('div')
    popup.setAttribute('class', 'popup')

    const closeButton = document.createElement('button')
    closeButton.textContent = 'Fechar'
    closeButton.addEventListener('click', () => {
        document.body.removeChild(modal)
    })

    popup.appendChild(createPopupInfoElement('Nome:', recordData.name))
    popup.appendChild(createPopupInfoElement('Preço:', recordData.price))
    popup.appendChild(closeButton)

    modal.appendChild(popup)
    return modal
}

const insertDataIntoDOM = (recordData) => {
    const modal = createProductModal(recordData)
    document.body.appendChild(modal)
}


const submitFormEvent = async event => {
    event.preventDefault()
    const recordID = event.target[0].value
    try {
        const data = await fetchData(recordID)
        insertDataIntoDOM(data)
    } catch (error) {
        alert(error.message)
    }
}


form.addEventListener('submit', submitFormEvent)
