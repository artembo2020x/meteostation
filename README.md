# meteostation
Test Yii2 meteostation project
В этом проекте содержатся компоненты, контроллеры, представления для Yii2 фреймворка, реализующие прием показаний из разных метеостанций.
Каждый компонент содержится в соответствующей папке, аналогичной папке Yii2 фреймворка.
В папке components содержатся драйвера, получающие данные из разных источников и приводящие ее к форме объекта MeteoData. Все они реализуют один и тот же интерфейс.
В папке controllers содержатся два контроллера:для управления станциями(crud) и для управления обработкой метеоданных из разных источников.
В папке models содержатся модели для метеостанций. Они, в свою, очередь, в зависимости от типа драйвера, обращаются к разным источникам и получают оттуда инфу.
Папка views  реализует представления.
Внутри папок содержатся файлы README.txt  с разъяснениями,кром того, прилагается дамп бд
