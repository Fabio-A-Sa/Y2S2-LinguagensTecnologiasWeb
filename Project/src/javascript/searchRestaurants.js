const searchRestaurants = document.querySelector("#searchrestaurant")

if (searchRestaurants) {
    searchRestaurants.addEventListener('input', async function() {

        const typeSearch = document.querySelector("#critério")
        const querie = '../api/restaurant.api.php?search=' + this.value + '&type=' + typeSearch.value
        const response = await fetch(querie)
        const restaurants = await response.json()
        const section = document.querySelector('#searchrestaurants')
        section.innerHTML = ''
        if (this.value.length == "") return;

        if (!Object.keys(restaurants).length) {
            const error = document.createElement('h3')
            error.textContent = "Não existem restaurantes com essas características"
            error.className = "error"
            section.appendChild(error)
        }

        for (const restaurant of restaurants) {
            const article = document.createElement('article')
            const link = document.createElement('a')
            link.href = 'restaurant.php?id=' + restaurant.id
            link.textContent = restaurant.name
            article.appendChild(link)
            section.appendChild(article)
      }
  })
}