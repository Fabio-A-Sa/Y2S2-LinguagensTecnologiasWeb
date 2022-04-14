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

