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
