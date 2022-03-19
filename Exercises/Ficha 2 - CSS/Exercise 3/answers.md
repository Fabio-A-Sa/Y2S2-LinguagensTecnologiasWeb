# Exercise 3

## 3.1 - Specificity

- R1 (0, 0, 3)
- R2 (0, 2, 0)
- R3 (0, 0, 2)
- R4 (0, 1, 3)
- R5 (1, 2, 1)
- R6 (0, 1, 1)

## 3.2 - Rules

1. section with id foo: R1, R2, R3, R4, R5, R6
2. ul with class bar: R2, R3, R4, R5, R6
3. first list item: R1, R3, R5, R6
4. second list item: R2, R3, R4, R6
5. third list item: R3, R4, R6
6. fourth list item: R3, R4, R6

## 3.3 - Selected Rule

1. section with id foo: R1
2. ul with class bar: R2
3. first list item: R5
4. second list item: R4
5. third list item: R4
6. fourth list item: R4
7. first link: R6
8. second link: R6
9. third link: R6
10. fourth link: R6

## 3.4 - Color value

1. section with id foo: green
2. ul with class bar: green
3. first list item: magenta
4. second list item: red
5. third list item: yellow
6. fourth list item: yellow
7. first link: magenta
8. second link: red
9. third link: yellow
10. fourth link: yellow

## 3.5 - Final Color

first link: magenta
second link: red
third link: yellow
fourth link: yellow