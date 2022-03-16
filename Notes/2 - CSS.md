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
aside a /* Seleciona todos os 'a' que descendem de um 'aside' */
aside > a /* Seleciona todos os 'a' que descendem diretamente de um 'aside' */
.into + p /* Seleciona o próximo irmão 'p' de um p que contenha a classe 'intro' */
.selected ~li /* Seleciona todos os próximos irmãos 'li' depois de um 'li' de classe 'selected' */
```

### Pseudo-classes



### Pseudo-elements

