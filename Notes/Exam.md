# Preparação para o Exame

## Tópicos

1. HTML
2. CSS
3. PHP
4. JavaScript e DOM
5. Regular Expressions
6. HTTP
7. Web Security
8. XML e XPath
9. MPA e SPA

## 1 - HTML

- Apesar dos IDs serem únicos para a mesma página, duas páginas podem conter elementos com o mesmo id;
- A width e height sevem apenas para o browser alocar espaço para a imagem carregada, não para fazer o resize;
- O HTML só é válido quando se utiliza um h1 por página;
- Uma definition list \<dl> contém termos \<dt> e definições \<dd>;
- Uma tabela \<table> tem table rows \<tr> e dentro delas tem table data \<td>. Pode conter table headers \<th> com scope = {'row', 'col'};
- Uma tabela é formada por linhas, cada \<td> pode ocupar uma {row,col}span = X;
- O charset encoding é recomendado ser utf-8 e colocado no \<head> da página;
- Para caracteres especiais, usar o & seguido do código e depois de ponto e vírgula;

## 2 - CSS

- O código de CSS deve ser separado do HTML usando \<link rel="stylesheet" href="style.css">, apesar de poder ser inline em cada elemento ou com recurso a \<style> dentro do \<head> da página;
- \* para tudo, \# para ids, . para classes, > para filhos diretos, + para o irmão seguinte, ~ para todos os outros irmãos seguintes;
- Pseudo classes são para elementos existentes, como links que já foram visitados. Usa-se :, como a:visited que seleciona todos os links visitados;
- Pseudo elementos são para elementos lógicos, que não são referenciados no HTML. Por exemplo a primeira letra do texto de um parágrafo. Usa-se ::, como #text::first-letter, que seleciona a primeira letra do texto que tem id = text;
- Atenção: o código `:not(article) p` pode selecionar um parágrafo que é filho direto de um artigo. Basta que a árvore contenha algum elemento que não seja um artigo, como por exemplo section > article > p. Em `:not(article) > p` isso já não acontece;
- As fontes serifadas são melhores para a leitura de textos, as sans-serife para impressão ou títulos;
- É aconselhado usar tamanhos `rem` (em relação ao root, html, que normalmente tem 16px) ou `em` (em relação ao pai) para as escalas de texto e de blocos;
- Devido ao margin collapse, a distância entre dois elementos é sempre igual ao `max(e1.margin, e2.margin)` e não à sua soma;
- O display dos elementos podem ser block (provocam sempre uma nova linha), inline (colocados na mesma linha desde que caibam, margin/padding só empurra os outros elementos lateralmente), inline-block (colocados na mesma linha, mas o padding/margin de cima e de baixo passam a ocupar também espaço) e none (deixa de ocupar espaço, desaparece);
- A position pode ser static (o default), relative (parecido com o default mas há translação em relação à posição original), fixed (deixa de estar no flow, não ocupa espaço nele e segue o scroll da página, está posicionada de acordo com a janela do browser) e absolute (como o fixed, mas não segue o scroll, fica posicionada de acordo com o primeiro parent não estático, o body por default);
- O float remove o elemento do flow e coloca-o em left ou right. É interessante para textos;
- Flexbox (.container display:flex) coloca os blocos inline. Se os tamanhos forem calculados de acordo com o parent, então o site fica responsivo;
- Grid coloca os blocos em qualquer posição dentro da grelha escolhida, com colunas e linhas de tamanhos distintos;
- Por default, as propriedades de cada elemento são inherit. 
- As especificidades são do tipo (a, b, c) com a = id, b = classes, pseudoclasses e atributos, c = elementos, pseudoelementos. A comparação deve ser feita por ordem e entre selectores que apontam para o mesmo elemento;
- O site é responsivo quando tem layouts fluídos, é adaptativo quando tem layouts fixos para várias telas;

## 3 - PHP

- Os escapes só funcionam com aspas;
- Para usar variáveis globais é necessário declará-las como tal. Senão vai criar uma nova instância dentro dessa função;
- Apesar de PHP não ser fortemente tipada, pode-se usar o coercive typing para gerar warnings quando os tipos não são os correctos para as operações em funções ou classes;
- Mesmo indicando o tipo, o compilador tenta transformar os dados para não dar erros. sum(int "1.2", int "3.6") dará 4 por exemplo. A menos que se use declare(strict_types = 1);
- É obrigatório colocar private, public or protected na declaração dos atributos de uma classe;
- É obrigatório colocar $this-> antes de cada atributo, caso contrário instancia outra variável e trabalha com null;
- Static é usado para utilizar a variável estática (possivelmente modificada) da classe. Self é usada para utilizar a variável estática do parent;
- PDO é PHP Data Objects e serve como uma interface que manipula de igual forma vários tipos de bases de dados. Coneção, prepare e execute(array()), com fetch(), uma linha, ou fetchAll(), todas as linhas;
- Na base de dados é importante garantir o atributo PDO::FETCH_ASSOC e PDO::ERRMODE_WARNING para um melhor debug;
- A sessão (session_start()) deve ser instanciada antes de qualquer operação, pois usa cookies;
- header("Location: index.php") não redireciona a páginas, apenas adiciona informação ao header do HTTP (que será interpretada depois do die())
- include e require (once ou não) são semelhantes, mas o último lança um erro se não encontrar o ficheiro;
- os includes em PHP são feitos de acordo com o próprio ficheiro. É importante por isso garantir a mesma profundidade em relação ao root de todos os ficheiros;

## 4 - JavaScript e DOM

- Se usar o modo strict não permite variáveis globais não usadas, variáveis declaradas com var e alguns warnings são transformados em erros;
- Var é mau pois só tem function scope e são as primeiras coisas processadas nesse scope;
- Variáveis usadas não declaradas acabam por tornar-se globais, pois são processadas camada a camada até encontrar o local de instanciação, até que no fim pode chegar ao window ou global object;
- '11' + 31 = 1131, se não houver dois tipos inteiros, o inteiro é transformado em string e concatenado;
- Qualquer comparação, se não for de tipos iguais, então são primeiro transformados em números. Os objectos são comparados por referência;
- Tudo comparado com null ou undefined retorna falso;
- As funções podem ser tratadas como variáveis, ao manipular ter em atenção para não usar parêntises;
- this refere-se sempre ao objecto a manipular, ou ao contexto numa função, arrow functions não têm um this;
- const person = { name: 'John Doe' }; person.name = 'Jane Doe' é permitido. Constante é o objecto e não os atributos. Podemos adicionar mais atributos também, tanto em versão array como objecto;
- Cada função em Javascript tem dentro um protótipo, sempre que é modificado (Person.prototype.age) os outros objectos recebem também o novo atributo. Não basta modificar um objecto, tem de ser o próprio protótipo que a criou;
- Apply e Call para mudar o contexto de uma função, para que o this seja de outro objecto. O Apply pode ter uma lista de argumentos. O Bind() retorna uma função para que possa ser executada depois e não no momento, útil para addEventListener;
- Atributos começados com _ são read-only, mesmo que person.age = 50 não altera o valor original do construtor. Atributos começados com # são privados e dão erro ou undefined;
- For... in é para propriedades de objectos, For.. of é para iterar num array, por exemplo;
- Promise é um objecto que recebe uma função de dois parâmetros: resolve, reject. Útil para ler ficheiros, usando uma função que no fundo retorna uma promessa;
- Await só funciona dentro de funções async;
- document.location é o próprio URL da página. O document é uma árvore de Nodes, dos quais surgem os HTMLElements;
- async no head do HTML, colocar a tag script fechada e com async, para que o javascript corra enquanto a página é criada, ou defer para o javascript só correr quando o HTML esteja todo carregado;
- Os eventos são apanhados de fora para dentro e atuam de dentro para fora. section > article > p iria originar 3 capturas e 3 bubbling;

## 5 - Regular Expressions

- Atenção aos caracteres que precisam de "\" antes;
- A expressão regular /<.+>/ não apanha só as tags de HTML mas sim todo o conteúdo interno. As RE são greedy. Para apanhar só tags usar /<.+?>/ ou simplesmente /<[^>]+>/;

## 6 - HTTP

- HTTPS é HTTP com uma camada de segurança TSL/SSL. Ambos são stateless e é necessário enviar cookies para "permanecer" na mesma sessão, ou seja, para o servidor reconhecer quem fez o pedido;
- URI contém URN e URL. São todos identificadores de recursos;
- REST é Representational State Transfer, baseia-se em recursos e não em ações.

## 7 - Web Security

- Existem diversos ataques: path transversal, sql injection, cross-site scripting (XSS), cross-site request forgery (CSRF), man-in-the-middle;
- XSS pode ser impedido ao validar, filtrar e codificar para o HTML dados sensíveis / por input;
- CSRF pode ser impedido ao enviar, junto de cada formulário, um token secreto válido apenas para cada sessão;
- Para melhor guardar as palavras passe, usar a técnica de salt diferente para cada palavra passe (mesmo que sejam iguais);

## 8 - XML e XPath

- Cada pesquisa tem um eixo de pesquisa, um nó de contexto e predicados (opcionais);
- Por default, o eixo de pesquisa é child(), ou seja, pesquisa os filhos do nó de contexto;
- Se a pesquisa começar com uma barra, então pesquisa desde o document (e não do document root, que é o nó seguinte);

## 9 - MPA e SPA

- As single page application têm vantagens sob as multiple page applications;
- O HTML pode ser renderizado do lado do utilizador (CSR) ou do lado do servidor (SSR);