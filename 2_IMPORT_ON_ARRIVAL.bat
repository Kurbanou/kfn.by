@echo off
chcp 65001 > nul
echo === ЗАПУСК ПРОЕКТА НА НОВОМ МЕСТЕ ===

:: 1. Запускаем контейнеры
echo 1. Запуск Docker...
docker-compose up -d

:: 2. Ожидаем инициализации MySQL
echo 2. Ожидание готовности MySQL (12 секунд)...
timeout /t 12 /nobreak

:: 3. Импортируем базу данных
echo 3. Импорт базы данных из dump.sql...
docker-compose exec -T mysql mysql -u root -pwordpress_secure_root custom < dump.sql

echo === ГОТОВО! Сайт обновлен и запущен на http://localhost:8000 ===
pause
