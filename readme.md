Написать модели и миграции для Laravel блога со следующими функциями:
- Записи.
- Тэги. У статьи может быть много тэгов.
- Рубрики. У статьи может быть только одна рубрика.
- Ревизии (версии) статей. Примеры реализации - Wordpress, MediaWiki. При каждом изменении создаётся новая ревизия, любая ревизия может стать текущей.
- Консольная команда с запуском раз в день, которая удаляет ревизии старше 30 дней, но оставляет минимум 5 последних.
- Комментарии.
- Результат загрузить в новый Github репозиторий.