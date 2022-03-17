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

## Tópicos

1. Linking to HTML
    - Inline
    - Internal Style Sheet
    - External Style Sheet
2. Selectors
    - Attribute selectors
    - Combining Selectors
    - Pseudo-classes
    - Pseudo-elements
    - Principais erros na seleção

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
article > p:first-of-type::first-letter     /* Letra do primeiro parágrafo que é filho direto de um artigo */

blockquote::before { content: open-quote;  }
blockquote::after  { content: close-quote; }
```

### Principais erros

#### 1 - Leitura

```css
/*
Parágrafos que têm a classe intro que são os primeiros filhos de uma secção que é
descendente direta de qualquer tipo que é o próximo irmão de uma nav que tem class
menu
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

## Fontes

```css
/* Dá para importar novas fontes com o Google-Fonts */
@import url('https://fonts.googleapis.com/css?family=Lora:400,700');

p {
    font-family: "Arial";           /* Podemos escolher as fontes. Usar safe-fonts. Slide 54. */
    font-family: serif;             /* Serif para leituras, sans-serif para títulos */
}

p.introduction {
    font-weight: bold;              /* Definição do peso da fonte */
    font-size: 1.2em;               /* Definição do tamanho. Ver mais à frente */
}

span.autor {
    font-style: italic;             /* Definição do estilo da fonte*/
}
```

## Texto

```css
#menu a {
    /* none, underline, overline, line-throught */
    text-decoration: none;          /* Para remover underlines de links */

    /* left, right, center, justify */
    text-align: center;             /* Em relação ao container que o contém */

    /* uppercase, lowercase, capitalize */
    text-transform: capitalize;     /* todo o 'a' descendente do id menu fica capitalizado*/

    text-ident: 10px;               /* primeira linha de cada parágrafo */
}
```

## Unidades de comprimento

- `Absolute units` {mm, cm, in, pt, pc, px}, pouco usadas menos o px;
- `Font relative units` {rem, em}, **rem** para fonte do elemento raiz e **em** para fonte do elemento pai;
- `Viewport-percentage units`{vw, vh, vmin, vmax} para partes visíveis do documento/janela em 1% do valor original. If the viewport is 600x400 pixels, vw = 6px, vh = 4px, vmin = 4px, vmax = 6px.
- `Percentage` { $i% }, pouco usadas, relativas ao parente

```css
html { font-size: 2rem; } /* 32px */
p    { font-size: 2rem; } /* 64px regardless of its location     */
body { font-size: 2em;  } /* 64px the parent is the html element */
```

## Box model

Todos os elementos de uma página são rectangulares e têm uma borda, visível ou não. O padding é a parte interior, entre o conteúdo e a borda, e a margin é a parte externa entre a borda e outro elemento.

<p align = "center" >
    <img src = "https://web.fe.up.pt/~arestivo/slides/assets/css3/box-model.svg" >
</p>

```css
section {
    box-sizing: border-box; /* Comprimento/largura passam a incluir padding/borda -> mais fácil de trabalhar */
    width: auto;
    max-width: 40em;        /* Se depender do tamanho do pai, por exemplo */
    height: 50px;
    min-height: 100px;      /* Se depender do tamanho do pai, por exemplo */
}
```

### Margin, padding e border

Seguem sempre a ordem top, right, bottom, left (sentido horário, a começar no meio-dia). A distância entre dois elementos não é simplesmente formada, processo conhecido como border colapse, é dado pela fórmula:

```c++
int borderCollapse(const Element &e1, const Element &e2) {
    return std::max(e1->margin, e2->margin);
}
```

#### Alguns exemplos de transformações em CSS

```css
#menu {
    padding: 1em;           /* Modifica tudo */
    margin: 1.5em 1em 3em;  /* Top = 1.5em, Right/Left = 1em, Bottom = 3em */

    /*
    border: [width] [style] [color]
    style :: dotted, dashed, solid, double, groove, ridle, inset, outset
    Existem ao todo 12 propriedades modificáveis: border-{top, right, left, bottom}-{style, width, color}
    */
    border: 1px solid blue;

    /*
    boder-{top, bottom}-{right, left}-radius para arredondar cantos
    para fazer um círculo, border-radius = 50%;
    */
    border-radius = 50%;
}
```

## Background image

```css
nav#menu {
    background-image: url("squares.png");
    background-position: left top;          /* Imagem com o canto superior esquerdo encostado*/

    /*
        fixed -> imagem de fundo fixa em relação ao ponto de vista
        scroll -> em relação ao elemento
        local -> em relação ao conteúdo
    */
    background-attachment: local;
    background-repeat: repeat;
}
```

### Exemplo de uma transformação

```css
.box {
    margin: 0 auto;
    border: 1px solid;
    width: 100px;
    height: 100px;
    background-color: #0000FF;
    transition: width 2s, height 2s, background-color 2s, transform 2s, border-radius 4s;
}
.box:hover {
    background-color: #FFCCCC;
    width: 150px;
    height: 150px;
    transform: rotate(180deg);
}
```

## O Flow da página Web

O fluxo da página é por default da esquerda para a direita e de cima para baixo. Podemos ter elementos:

- `Em bloco`, ocupam a linha toda com o mesmo bloco. Não ocupam mais espaço vertical por isso.
- `Inline`, cada elemento ocupa o mínimo possível lateralmente, e em cada linha há dois ou mais.
- `None`, remove o elemento da página completamente.
- `Inline-block`, ocupam espaço vertical e horizontal.

```css
img {
    display: block;
}
```

### Mudança do flow default da página

- `Static`: é o default. fica com o seu espaço no documento.
- `Relative`: relativo à sua posição original. Dá para cima, baixo, direita e esquerda. Ocupa espaço.
- `Fixed`: o elemento deixa de fazer parte do flow, deixa de ocupar espaço e fica noutra camada, de maneira a que o scroll não o mexe. Muito interessante para menus.
- `Absolute`: fica noutra camada, deixa de ocupar espaço e fica posicionado em relação ao parente mais próximo ou a outro float que esteja do lado.
- `Float`: remove o elemento do flow do documento e deixa-o para a direita ou para a esquerda em relação ao partente mais próximo. Interessante para textos / imagens e o texto à volta da imagem. A opção "clear" garante que nenhum elemento seguinte ocupe a outra parte da linha.

## Flexbox

Para que o parent e os seus fihos sejam flexíveis e adaptáveis a diferentes tipos de display. Os elementos da flexbox não podem ser do tipo float e as margens não colapsam com as margens do conteúdo. <br>
O `main axis`é o eixo dos x, onde a maioria dos dados ficarão baseados.

```css
.container {
    display: flex;              /* Comportamento padrão */
    flex-direction: column;     /* Por coluna, como block */
    flex-wrap: wrap;            /* Agrupamento de elementos */

    /*
    Para alinhar os conteúdos entre si, inline
    flex-start, flex-end, center, space-around, space-between, space-evenly
    */
    justify-content: flex-start;

    /*
    Para alinhar os blocos por cima, por baixo...
    flex-start, flex-end, center, baseline, stretch
    */
    align-items: flex-start;

    /*
    Para alterar a ordem original de listas ou elementos
    */
    order: 3;
}
```

### Encolher e Esticar / Grow and Shrink

Por default, flex-grow: 0 (os elementos não esticam por padrão) e flex-shrink: 1 (os elementos encolhem na mesma proporção)

```css
.item:nth-child(1) {
  flex-grow: 1;
}
.item:nth-child(2) {
  flex-grow: 2;  
}

.container { 
    gap: 2em 1em; /* Intervalo entre linhas (row-gap), intervalo entre colunas (column-gap) */
}
```

## Grid

Permite colocar e alinhar elementos em linhas e em colunas de diferentes tamanhos. Por default, `display: grid` aparece sempre tudo numa coluna.

```css
.container {
  grid-template-columns: 5em 1fr 2fr;           /* 3 colunas */
  grid-template-rows: repeat(2, 2em);           /* 2 linhas */
}
```

Definição de áreas de forma mais visual. De forma mais exaustiva ver [aqui](https://web.fe.up.pt/~arestivo/slides/?s=css3#145).

```css
.container {
  grid-template-columns: auto 1fr;
  grid-template-rows: auto auto 1fr auto;
  grid-template-areas: "header header"
                       "menu1  content"
                       "menu2  content"
                       "menu2  footer";
}
.header { grid-area: header; }
.menu1 { grid-area: menu1; }
.menu2 { grid-area: menu2; }
.content { grid-area: content; }
.footer { grid-area: footer; }
```

## Cascading

Os filhos têm tendência a herdar as propriedades do pai, como por exemplo a cor. A tag `a` tem default azul, pois são links. No entanto dá para trocar, tendo regras mais específicas para cada uma. Ver [aqui](https://web.fe.up.pt/~arestivo/slides/?s=css3#163) a regra das especificações. <br>
Ordem de importância das espedicificações:

1. Origin (author, user, default).
2. Specificity (bigger is better).
3. Position (last is better).

## Variáveis

Para não ter de trocar o conteúdo de cada cor em todo o site. Assim define-se no início, por exemplo no body, uma variável e é isso que se utiliza no código.

```css
body {
  --main-bg-color: blue;
  --default-margin: 1em;
}

body header {
  margin: var(--default-margin);
}
```

## Sites responsivos e adaptativos

#### A maior parte dos sites tratam-se de uma mistura destas duas técnicas:

- `Responsivos`: Múltiplos layouts fluídos, o próprio CSS trata de fazer essa transição.
- `Adaptativos`: Vários CSS, um para cada ocasião. Múltiplos layouts fixos.

### Como criar sites responsivos:

```html
<!-- Indicação expressa para o navegador no meta do head em html -->
<meta name="viewport" 
      content="width=device-width, initial-scale=1.0"
>
```

Podem existir diversos CSS indicados no HTML (1) ou só um ficheiro CSS em que existem separações de acordo com os diversos tamanhos de display. <br>

1. Media = "{all -> tudo, print -> impressoras, screen -> ecrans de computadores, speech -> sintetizadores de fala}". Orientation = "{portrait, landscape}"

```html
<link rel="stylesheet"
      media="(min-width: 600px) and (max-width: 800px)" 
      media="(min-width: 800px) and screen, print" <!-- Outra forma, com operadores lógicos -->
      href="medium.css" 
/>
```

2. 

```css
@media (max-width: 600px) {
  .sidebar {
    display: none;
  }
}
```

### Validação
Há sites que permitem validar e ver os erros contidos no código CSS. Por exemplo [este](http://jigsaw.w3.org/css-validator/).

### Bibliography:
[CSS Slides](https://web.fe.up.pt/~arestivo/slides/?s=css3#1), André Restivo