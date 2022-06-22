# 9 - XML and XPath

## XML

eXtensible Markup Language é uma linguagem markup, conjunto de palavras e símbolos que descrevem a identificação ou funções de componentes de um documento. O standard é o SGML, que é mais genérica e de onde também deriva o HTML.

### Características

- Só tem uma raiz;
- Contém um ou mais elementos;
- Os elementos têm de estar dentro dos outros (abrir e fechar) correctamente, tal como HTML. Se assim for, então é considerado bem formado;
- Se uma tag não tiver nada lá dentro então pode ser fechada logo com uma barra;
- Ser válido é diferente de ser bem formado;
- O XML é válido quando está de acordo com DTD ou XSD ou Relax NG como vemos a seguir:
- Tal como CSS, há possibilidade de usar selectores para os diferentes elementos através do XPath;

#### DTD

Document Type Declaration, define os nomes, o típo de conteúdo dos elementos e atributos e a sequência dos elementos no documento. Ou seja, define a estrutura em árvore do documento. 

#### XSD

É mais específica do que DTD, por exemplo só posso ter tags 'b' dentro de um 'a' se o 'a' estiver dentro de um 'c'. Tem documentação dentro do próprio documento, tem suporte a herança e suporte a namespaces. 

#### Relaxing NG

Simples de entender, suporta namespaces e é suficientemente auto-descritiva. 

### Namespaces

São identificados por URI (Uniform Resource Identifier), para usar código proveniente de várias linguagens no mesmo documento (parecido com os namespaces do C++). Têm scope.

## XPath

Permite selecionar partes, dados ou elementos do XML. Olha para o documento como uma árvore de elementos, com atributos e parents. É mais completo do que os selectores de CSS.

Em XPath, existem dois nós principais: documento e root do documento. A partir do root do documento é que começam a aparecer os outros elementos.

### Location path

É um cojunto de steps de pesquisa separados por uma barra. Se começar com uma barra '/', começa a pesquisar a partir do documento (nó anterior ao root do documento). Cada step tem:

- Um eixo;
- Um node test;
- Zero ou mais predicados;

```XPath
child::para[position()=1]
```

