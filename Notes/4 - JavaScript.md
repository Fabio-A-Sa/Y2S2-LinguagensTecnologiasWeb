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

Para averiguar os tipos de dados, usar a função `typeof`

```js
console.log(typeof undefined)
```

### Number

Com precisão dupla

### String

O operador + soma números, mas se um dos operandos for uma string converte o outro também numa string e concatena os dois:

```js
const firstname = 'John'
const lastname = "Doe"
console.log(`Hello, ${firstname} ${lastname}!`)     // Hello, John Doe!
console.log(`The result is ${1 + 2}`)               // The result is 3
console.log('31' + 11)                              // 3111
```

### Boolean

São considerados falsos os seguintes elementos:

- false
- undefined
- null
- 0
- NaN
- '' // empty string

Tudo o resto, incluindo objectos, é verdadeiro.

### BigInt

Parecido com o long long int do C++

### Null

### Undefined

## Conversões de tipo

```js
const a = 0
const b = Boolean(a)                    // false
const c = String(a)                     // '0'
const d = String(b)                     // 'false'
console.log(parseFloat('123.4'))        // 123.4
console.log(parseInt('123', 10))        // 123
console.log(parseInt('123', 8))         // 83, obrigatório colocar a base da conversão
```

## Comparações

Sempre que comparamos dois dados de tipos diferentes, então eles são convertidos em números. Os objectos, tal como lista, são comparados por referência:

```js
1 == '1'                                // 1 == 1 -> true
0 == false                              // 0 == 0 -> true
'0' == true                             // 0 == 1 -> false
'' == false                             // 0 == 0 -> true
Boolean('0') == false                   // 1 == 0 -> false
Boolean('0') == true                    // 1 == 1 -> true

// Podemos usar o strict equality -> dá falso sempre que são de tipos diferentes

0 === 0                                 // true
0 === '0'                               // false
0 === false                             // false

// se o primeiro for falso, coloca o segundo
const bar = foo || some_default_value
// se o primeiro for nulo, coloca o segundo
const bar = foo ?? some_default_value
```

