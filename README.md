# Приложение SnapRus

### Установка для development
```
docker compose up -d запуск api, nginx и mysql
Сервисы app, admin не надо. Они запускаются yarn serve
```

#### Не забываем установить env.local для admin, app
```
touch env.local >> VUE_APP_URL=http://localhost
```

#### Для api также env.local
```
APP_ENV=dev
```

### Установка для production
```
docker compose -f docker-compose.prod.yaml up -d
```
