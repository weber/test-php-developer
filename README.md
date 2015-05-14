**Введение**

При желании, в каждом из тестов можно продемонстрировать использование методик к проектированию и реализации ПО, документирование кода, и т.п. По возможности, использовать фреймворк Yii.

Упоминаемые в тексты файлы приложены отдельно.

Внимание следует уделить вопросам безопасности, производительности и целостности данных.

  


**1. Работа с формами**

Вывести на странице форму из трех полей, с возможностью добавления новых полей. Т.е. под последним полем должна быть кнопка "Добавить еще", при нажатии на которую появляется одно новое поле для ввода данных. Максимальное число полей - 10. В каждое поле, можно ввести число в диапазоне [-1,000..1,000]. Если поле оставлено пустым, считаем что введен ноль.

При отправке формы, массив введенных чисел A должен быть обработан по следующему алгоритму:

любое число P, такое что 0 < P < N, где N - количество введенных чисел, делит массив A на две части:

A[0], A[1], ..., A[P - 1] и A[P], A[P + 1], ..., A[N - 1].

Разница между двумя частями(D), вычисляется по формуле:

D = |(A[0] + A[1] + ... + A[P - 1]) - (A[P] + A[P + 1] + ... + A[N - 1])|.

Другими словами, D - это абсолютная разница между суммой элементов первой и второй частей.

Например, в форму было введено 5 чисел: 3, 1, 2, 4, 3. При отправке формы, был получен следующий массив:

A[0] = 3

A[1] = 1

A[2] = 2

A[3] = 4

A[4] = 3

Массив состоит из пяти элементов, т.е. P лежит в диапазоне [1, 4]. Следовательно массив А может быть разбит на две части в четырех местах:

P = 1, D = |3 - (1 + 2 + 4 + 3)| = |3 - 10| = 7

P = 2, D = |(3 + 1) - (2 + 4 + 3)| = |4 - 9| = 5

P = 3, D = |(3 + 1 + 2) - (4 + 3)| = |6 - 7| = 1

P = 4, D = |(3 + 1 + 2 + 4) - 3| = |10 - 3| = 7

Необходимо найти и вернуть (вывести на странице, после отправки формы), минимальную разницу D. В примере выше это число 1.

  
  


**2. Работа с базой данных**

Имеются текстовые файлы с данными.   
В первой строчке каждого файла – названия полей.   
Разделительный символ - табуляция.

Список файлов и их структура следующие:


* agency_network.txt – группа агентств


    * agency_network_id – уникальный идентификатор сети агентств


    * agency_network_name – название сети агентств  
  
  





* agency.txt


    * agency_id – уникальный идентификатор агентства


    * agency_ network _id – уникальный идентификатор агентства из agency_ network


    * agency_name – название агентства  
  
  





* billing.txt


    * agency_id – идентификатор агентства из agency


    * user_id – произвольный код абонента


    * date – дата, когда была сделана запись


    * amount – количество пришедших денег





_Необходимо сделать следующее:_

1. Спроектировать структуру бузы данных для хранения информации из текстовых файлов.

2. Создать скрипт загрузки в эту базу данных из файлов.

3. Сделать сводный отчет указанного далее вида, для данных за выбранный период. Для агентств, по которым за указанный период нет никаких данных, так же должна выводиться строка отчета с нулевой суммой.


| Название сети 1  | Название агентства 1 | Сумма по агентству  |
| Название сети 2  | Название агентства 2 | Сумма по агентству  |
| Название сети 3  | Название агентства 3 | Сумма по агентству  |
|                                         | Итоговая сумма      |
  


**3. Работа с регулярными выражениями**

Имеется файл с данными data.txt. Необходимо написать скрипт, который сформирует из этого файла массив, находящейся в файле result.txt. При реализации скрипта, желательно использование регулярных выражений.

