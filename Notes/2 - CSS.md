# 2 - CSS

Cascading Style Sheet é a linguagem usada para formatar o estilo da página HTML. O CSS 1 foi criado em 1996 e atualmente está em vigor a versão 3, datada de 2011-2012. É baseada em dois conceitos: 

1. Seletores
Permitem selecionar elementos do HTML para aplicar estilos

2. Propriedades
Definem o estilo de cada elemento

```css
p {                     /* seletor */
    color: red;         /* propriedade: valor */
}
```

### Linking to HTML

1. Inline

```css
<p style="color: red">
  This is a red paragraph.
</p>
```

2. Internal Style Sheet

```css
<head>
    <style>
        p {
            color: red;
        }
    </style>
</head>
<body>
    <p>This is a red paragraph.</p>
</body>
```

3. External Style Sheet

```css
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>This is a red paragraph.</p>
</body>
```

## Selectors

- Type: `a`
- Class: `.class_name`
- Id: `#id_name`
- Universal: `*`
- Group: `,`

### Attribute selectors

```css
[attribute]             – exists.
[attribute=value]       – equals.
[attribute~=value]      – containing value (word).
[attribute|=value]      – starting with value (word).
[attribute^=value]      – starting with value.
[attribute$=value]      – ending with value.
[attribute*=value]      – containing value.
```

### Combining selectors

```css
aside a             /* Seleciona todos os 'a' que descendem de um 'aside' */
aside > a           /* Seleciona todos os 'a' que descendem diretamente de um 'aside' */
.into + p           /* Seleciona o próximo irmão 'p' de um p que contenha a classe 'intro' */
.selected ~li       /* Seleciona todos os próximos irmãos 'li' depois de um 'li' de classe 'selected' */
```

### Pseudo-classes

Forma de selecionar elementos existentes com base no seu estado, como por exemplo links visitados.

```css
a:visited           /* Link ainda não visitado */
a:link              /* Link visitado */
a:active            /* Link ativo, está a ser clicado */

a:hover             /* O cursor está por cima do elemento */

input:focus         /* the input is focused */
input:valid         /* the data in the input is valid */
input:invalid       /* the data in the input is not valid */
input:required      /* the input is mandatory */
input:optional      /* the input is optional */
input:read-only     /* the input is read-only */
input:read-write    /* the input is not read-only */
radio:checked       /* the radio button is checked */

:target             /* scroll automático até à seção de id */
section:target      /* scroll automático até à seção de id */

p:first-child       /* primeiro filho de qualquer p */
:last-child         /* qualquer elemento que é o último child dos seus parentes  */
h1:first-of-type    /* elementos que são primeiros filhos de pais que têm qualquer tipo */

p:nth-child(2)      /* O segundo filho  */
p:nth-child(2n+1)   /* Só filhos de número ímpar */
p:nth-child(-n+3)   /* Só os três primeiros filhos */
p:only-child        /* parágrafos que são o único filho dos seus parentes */
p:empty             /* parágrafos que não têm filhos */

section :not(article) p     /* p que não descende de um artigo mas que descende de uma secção */
:not(article) > p           /* p que não descende diretamente de um artigo */
:not(article) p             /* p que não descende de um artigo. Cuidado com esta. */
```

### Pseudo-elements

Forma de selecionar logicamente partes que não são realmente elementos, como por exemplo a primeira letra do parágrafo.

```css
p::first-letter                             /* Primeira letra do parágrafo */
p::first-line                               /* Primeira linha do parágrado */
article > p:first-of-type::first-letter     /* Primeira letra do primeiro parágrafo que é filho direto de um artigo */

blockquote::before { content: open-quote;  }
blockquote::after  { content: close-quote; }
```

### Principais erros

#### 1 - Leitura

```css
/*
Parágrafos que têm a classe intro que são os primeiros filhos de uma secção que é descendente direta de qualquer tipo que é o próximo irmão de uma nav que tem classe menu
*/
nav.menu + * > section :first-child p.intro
```

#### 2 - Espaços

Os espaços contam. Exemplos de falhas:

```css
p.intro             /* parágrafo com classe intro */
p .intro            /* parágrafos que são pais de elementos que têm a classe intro */

p:first-child       /* primeiro filho de um parágrafo */
p :first-child      /* primeiro filho de um descendente de um parágrafo */
```

## Cores

```css
p { 
    color: green;                   /* Todos os parágrafos ficam agora verdes */
    background-color: #336699;      /* A cor pode conter RGB assim... */
    color: rgb(50, 200, 100);       /* ... ou assim */
    opacity: 0.5;                   /* Definir a transparência. 1 é opaco, 0 transparente. */
}     

```