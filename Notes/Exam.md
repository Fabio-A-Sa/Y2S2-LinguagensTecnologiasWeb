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


## 3 - PHP

