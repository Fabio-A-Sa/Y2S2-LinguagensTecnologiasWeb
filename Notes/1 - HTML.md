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

Espaços em branco ou mudanças de linha podem ou não ser considerados

```html
<pre>
    <textarea>
        "The Old Pond" by Matsuo Bashō
    </textarea>
    An old silent pond
        A frog jumps into the pond—
Splash! Silence again.
</pre>
```

O texto pode ser tratado de acordo com a sua semântica

```html
<em>emphasized</em>         <!-- emphasized                      -->
<small>small</small>        <!-- smaller                         -->
<strong>strong</strong>     <!-- important                       --> 
<sub>subscripted</sub>      <!-- subscripted                     -->
<sup>superscripted</sup>    <!-- superscripted                   -->
<ins>inserted</ins>         <!-- inserted                        -->
<del>deleted</del>          <!-- deleted                         -->
<mark>highlighted</mark>    <!-- marked/highlighted              -->
<pre>...</pre>              <!-- preformatted text               -->
<code>...</code>            <!-- computer code                   -->
<kbd>...</kbd>              <!-- keyboard input                  -->
<samp>...</samp>            <!-- sample computer code            -->
<var>...</var>              <!-- a variable                      -->
<abbr></abbr>               <!-- an abbreviation or acronym      -->
<address></address>         <!-- contact information for someone -->
<time></time>               <!-- a time of the day               -->
<progress></progress>       <!-- a progress of a task            -->
<bdo></bdo>                 <!-- the text direction              -->
<blockquote></blockquote>   <!-- quoted from another source      -->
<q></q>                     <!-- an inline (short) quotation     -->
<cite></cite>               <!-- the title of a work             -->
<dfn></dfn>                 <!-- a definition                    -->
```

A tag `span` pode ser usada com classes e ids para representar e manipular tudo:

```html
<span class = "something" >this is an important text</span>
```

Os links podem ser colocados com a tag `<a>`:

```html
<p>
    Era uma vez... <br>
    Autor: <a href = "www.wikipedia.pt" >Desconhecido</a> <br>
</p>
```

As imagens podem ter vários atributos e legendas:

```html
<figure>
    <img
        src = "../folder/anotherFolder/aSimpleImage.png"
        alt = "A simple example image description"
        title = "Example"
        width = "200" height = "350"
    >
    <figcaption>Fig 1: Uma imagem que serve de exemplo</figcaption>
</figure>

```

Headings, para dar destaque e volume ao texto apresentado:

```html
<h1>Title</h1>                                  <!-- only one per document -->
<h2>Subtitle</h2>
<h3>Section</h3>
<h4>Sub-section</h4>
<h5>Each one less important...</h5>
<h6>...than the other</h6>
```

Elementos de secção e significados. Headers e Footers:

```html
<article>Usado para um elemento completo e estruturado, um blog post ou comentário</article>
<section>Usado com heading por um grupo temático</section>
<nav>Uma secção com links</nav>
<aside>Para um conteúdo separado do geral. Uma espécie de à parte</aside>

<main>                                             <!-- Zona principal -->                 
    <section id="posts">
    <h1>Posts</h1>
    <article>                                      <!-- Artigo                           -->
        <header>                                   <!-- Cabeçalho do artigo              -->
        <h2>Title of the Post</h2>                 <!-- Pode conter títulos e subtítulos -->
        <h3>And the subtitle</h3>
        </header>
        <div id = "introduction" >                 <!-- As divs são semânticas           -->
        <p>The post content introduction</p>       <!-- Conteúdo principal / texto       -->
        </div>
        <p>More content</p>                                
        <footer><p>Author of the post</p></footer> <!-- No final, o rodapé               -->
    </article>
    </section>
</main>
```

As listas de elementos, `<li>`, podem ser ordenadas `<ol>` ou não ordenadas `<ul>`. Podem ter inúmeros atributos:

```html
<ul>                                              <!-- Nested lists -->
    <ol type = "I" start = "4" reversed >
    <li>An item</li>                              <!-- IV   -->
    <li value = "8" >Another item</li>            <!-- VIII -->
    <li>And another one</li>                      <!-- VII  -->
    </ol>
    <ul type = "I" start = "4" reversed >
    <li>An item</li>                              <!-- IV   -->
    <li value = "8" >Another item</li>            <!-- VIII -->
    </ul>
</ul>
```

As listas `<dl>` podem ser usadas como dicionários, com termos `<dt>` e definições `<dd>`

```html
<dl>
  <dt>A term</dt>
  <dd>And its definition</dd>
  <dt>This one</dt>
  <dd>Has a different definition</dd>
  <dd>And an alternative definition</dd>
</dl>
````

Tabelas `<table>` são constituidas por linhas `<tr>` e células de dados `<td>`. Os cabeçalhos podem ser do tipo `<th>` para headers e indicar o seu scope (se é de coluna ou linha). Pode ter um título `<caption>`:

```html
<table>
    <caption>Tabela 1: Exemplo sem CSS</caption><br>
    <tr>
        <th scope = "col">A</th>
        <th scope = "col">B</th>
        <th scope = "col">C</th>
    </tr>
    <tr>
        <td>D</td><td>E</td><td>F</td>
    </tr>
</table>
```

Para tabelas de estrutura mais complexa e que exigem merge de células na horizontal e/ou vertical

```html

```


<br>

### Bibliography:
[HTML Slides](https://web.fe.up.pt/~arestivo/slides/?s=html5#1), André Restivo