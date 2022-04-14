# 3 - PHP

PHP Hypertext Preprocessor foi criada em 1994 por Rasmus Lerdorf. É uma linguagem dinamicamente tipada (não precisamos de dizer o tipo da variável) e é usada normalmente para criar páginas web dinâmicas. <br>
O afamado Hello World:

```php
// Comentário
<p><?php echo 'Hello World'; ?></p>
/* Outro comentário */
```

## Variáveis

As variáveis são case sensitive. Para descobrir o tipo, usar `gettype()`.

```php
$name = 'Fabio';        // string
$age = 19;              // int
$student = true;        // bool
$grade = 10.6;          // float

echo gettype($name);    // string
```

### Assignment

A linguagem funciona tal e qual a linguagem C em relação a apontadores e referências de memória.

```php
$foo = 5;               // int
$foo = 'John';          // string -> não causa qualquer erro
$bar = &$foo;           // by reference, bar and foo are the same
$foo = 'Mary';
echo $bar;              // Mary
echo 10 + '5 batatas';  // 15
```

### Null

É importante notar o *null coalesce operator*:

```php
// $a starts as null
$a = 5;         // 5
$a = null;      // null
$a = 10;        // 10;
unset($a);      // null;
isset($a);      // false -> retorna se a variável está declarada && diferente de null
$bar = $bar ?? $some_default_value; // usando o operador para verificar a aceitar a variável
```

### Debug

Usando a função `var_dump()` ou simplesmente `print_r()` consegue-se obter a estrutura interna de qualquer variável

## Estruturas de controlo:

Iguais às das outras linguagens:

- while;
- do... while;
- for;
- if;
- else;
- continue;
- break;
- switch case;

## Die and Exit

#### Die

Pode receber uma string de erro, que será mostrada antes de acabar completamente com o erro.

```php
 if ($something == "wrong") die ("Something is Wrong");
```

#### Exit

Recebe um inteiro, que retorna no final como símbolo do status. Parecido com a linguagem C++.

```php
if ($everything == "ok") exit(0);
```

### Comparações

Dois iguais para comparar o conteúdo, três iguais para comparar o conteúdo e o tipo. A segunda forma é mais segura.

```php
if (1 == true)          // true
if (1 === true)         // false
if (null == false)      // true
if (null === false)     // true
if ("Car" == true)      // true
if ("Car" === true)     // false
```

## Strings

É diferente usar plicas e aspas. A concatenação é feita com um ponto.

```php
$name = "Fabio";
echo 'This car belong to $name';            // This car belongs to $name
echo "This car belong to $name";            // This car belongs to John
echo 'Hello World!' . " This is $name.";    // contatenação
echo strlen($name);                         // 5
echo substr($name, 1, 3);                   // abi -> começa em #1 e tem comprimento 3

/* Outras funções interessantes */
array explode (string $demimiter, string $str);
string implode (string $glue, array $pieces);
```

## Arrays

Funcionam como maps / dicionários nas outras linguagens. Para cada chave há um valor.

```php
// inicialização
$values = array(); 
$values = array(1, 2, 3, 'John'); 
$values = array('name' => 'John', 'age' => 45, 3 => 'Car');
$values[] = "Boat"; // -> 4 => Boat
$values[0] = 5;  // although they don't need to be defined
$values[1] = 10; // and they don't have a fixed size
$values[2] = 20;

// count returns the size of the array
for ($i = 0; $i < count($values); $i++)
  $sum = $sum + $values[$i];
echo $sum / count($values); // calculates average: 11.666666666667

// foreach
$values = array('name'=>'John', 'age'=>45, 2=>'Car', 'Bicycle');
foreach ($values as $key => $value)
  echo "$key = $value\n";

// important functions
bool in_array (mixed $needle, array $haystack);         // retorna true se o elemento estiver lá dentro, else false
mixed array_search (mixed $needle, array $haystack);    // retorna a chave do elemento se estiver lá dentro
bool array_key_exists (mixed $key, array $array);       // retorna se a chave existe dentro do array, else false
bool asort(array &$array);                              // ordena o array por valor / index
bool ksort(array &$array);                              // ordena o array por chave
bool shuffle(array &$array);                            // random ordenação
$values = array('John', 45, 'Bicycle');
list($name, $age, $vehicle) = $values;                  // retira os elementos para variáveis
``` 

## Funções

Uma função simples, tal como as outras linguagens. Pode conter void, default values, returns de vários tipos (incluindo array), 

```php
function doSomething() {
    echo "done";
}

function sum($a, &$b) {
  return $a++ + $b++;
}

function sum($a, $b = 0, $c = 0) {
  echo $a + $b + $c;
}
```

#### Global variables:

O PHP só sabe que estamos a mexer com variáveis globais se as declararmos como tal. Caso contrário poderá dar warning.

```php
function foo() {
  echo $baz;
}
function bar() {
  global $baz;
  echo $baz;
}
$baz = 10;
foo(); // prints nothing, may result in a warning
bar(); // prints 10
```

#### Coercive Typing

Podemos obrigar a função a aceitar determinados tipos de parâmetro, caso contrário é para usar conversões. Se declararmos `declare(strict_types=1);` então qualquer valor que não seja lançado com o tipo adequado gera um erro. <br>
Uma variável também pode ser nula quando declarada com o tipo e um `?` antes.

```php
/* Recebe inteiros e retorna um inteiro */
function add(int $a, int $b) : int {
  return $a + $b;
}

echo add(1, 4);          // 5 
echo add(1.2, 3.6);      // 4 -> só admite a parte inteira, ou seja, math.floor()
echo add("1.2", "3.6");  // 4 

declare(strict_types=1); // modo restrito, a declarar no início de cada ficheiro PHP

/* Recebe inteiros ou nulos e retorna um inteiro ou nulo */
function add(?int $a, ?int $b) : ?int {
  if ($a === null || $b === null) return null;
  return $a + $b;
}
```

## Classes

Surgiram no PHP 5. Funcionam como as linguagens Python e C++ por exemplo. <br>
Atributos e métodos podem ser públicos, privados e protected. Também há possibilidade de fazer `extend` e `static`. Há também interfaces, que apenas declaram os métodos a serem implementados nas futuras classes. <br>
Se uma classe é `final`, então não pode ser extendida. Se um método é `final`, então não pode ser *override* por uma classe filha.

```php
interface Race {
    public function racing() : string;
}

class Car implements Race {

    /* Atributos */
    private $plate;
    private $driver;

    /* Construtor e métodos */
    public function __construct($driver, $plate) {
        $this->driver = $driver;
        $this->plate = $plate;
    }

    public final function getDriver() : string {
        return $this->driver; // return $driver would have returned null
    }

    public function racing() : string {
        return "vrummmm";
    }
}

/* Declaração */
$car = new Car('John Doe', '12-34-AB');
```

## Excepções

```php
if ($db == null)
    throw new Exception('Database not initialized');
```

#### Try and catch

```php
try {
  $car = getCar($id);
} catch (DatabaseException $e) {
  echo 'Database error: ' . $e->getMessage();
} catch (Exception $e) {
  echo 'Unknown error: ' . $e->getMessage();
}
```

## Databases

É fácil de ligar o PHP a uma base de dados em sqlite3:

```php
$dbh = new PDO('sqlite:database.db');
```

Para prevenir SQL Injection, usar sempre `prepare()` seguido de `execute()`. Para `fetch()` é conveniente usar o mode `FETCH_ASSOC`:

- `PDO::FETCH_ASSOC`: returns an array indexed by column name.
- `PDO::FETCH_NUM`: returns an array indexed by column number.
- `PDO::FETCH_BOTH` (default): returns an array indexed by both column name and 0-indexed column number.

```php
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // change database mode
$stmt = $dbh->prepare('SELECT * FROM person WHERE name = ?');
$stmt->execute(array($name));

$result = $stmt->fetchAll();
foreach ($result as $row) {
  echo $row['address'];
}
```

#### Error handling

- `PDO::ERRMODE_SILENT` The default mode. No error is shown;

- `PDO::ERRMODE_WARNING` Similar to previous one but a warning is shown;

- `PDO::ERRMODE_EXCEPTION` In addition to setting the error code, PDO will throw a PDOException and set its properties to reflect the error code and error information;

```php
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
  $stmt = $dbh->prepare("SELECT * FROM person WHERE name = ?");
  $stmt->execute(array($name));
  $result = $stmt->fetchAll()
} catch (PDOException $e) {
  // Do something about it...
  echo $e->getMessage();
}
```

## HTTP Parameters

Nos formulários, se usarmos o método `GET` os parâmetros lançados vão em cima do html para a página seguinte, ao contrário do `POST`. Este último é o ideal para passar parâmetros a ser usados em bases de dados:

```
http://www.example.com:80/path?key1=value1&key2=value2#fragment_id
```

Depois, os parâmetros são recebidos num array `$_GET` ou `$_POST` mediante a escolha.

## Sessions

Se a pessoa aceitar a `Cookie`, então a cada novo request ao servidor é enviada a cookie. Forma de fazer store de dados no browser, poupando recursos. Assim evita de fazer login sempre que quer aceder a uma nova página.

```php
/* Deve ser inicializada antes de qualquer input ou output */
bool setcookie (string $name, string $value, int $expire = 0, 
                string $path, string $domain, bool $secure = false,
                bool $httponly = false)
```

- Se uma sessionID for recebida no servidor, normalmente através de cookie, então retira o estado através do id;
- Se nada for recebido, retorna uma nova sessionID através de cookie;
- Ambas usam o array global `$_SESSION`;
- Lifetime em segundos. Se colocado 0 significa "até ao browser fechar";

```php
session_start();
var_dump($_SESSION);               // inspect session variables
$_SESSION['username'] = $username; // modify session variables
session_set_cookie_params (int $lifetime, string $path, string $domain, bool $secure = false, bool $httponly = false)
session_destroy();                 // call after start()
```

## Passwords

Para uma melhor segurança, são guardadas sempre unsando uma hashfunction:

```php
echo md5('apple');  
// 1f3870be274f6c49b3e31a0c6728957f
echo sha1('apple');
// d0be2dc421be4fcd0172e5afceea3970e2f3d940
echo hash('sha256', 'apple');
// 3a7bd3e2360a3d29eea436fcfb7e44c735d117c42d1c1835420b6b9942dd4f1b
```

## Includes

