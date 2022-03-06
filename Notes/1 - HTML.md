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

Para tabelas de estrutura mais complexa e que exigem merge de células na horizontal e/ou vertical. [Slide 43](https://web.fe.up.pt/~arestivo/slides/?s=html5#43) para consulta futura:

```html
<table>
  <tr>
    <td>A</td><td colspan="2">B</td>
  </tr>
  <tr>
    <td rowspan="2">C</td><td>D</td><td>E</td>
  </tr>
  <tr>
    <td colspan="2">F</td>
  </tr>
  <tr>
    <td colspan="3">G</td>
  </tr>
</table>
```

Para tabelas de estrutura mais complexa, com um header, um body e um footer, aconselha-se a usar as seguintes tags. Assim com javascript é possível fazer scroll do conteúdo do body sem afectar o nome principal das colunas:

```html
<table>
  <thead>
    <tr><th>A</th><th>B</th><th>C</th></tr>
  </thead>
  <tfoot>
    <tr><td>100</td><td>200</td><td>300</td></tr>
  </tfoot>
  <tbody>
    <tr>
      <td>a</td><td>b</td><td>c</td>
    </tr>
    <tr>
      <td>d</td><td>e</td><td>f</td>
    </tr>
  </tbody>
</table>
```

Para não estar a repetir atributos em todas as tags de determinadas linhas ou colunas, pode-se usar `<colgroup>` e `<rowgroup>`:

```html
<table>
  <colgroup>
    <col span="2" class="firsttwo">
    <col class="middle">
    <col span="2" class="lasttwo">
  </colgroup>
  <tr>
    <td>A</td><td>B</td><td>C</td><td>E</td><td>F</td>
  </tr>
</table>
```

Forms, `<forms>`, tem uma action que indica qual é do URL do serviço que irá processar os dados e um method, que pode ser "get" quando os valores são mandados por URL ou "post" quando são mandados por HTTP:

```html
<form action="save.php" method="get">
    <!-- form controls go here -->
</form>
```

Tipos de input:

```html
Date: <input type="date" name="date" value="2020-10-15">
Password: <input type="password" name="password" value="mysecretpassword">
Telephone: <input type="tel" name="number" value="987654321">
Email: <input type="email" name="email" value="yourEmail@email.com">
Search: <input type="search" name="number" value="something">
URL: <input type="url" name="url" value="www.something.pt">
Color: <input name="color" type="color" value="#336699">
Hiden: <input type = "hiden" name = "username" value = "me">

Address: <input type="text"                              <!-- Tipo do input               -->
                name="address"                           <!-- Nome do input               -->
                placeholder="your main address"          <!-- Texto que aparece na caixa  -->
                required="required"                      <!-- Se é de escrita obrigatória -->
                disabled >                               <!-- Se é permitido escrita      -->

Number: <input type="number" name="number"               <!-- Podem ter vários atributos  -->
               value="42" max = 50 min = 10 step = 2 >
```

Datas em HTML

```html
Date: <input name="date" type="date" value="2020-10-20" min="2020-10-01">
Time: <input name="time" type="time" value="10:00:30">
Date and Time: <input name="datetime" type="datetime-local" value="2020-10-20T10:00">
Month: <input name="month" type="month" value="2020-10">
Week: <input name="week" type="week" value="2020-W09">
```

Checkbox

```html
 <!-- :vehicle=Bike&vehicle=Car -->
<p>How do you go to scholl?</p>
<input type="checkbox" name="vehicle" value="Bike">Ride a bike
<input type="checkbox" name="vehicle" value="Car" checked>Drive a car

<!-- Só uma de várias opções, :gender=male -->
<p>Your gender</p>
<input type="radio" name="gender" value="male" checked="checked">Male
<input type="radio" name="gender" value="female">Female
```

Upload de ficheiros

```html
<p>Upload:</p> 
<form action="upload_file.php" 
      method="post" enctype="multipart/form-data">    <!-- Obrigatório             -->
      <input type="file" name="file" 
             accept="image/png,image/jpeg"            <!-- Ficheiros que aceita    -->
             multiple >                               <!-- Aceita vários ficheiros -->
</form>

```


<br>

### Bibliography:
[HTML Slides](https://web.fe.up.pt/~arestivo/slides/?s=html5#1), André Restivo