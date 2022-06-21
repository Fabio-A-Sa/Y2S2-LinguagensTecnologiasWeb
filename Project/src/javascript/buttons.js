function answer(id) {

    const section = document.querySelector('#answer' + id.toString())
    section.innerHTML = ''

    const box = document.createElement("textarea")
    box.id = "box" + id.toString()
    box.placeholder = "Escreva aqui uma resposta"
    box.rows = 5
    box.cols = 60
    
    const button = document.createElement("button")
    button.textContent = "Enviar"
    button.addEventListener('click', function submit() {
        
        const text = document.querySelector('#box' + id.toString()).value
        
        if (text != "") {

            const request = new XMLHttpRequest()
            const csrf = document.querySelector("#infoCSRF").value
            request.open("post", "../actions/addAnswer.action.php", true)
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
            request.send(encodeForAjax({id: id, text: text, csrf: csrf}))
            
            const answer = document.createElement('h4')
            const answerText = document.createElement('h4')

            answer.textContent = "Respondido:"
            answerText.textContent = text
            section.innerHTML = ''
            section.appendChild(answer)
            section.appendChild(answerText)

        } else {
            alert("A resposta não pode ser vazia!")
        }
    });

    section.appendChild(box)
    section.appendChild(button)
}

function addFavRestaurant(id) {

    const request = new XMLHttpRequest()
    request.open("post", "../actions/addFavRestaurant.action.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({id: id}))
}

function removeFavRestaurant(id) {

    const request = new XMLHttpRequest()
    request.open("post", "../actions/removeFavRestaurant.action.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({id: id}))

    const content = document.querySelector("#restaurant" + id.toString())
    content.remove();
}

function removeFavDish(id) {

    const request = new XMLHttpRequest()
    request.open("post", "../actions/removeFavDish.action.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({id: id}))

    const content = document.querySelector("#dish" + id.toString())
    content.remove()
}

function removeOrder(id) {

    const request = new XMLHttpRequest()
    request.open("post", "../actions/removeOrder.action.php", true)
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    request.send(encodeForAjax({id: id}))

    const content = document.querySelector("#cardish" + id.toString())
    const oldQuantity = parseInt(content.querySelector(".quantity").textContent.replace(/[^0-9]/g,''))
    const price = (parseFloat(content.querySelector(".price").textContent.match(/[+-]?\d+(\.\d+)?/g))).toFixed(2)

    if (oldQuantity == 1) {
        const content = document.querySelector("#cardish" + id.toString())
        content.innerHTML = ""
    } else {
        content.querySelector(".quantity").textContent = "Quantidade: " + (oldQuantity-1).toString()
    }   
    const total = document.querySelector("#total")
    const value = (parseFloat(total.textContent.match(/[+-]?\d+(\.\d+)?/g)) - price).toFixed(2)
    total.textContent = "Total: " + value + " euros"
    if (value == 0) {
        
        const all = document.querySelector("main")
        all.innerHTML = ""

        const section = document.createElement("section")
        section.id = "newOrders"
        const title = document.createElement("h2")
        title.textContent = "Novos pedidos"
        const subtitle = document.createElement("h3")
        subtitle.className = "error"
        subtitle.textContent = "Sem pedidos"
        section.appendChild(title)
        section.appendChild(subtitle)
        all.appendChild(section)
    }
}

function changeState(idDish, idOwner) {

    const state = document.querySelectorAll("#changeState" + idDish + idOwner + " input")[0].value

    if (state != "") {
        const request = new XMLHttpRequest()
        request.open("post", "../actions/changeState.action.php", true)
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.send(encodeForAjax({idUser: idOwner, idDish: idDish, state: state}))

        const oldState = document.querySelector("#state" + idDish + idOwner);
        oldState.innerHTML = "Estado do pedido: " + state
    } 
}

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}