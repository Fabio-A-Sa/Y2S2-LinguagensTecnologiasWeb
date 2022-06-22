# 8 - Web Security

Uma vulnerabilidade é uma fraqueza na aplicação, por descuido de implementação ou design, e um ataque é a exploração dessas vulnerabilidades. 

## Ataques

### Path Transversal Attack

Quando através do URL (ou de includes em PHP), consegue-se aceder a conteúdos que estão fora do escopo da aplicação. Exemplo:

```js
const URL = "http://www.foo.com/../../database.db'
```

### 