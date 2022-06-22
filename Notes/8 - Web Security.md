# 8 - Web Security

Uma vulnerabilidade é uma fraqueza na aplicação, por descuido de implementação ou design, e um ataque é a exploração dessas vulnerabilidades. 

## Ataques

### Path Transversal Attack

Quando através do URL (ou de includes em PHP), consegue-se aceder a conteúdos que estão fora do escopo da aplicação. Exemplo:

```js
const URL = "http://www.foo.com/../../database.db'
```

### SQL Injection

Quando uma query fica mal preparada e há injeção nos argumentos de código parcial que cancela a ação da pesquisa inicialmente prevista e faz retornar dados sensíveis da base de dados. Como contornar o problema em PHP:

```php
$stmt = $dbh->prepare('SELECT * FROM items WHERE title = ?');
$stmt->execute(array($title));
$items = $stmt->fetchAll();
```

### Cross-Site Scripting (XSS)

