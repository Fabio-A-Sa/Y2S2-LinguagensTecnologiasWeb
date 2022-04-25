# 5 - DOM

Document Object Model é uma representação OOP das páginas web com árvores e nós recorrendo à linguagem Javascript. <br>
O `Document` representa um documento de HTML. Pode ser instanciado com a localização do ficheiro:

```js
document.location.assign('https://www.google.com/')
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