# Preparação para o Exame

## Tópicos

1. HTML
2. CSS
3. PHP

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

