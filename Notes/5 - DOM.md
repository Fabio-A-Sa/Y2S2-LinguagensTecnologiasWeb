# 5 - DOM

Document Object Model é uma representação OOP das páginas web com árvores e nós recorrendo à linguagem Javascript. <br>
O `Document` representa um documento de HTML. Pode ser instanciado com a localização do ficheiro:

```js
document.location.assign('https://www.example.com:8080/path?key=value#somewhere')
```

A `location` têm vários parâmetros associados:

```js
console.log(document.location.protocol)    // https:
console.log(document.location.host)        // www.example.com:8080
console.log(document.location.hostname)    // www.example.com
console.log(document.location.port || 80)  // 8080
console.log(document.location.pathname)    // /path
console.log(document.location.search)      // ?key=vale
console.log(document.location.hash)        // #somewhere
```

Para uma correcta utilização de Javascript em páginas HTML, é aconselhado colocar a seguinte informação no head do ficheiro:

```html
<head>
    <script src="script.js" defer></script>
</head>
```

## Selecting Elements

Usando uma query parecida com a de CSS:

```js
const menu = document.getElementById('menu')
const paragraphs = document.getElementsByTagName('p')  
const intros = document.querySelectorAll('article p:first-child')  
const links = menu.querySelectorAll('a')

// dá para mudar o conteúdo dos elementos, embora criar elementos por este meio
// é visto como má prática
const link = document.querySelector('#posts a:first-child')
console.log(link.getAttribute('href'))
link.setAttribute('href', 'http://www.example.com/'))
const article = document.querySelector('#posts article:first-child')
article.classList.add('selected')
```

## Criação e manipulação de elementos em HTML

```js
const paragraph = document.createElement('p')
paragraph.textContent = text
console.log(paragraph.outerHTML)

const article = document.querySelector('#posts article:first-child')
article.style = 'color: red'
```