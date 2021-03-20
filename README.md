# console-writer
Простой способ цветного вывода в консоль на случай, если symfony/console для проекта - это слишком

## Использование

Все методы класса ```ConsoleWriter``` пишут сообщения либо в ```php://stdout```, либо в ```php://stderror```.

Используются константы цветов

```php
web136\console_writer\ConsoleWriter::COLOR_BLACK = 'black';
web136\console_writer\ConsoleWriter::COLOR_RED = 'red';
web136\console_writer\ConsoleWriter::COLOR_GREEN = 'green';
web136\console_writer\ConsoleWriter::COLOR_YELLOW = 'yellow';
web136\console_writer\ConsoleWriter::COLOR_CYAN = 'cyan';
web136\console_writer\ConsoleWriter::COLOR_PURPLE = 'purple';
web136\console_writer\ConsoleWriter::COLOR_BLUE = 'blue';

```

А так же костанта окончания цветного вывода

```php
web136\console_writer\ConsoleWriter::COLORIZE_END = "\e[0m";
```

Вы можете вывести сообщение любого из цветов, указанных в константах, методом ```ConsoleWriter::writeInfo($message = '', $color = '')``` например:

```php
use web136\console_writer\ConsoleWriter;

ConsoleWriter::writeInfo('Message', ConsoleWriter::COLOR_PURPLE);
```

Выведет в консоль текст Message пурпурным цветом.

Если цвет не указывать или указать не предусмотренный, то сообщение не будет окрашено.

В классе так же есть методы, которые выводят сообщения предопределенными цветами

* ```ConsoleWriter::writeSuccess($message = '');``` - зеленым
* ```ConsoleWriter::writeWarning($message = '');``` - желтым
* ```ConsoleWriter::writeError($message = '');``` - красным и в ```php://stderror```

*Обратите внимание* так же на то, что в конце каждого сообщения добавляется символ перевода строки ```"\n"```
