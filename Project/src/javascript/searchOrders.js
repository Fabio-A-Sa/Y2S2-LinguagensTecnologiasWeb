const orders = document.querySelector("#allOrders")

if (orders) {

    orders.addEventListener('click', async function() {

        const content = document.querySelector("#more")
    
        const newOrders = document.createElement("section")
        newOrders.id = "newOrders"
        const newOrdersHeader = document.createElement('h2')
        newOrdersHeader.textContent = "Novos pedidos"
        newOrders.appendChild(newOrdersHeader)

        const oldOrders = document.createElement("section")
        oldOrders.id = "oldOrders"
        const oldOrdersHeader = document.createElement('h2')
        oldOrdersHeader.textContent = "Antigos pedidos"
        oldOrders.appendChild(oldOrdersHeader)
    
        const oldquerie = '../api/order.api.php?type=old'
        const oldresponse = await fetch(oldquerie)
        const oOrders = await oldresponse.json()
    
        if (Object.keys(oOrders).length) {
            for (const order of oOrders) {
                
                const image = document.createElement('img')
                image.src = order[2]
                const title = document.createElement('h3')
                title.textContent = order[1].name + " no restaurante " + order[0].name
                const quantity = document.createElement('h3')
                quantity.textContent = order[5]
                const state = document.createElement('h3')
                state.textContent = order[4]
                const date = document.createElement('h3')
                date.textContent = order[3]

                const article = document.createElement("article")
                article.className = "order"
                article.appendChild(image)
                article.appendChild(title)
                article.appendChild(date)
                article.appendChild(quantity)
                article.appendChild(state)
                
                oldOrders.appendChild(article)
            }
        } else {
            const notFound = document.createElement("h3")
            notFound.textContent = "Não tem pedidos"
            notFound.className = "error"
            oldOrders.appendChild(notFound)
        }
    
        const newquerie = '../api/order.api.php?type=new'
        const newresponse = await fetch(newquerie)
        const nOrders = await newresponse.json()
    
        if (Object.keys(nOrders).length) {
            for (const order of nOrders) {
                
                const image = document.createElement('img')
                image.src = order[2]
                const title = document.createElement('h3')
                title.textContent = order[1].name + " no restaurante " + order[0].name
                const quantity = document.createElement('h3')
                quantity.textContent = order[5]
                const state = document.createElement('h3')
                state.textContent = order[4]
                const date = document.createElement('h3')
                date.textContent = order[3]

                const article = document.createElement("article")
                article.className = "order"
                article.appendChild(image)
                article.appendChild(title)
                article.appendChild(date)
                article.appendChild(quantity)
                article.appendChild(state)
                
                newOrders.appendChild(article)
            }
        } else {
            const notFound = document.createElement("h3")
            notFound.textContent = "Não tem pedidos"
            notFound.className = "error"
            newOrders.appendChild(notFound)
        }
        
        content.prepend(newOrders)
        content.prepend(oldOrders)

        const ordersButton = document.querySelector("#allOrders")
        ordersButton.remove()
  });
}