const searchDishes = document.querySelector("#pesquisar")

if (searchDishes) {
    searchDishes.addEventListener('click', async function() {

        const typeSearch = document.querySelector("#dishType")
        const categorySearch = document.querySelector("#dishCategory")

        const querie = '../api/dish.api.php?id=' + this.value + '&type=' + typeSearch.value + '&category=' + categorySearch.value;
        const response = await fetch(querie)
        const dishes = await response.json()
        const section = document.querySelector('#dishResults')
        section.innerHTML = ''

        if (!Object.keys(dishes).length) {
            const error = document.createElement('h3')
            error.textContent = "Não existem pratos com essas características"
            error.className = "error"
            section.appendChild(error)
        }

        for (const dish of dishes) {

            const article = document.createElement('article')
            article.className = "dish"
            const img = document.createElement('img')
            img.src = dish.photo
            const dishName = document.createElement('h2')
            const preco = document.createElement('h3')
            const order = document.createElement('button')
            const fav = document.createElement('button')
            preco.textContent = 'Preço: ' + dish.price + ' euros'
            dishName.textContent = dish.name

            order.textContent = "Adicionar ao carrinho"
            order.addEventListener ('click', function addOrder() {

                const request = new XMLHttpRequest()
                request.open("post", "../actions/addOrder.action.php", true)
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
                request.send(encodeForAjax({id: dish.id}))
            });

            fav.textContent = "Adicionar aos pratos favoritos"
            fav.addEventListener ('click', function addFavDish() {

                const request = new XMLHttpRequest()
                request.open("post", "../actions/addFavDish.action.php", true)
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
                request.send(encodeForAjax({id: dish.id}))
            });
            
            article.appendChild(img)
            article.appendChild(dishName)
            article.appendChild(preco)
            article.appendChild(order)
            article.appendChild(fav)
            section.appendChild(article)
      }
  })
}