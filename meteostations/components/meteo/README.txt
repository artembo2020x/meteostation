Эта папка содержит драйвера для получения данных с метеостанций.
Все они реализуют интерфейс IMeteoDriver с методом getData, который возвращает объект класса MeteoData
FakeDriver - фейковый драйвер получения данных с метеостанции
OpenWeatherMapDriver - драйвер получения данных с http://openweathermap.org/current