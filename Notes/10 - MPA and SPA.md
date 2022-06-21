# 10 - MPA and SPA

## MPA

Multi Page Application é a Web clássica. Em cada interação renderiza uma página diferente, muitas vezes com recurso ao total refresh do sistema e a uma action pelo servidor. Não é fácil reusar o backed, como APIs, apesar de ser fácil de entender. É lenta e as páginas a carregar a seguir já contém muito código repetido. 

Com AJAX os problemas são parcialmente atenuados (tal como fizemos no projecto). No entanto ainda há requests que fazem o reload integral da página, algo que custa recursos e tempo de processamento.

## SPA

Single Page Application vem revolucionar a Web clássica e o já conhecido MPA. 