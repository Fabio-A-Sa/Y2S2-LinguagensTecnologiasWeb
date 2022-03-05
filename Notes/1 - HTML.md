# 1 - HTML

HTML, Hyper Text Markup Language, é a linguagem estrutural e semântica de páginas web, escrita através de elementos sem preocupação com a apresentação. <br>
Além da sintaxe, é também importante a semântica que descreve o que cada palavra significa, para a utilização por parte de bots, de desenvolvedores e de browsers especiais.

## Elementos HTML

### 1. Tags

Escritas entre `<` e `>`, com quase todas a fecharem numa `/`. São preferencialmente escritas em letra minúscula:

```html
<html>
    <p>My first line of HTML!</p>
    <br>
</html>
```

### 2. Atributos

As tags podem conter atributos, alguns opcionais e outros obrigatórios. As aspas não são obrigatórias em HTML5, mas são recomendadas:

```html
<img title = "Dog" src = "dog.png" alt = "a little dog" >
<input type = "checkbox" checked disabled = "disabled" >
```

### 3. ID e Class

Todo o elemento pode ter várias classes (o "tipo" do elemento) e apenas um id (o "nome" do elemento):

```html
<p class "UP">
    <img id = "FEUP" src = "FEUP.png">
    <img id = "FCUP" src = "FCUP.png">
</p>
```

## Documentos HTML

Estrutura básica:

```html
<!DOCTYPE html>
<html>
    <head>                                <!-- Head: O nome do topo da página do browser -->
        <title>A simple web page</title>
    </head>
    <body>                                <!-- Body: Todo o outro conteúdo da página -->
        <p>Content</p>
    </body>
</html>
```

Nota:
    Espaços em branco
    nunca tal tal

    exemplo:
    
    ```html
    <pre>
    ```


<br>

### Bibliography:
[HTML Slides](https://web.fe.up.pt/~arestivo/slides/?s=html5#1), André Restivo