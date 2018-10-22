# Тестовые задания SkyEng

1. https://www.db-fiddle.com/f/p5uVNZZ8pZZb3YgXXre7vt/3

2. Проблема может возникнуть при одновременной записи в файл двумя процессами, т.к. отсутствует атомарность. К примеру, два процесса считывают текущее значение файла равное 10, затем первый пишет обновленнное значение - 11, и второй пишет то же самое значение. В итоге счетчик работает некорректно.
Исправить можно переписав с использованием flock, fopen ,fwrite и fclose, плюсом получив меньше на одну операцию чтения.
Когда значительно вырастет нагрузка на сервер может появиться очередь ожиданий. Частично решить эту проблему можно создав несколько файлов счетчиков и периодически суммировать их значения. Лучшим вариантом, на мой взгляд, будет использовать nginx или redis.

3. Неверно используется паттерн декоратор, плюс он в этом примере не совсем подходит, больше к месту фасад. Логер можно внести в конструктор. Вводим интерфейсы, предпочитаем композицию наследованию и завязываемся на DI контейнеры.
https://github.com/KinAlex/skyeng_test/task3/

4. 

5. https://www.db-fiddle.com/f/7qDExn6X8km5vccCCcZCrE/1
Для версии Mysql >= 8 можно использовать оконные функции.
