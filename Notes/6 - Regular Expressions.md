# 6 - Regular Expressions

## Glossário

```javascript
/a/                     // literal string
/\+/                    // caracter especial
/gr[ae]y/               // gray ou grey, só um caracter conta quando está entre []
/[0-9a-fA-F]/           // tudo que seja dígito, ou a a F, ou A a F
/[^0-9a-fA-F]/          // tudo que seja diferente daquilo, por exemplo um H
/c.r/                   // o ponto significa qualquer letra, como car, cer, cfr...
/car$/                  // depois de car não vem mais nada
/^car/                  // antes de car não vem mais nada
/\bcar\b/               // car está dentro de espaços
/(car)|(gof)/           // há matching com car e com gof
/colou?r/               // o caracter antes de ? é opcional
/[0-9]+/                // números de pelo menos um dígito
/[0-9]{9}/              // números de telemóvel
/<[^>]+>/               // apanha todas as tags de HTML de forma não greedy
/([0-9])[0-9]+\1/       // números com 3 dígitos pelo menos em que o primeiro é igual ao último

// Lookaround

/(cat|dog)(?=s)/        // positive lookahead -> apanha cão ou gato se este for seguido de s
/(cat|dog)(?!s)/        // negative lookahead
/(?<=some)thing/        // positive lookbehind -> apanha thing se este for precedido de some
/(?<!some)thing/        // negative lookbehind
```

## Regular Expressions in Languages

### HTML

```html
<input type="text" name="phoneNumber" pattern="\d{9}|\d{3}-\d{3}-\d{3}">
```

### PHP

```php
preg_match('/(\d{4})(?:-(\d{3}))?/', '4100-122', $matches);
print_r($matches);

Array ( [0] => 4100-122
        [1] => 4100
        [2] => 122 )

preg_replace('/(cat|dog)/', 'my $1s', 'dog are dog'); // '' in second argument to delete certain pattern
echo => "my dogs are my dogs"

function is_phone_number($element) {
    return preg_match ("/^\d{9}|\d{3}-\d{3}-\d{3}$/", $element);
}
```

### JavaScript

```javascript
const pattern = /(\d{4})(?:-(\d{3}))?/;
const string = '4100-122';
console.log(pattern.test(string)); // true
console.log(string.match(pattern)); // ["4100-122", "4100", "122", index: 0, input: "4100-122 4200"]
console.log(string.search(string)); // 0 -> index of first match
```