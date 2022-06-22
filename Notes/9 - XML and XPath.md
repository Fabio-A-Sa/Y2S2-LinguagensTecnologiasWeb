# 9 - XML and XPath

eXtensible Markup Language é uma linguagem markup, conjunto de palavras e símbolos que descrevem a identificação ou funções de componentes de um documento. O standard é o SGML, que é mais genérica e de onde também deriva o HTML.

## Características

- Só tem uma raiz;
- Contém um ou mais elementos;
- Os elementos têm de estar dentro dos outros (abrir e fechar) correctamente, tal como HTML. Se assim for, então é considerado bem formado;
- Se uma tag não tiver nada lá dentro então pode ser fechada logo com uma barra;
- Ser válido é diferente de ser bem formado;
- O XML é válido quando está de acordo com DTD ou XSD ou Relax NG como vemos a seguir:

### DTD

Document Type Declaration, define os nomes, o típo de conteúdo dos elementos e atributos e a sequência dos elementos no documento. Ou seja, define a estrutura em árvore do documento. 

```xml
<input type="text" required="required"/>
```



