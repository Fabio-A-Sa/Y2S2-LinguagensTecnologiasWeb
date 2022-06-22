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

Quando scripts maliciosos são injectados. Podem ser persistentes, quando são storage na base de dados ou servidor, e reflected, quando não são permanentes, ou DOM Based, quando o script malicioso não deixa o browser (injectado pelo URL por exemplo).

Para prevenir podemos validar cada input ou filtrar o mesmo antes de mostrar:

```php
// Validar
if ( !preg_match ("/^[a-zA-Z\s]+$/", $_GET['name'])) {
  // ERROR: Name can only contain letters and spaces
}

// Filtrar
$name = preg_replace ("/[^a-zA-Z\s]/", '', $_GET['name']);

// Encodificar antes de mostrar no HTML final
<?=htmlentities($post['text'])?>     // encodes all characters
<?=htmlspecialchars($post['text'])?> // encodes only special chars
```

Há que ter um especial cuidado nos códigos das cookies enviadas para o servidor. Para mitigar a situação:

```php
session_set_cookie_params(0, '/', 'www.fe.up.pt', true, true);
```

### Cross-site Request Forgery (CSRF)

Consiste em usar a sessão (cookie) para efetuar pedidos ao servidor em nome de outra pessoa. Para mitigar a ação, é gerar um tocken novo por sessão e em ações sensíveis enviá-lo juntamente com os dados, de modo a verificar a ligação e se o tocken é o mesmo:

```php
session_start();
if (!isset($_SESSION['csrf'])) {
  $_SESSION['csrf'] = generate_random_token();
}

<form action="transfer.php">
  //...
  <input type="hidden" name="csrf" value="<?=$_SESSION['csrf'])?>">
</form>

session_start();
\\...
if ($_SESSION['csrf'] !== $_POST['csrf']) {
  // ERROR: Request does not appear to be legitimate
}
```

### Man-in-the-middle Attack

Quando a comunicação entre dois sistemas (client-server por exemplo) é interceptada. A solução é usar uma criptografia assimétrica (a chave que descodifica não é a mesma que assina), tal como RSA. Non entanto isto não é o suficiente e é necessário recorrer a CA (certificate authority) para garantir a autenticidade das mensagens enviadas.

### Credential Storage

As Passwords devem ser passadas ao servidor por POST, para não aparecerem no URL da request, e devem ser colocadas na base de dados já cifradas com a técnica de salt. Garante-se que duas palavras-passe iguais não vão ter o mesmo hash (as lookup tables já não funcionam).

```php
  $options = ['cost' => 12];
  $stmt = $db->prepare('INSERT INTO users VALUES (?, ?)');
  $stmt->execute(array(
    $username,
    password_hash($password, PASSWORD_DEFAULT, $options))
  );
  $stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
  $stmt->execute(array($username));
  $user = $stmt->fetch();
  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $username;
  }
```