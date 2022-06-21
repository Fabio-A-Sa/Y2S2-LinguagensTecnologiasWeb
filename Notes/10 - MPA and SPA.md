# 10 - MPA and SPA

## MPA

Multi Page Application é a Web clássica. Em cada interação renderiza uma página diferente, muitas vezes com recurso ao total refresh do sistema e a uma action pelo servidor. Não é fácil reusar o backed, como APIs, apesar de ser fácil de entender. É lenta e as páginas a carregar a seguir já contém muito código repetido. 

Com AJAX os problemas são parcialmente atenuados (tal como fizemos no projecto). No entanto ainda há requests que fazem o reload integral da página, algo que custa recursos e tempo de processamento.

## SPA

Single Page Application vem revolucionar a Web clássica e o já conhecido MPA. Numa primeira interação há carregamento do HTML (mais lento do que em MPA, devido aos scripts) que irá perdurar até ao final do ciclo de utilização da aplicação. Todas as outras interações ficam a cargo do AJAX para mais rapidamente ser percebida pelo utilizador, sem qualquer reload. Os utilizadores não necessitam de esperar pelo término da interação para fazer a seguinte.

Com SPA ou MPA o back button funciona para todas as situações e ao mesmo tempo copiar e enviar o URL acaba por salvar o estado atual da navegação pelo site/aplicação. É mais cómodo a todos os níveis para os utilizadores. No entanto uns carregam só partes do HTML e outro todo o conteúdo.

## Renderização de HTML

- CSR: Client Side Rendering, o browser recebe dados de diferentes formas (XML, JSON) e transforma em HTML;
- SSR: Server Side Rendering, o browser recebe já HTML dado pelo servidor;

## PWA

Progressive Web Pages. Aplicações web que possuem recursos nativos mas com muito alcance. São instaláveis, tem armazenamento local (cache), usam APIs das Web e funcionam em vários dispositivos (responsivo). Não degradam a experiência do utilizador ao serem usadas em navegadores mais antigos.

