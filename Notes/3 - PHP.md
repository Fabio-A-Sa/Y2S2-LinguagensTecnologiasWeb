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

### Estruturas de controlo:

Iguais às das outras linguagens:

- while;
- do... while;
- for;
- if;
- else;
- continue;
- break;
- switch case;

### Die and Exit

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

### Strings

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

### Arrays

Funcionam como maps / dicionários nas outras linguagens. Para cada chave há um valor.

