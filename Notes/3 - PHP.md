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
$foo = 5;        // int
$foo = 'John';   // string -> não causa qualquer erro
$bar = &$foo;    // by reference, bar and foo are the same
$foo = 'Mary';
echo $bar;       // Mary
```

