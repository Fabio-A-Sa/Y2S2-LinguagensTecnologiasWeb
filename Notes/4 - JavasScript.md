# 4 - JavaScript

Linguagem dinâmica, funcional e imperativa criada por Brendan Eich na década de 90. Pode conter ou não ponto e vírgula no final de cada statement. Está muito ligado a páginas web, pelo que o afamado Hello World é descrito da seguinte forma. O uso restrito garante erro quando existem warnings, não há variáveis declaradas com o var e não há variáveis globais não declaradas.

```javascript
'use strict' // aconselhado
console.log('Hello World')
```

## Variáveis

Dinamicamente tipada, as variáveis são declaradas com let. É boa prática colocar uma variável como constante sempre que possível.

```javascript
let bar = 10       // bar initialized with a number
const f = 34
bar = 'John Doe'   // bar now has a string
bar = true         // and now a boolean
let foo = 10, bar  // declaring two variables at once
bar = 'John Doe'   // bar was undefined
```

## Tipos de dados

### Number

Com precisão dupla

### String

```js
const firstname = 'John'
const lastname = "Doe"
console.log(`Hello, ${firstname} ${lastname}!`)     // Hello, John Doe!
console.log(`The result is ${1 + 2}`)               // The result is 3
```

- Boolean
- BigInt
- Null
- Undefined