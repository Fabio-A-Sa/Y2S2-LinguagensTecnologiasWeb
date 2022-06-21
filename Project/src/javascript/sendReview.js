const sendReview = document.querySelector("#sendReview")
if (sendReview) {
    sendReview.addEventListener('click', async function() {
        const text = document.querySelector("#review").value 
        if (text.trim().length < 3) {
            alert("Não pode enviar reviews vazias!")
        } else {
            const stars = document.querySelector("#stars").value
            const idRestaurant = document.querySelector("#idRestaurant").value
            
            const request = new XMLHttpRequest()
            request.open("post", "../actions/addReview.action.php", true)
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
            request.send(encodeForAjax({idRestaurant: idRestaurant, stars: stars, comment: text}))
            const newReview = document.querySelector("#newReview")
            newReview.innerHTML = ""

            const article = document.createElement("article")
            article.className = "item"
            const answerarticle = document.createElement("article")
            answerarticle.className = "review"
            const image = document.createElement("img")
            image.id = "reviewI"
            image.src = "../img/reviews/default.png"
            image.alt = "foto inserida numa review/comentário relativo ao serviço do restaurante"
            const name = document.createElement("h4")
            name.id = "reviewN"
            name.textContent = "Eu"
            const newComment = document.createElement("h4")
            newComment.id = "reviewC"
            newComment.textContent = text
            const data = document.createElement("h4")
            data.id = "reviewD"
            let today = new Date()
            data.textContent = today.getFullYear().toString() + "-" + (today.getMonth()+1).toString() + "-" + today.getDate().toString()
            const estrelas = document.createElement("h4")
            estrelas.id = "reviewS"
            estrelas.textContent = "Avaliação: " + stars + " estrelas"
            const form = document.createElement("form")
            form.id = "uploadImg"
            form.action = "../actions/uploadReviewImage.action.php"
            form.method = "post"
            form.enctype = "multipart/form-data"
            form.textContent = "Upload foto:"
            const input1 = document.createElement("input")
            const input2 = document.createElement("input")
            const input3 = document.createElement("input")
            input1.type = "file"
            input1.name = "image"
            input2.type = "submit"
            input2.value = "Upload"
            input3.hidden = "hidden"
            input3.name = "idRestaurant"
            input3.value = idRestaurant
            form.appendChild(input1)
            form.appendChild(input2)
            form.appendChild(input3)

            answerarticle.appendChild(image)
            answerarticle.appendChild(name)
            answerarticle.appendChild(newComment)
            answerarticle.appendChild(data)
            answerarticle.appendChild(estrelas)
            answerarticle.appendChild(form)
            article.appendChild(answerarticle)
            newReview.appendChild(article)
        }
  })
}