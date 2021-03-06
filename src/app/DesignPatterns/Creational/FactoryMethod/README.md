## Фабричный метод

Фабричный метод - это способ делегирования логики создания
объектов дочерним классам.
<br>
https://habr.com/ru/company/mailru/blog/325492/
---
Фабричный метод - это порождающий паттерн проектирования,
который определяет общий интерфейс для создания объектов в
суперклассе, позволяя подклассам изменять тип создаваемых
объектов.
<br>
https://refactoring.guru/ru/design-patterns/factory-method
---
Это устройство классов, при котором подклассы могут переопределять
тип создаваемого в суперклассе объекта.
<br>
https://refactoring.guru/ru/design-patterns/factory-comparsion
---
Выгодное отличие от SimpleFactory в том, что вы можете вынести
реализацию создания объектов в подклассы. В простых случаях, этот
абстрактный класс может быть только интерфейсом.
Этот паттерн является "Настоящим" шаблоном проектирования, потому что
он следует "Принципу инверсии зависимостей" также известному
как "D" в S.O.L.I.D

