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
```

### Pseudo-elements

Forma de selecionar de forma lógica partes que não são realmente elementos, como por exemplo a primeira letra do parágrafo.

```css

```