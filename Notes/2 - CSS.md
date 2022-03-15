# 2 - CSS

Cascading Style Sheet, linguagem usada para formatar o estilo da página HTML. O CSS 1 foi criado em 1996 e atualmente está em vigor a versão 3, datada de 2011-2012. É baseada em dois conceitos: 

1. Seletores
Permite selecionar elementos do HTML para aplicar estilos

2. Propriedades
Define o estilo de cada elemento

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