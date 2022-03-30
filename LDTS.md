# SPE - Teste de Software

## LDTS separa-se em duas partes: o Desenho e o Teste do Software

### 1 - Desenho

No primeiro ano do curso `aprendemos a programar` em diversas linguagens (Python, C/C++ e Assembly). Agora a ideia é `programar bem`, de forma a quem lê o código (ou quem o vai modificar, melhorar) possa saber o que cada parte faz. Não é boa ideia mandar mensagem (`olha, o que fizeste aqui? e aqui?`).

### 1.1 - GIT

Aprendemos a usar uma `ferramenta de gerenciamento de código`, o GIT, a mais famosa do mundo e adoptada pela grande maioria das empresas. No secundário existe o Trabalho.pptx, TrabalhoFinal.pptx, `TrabalhoFINAL.pptx`, EsteÉQueÉ.pptx... Num projecto de 6000 linhas de código `não temos um ficheiro, por vezes temos dezenas deles`. Alguém do vosso grupo programou errado e o código deixa de funcionar: que chatisse, têm de andar a ler todas as linhas? Com o git podem ver que linhas foram alteradas: o antes e o depois.
O GIT é como se fosse uma `máquina do tempo`, que permite guardar o estado do programa sempre que quisermos e voltar a ver como era o código no dia 30 de Janeiro de 2020. Se tivermos problemas (os chamados bugs), é só voltar ao(s) estado(s) anterior(es). 

### 2 - Teste

É igualmente importante `programar e testar o que foi programado`. Exemplo da calculadora simples com soma de dois números, da tecla para a esquerda e verificar se o Y mantém-se e o X diminuiu uma unidade (coordenadas cartesianas).

### Supaplex

Durante a `maior parte da cadeira estarão a desenvolver um projecto / jogo`. A ideia não é propriamente ter um jogo XPTO mas sim `aprender como se desenvolve o Software seguindo as regras das possíveis empresas`.
A ordem é sempre desenvolver parte -> testar essa parte, de modo a continuar a incrementar o programa de forma mais segura (sem erros -> bugs).

#### Features do Supaplex

1. Vários tipos de blocos / sprites
O Murphy contacta com vários elementos do mapa, desde paredes, pedras, tesouras e comida. Cada `elemento é na verdade uma grelha` / matriz de caracteres (a, b, c, d, e...) pintados (eles próprios e o fundo).
 
2. `Simulação da Gravidade`
As pedras caem sempre que não exista nenhum bloco em baixo delas, tendo um comportamento semelhante ao que acontece na realidade.

3. Movimento das tesouras
As tesouras podem matar o Murphy e mudam de direção sempre que batem nalgum obstáculo. Foram programadas seguindo o plano cartesiano (x, y) e os quatro quadrantes. Por isso a `matemática` é também bastante importante.

## Possíveis perguntas

- A unidade curricular é difícil? Não, deve ser das mais fáceis

- O curso é fácil? Não diria, mas também não é impossível

- Qual foi a maior dificuldade enfrentada no projecto / percurso académico? Projecto: ordenar ideias, Académico: gerir o tempo;

- Que software utilizam normalmente? IDEs (cada um tem a sua linguagem) na sua maioria pagos mas com a conta estudante são gratuitos. Usamos muito os comandos do sistema Unix (Linux ou macOS), o chamado terminal (telinha preta dos Hackers).

- Que linguagens de programação aprendem? Ao longo do curso, passamos por todas um pouco. Até agora Python, C, C++, Java, HTML, CSS, PHP, Assembly, Groovy. 20% do conhecimento dá para resolver 80% problemas.

 - Para entrar no curso precisam de saber programar? Não. Dá-se tudo desde o início, desde a primeira linha de código a projectos mais independentes, como programar e gerir viagens de avião ou gerir as redes da STCP.

 - O inglês é importante? Sem dúvida!