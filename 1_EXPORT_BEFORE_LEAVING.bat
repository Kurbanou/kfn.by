@echo off
chcp 65001 > nul
echo === СВЕРТЫВАНИЕ ПРОЕКТА ===

:: 1. Экспортируем базу данных
echo 1. Экспорт базы данных в dump.sql...
docker-compose exec -T mysql mysqldump -u root -pwordpress_secure_root custom > dump.sql

:: 2. Останавливаем контейнеры
echo 2. Остановка Docker-контейнеров...
docker-compose down

echo === ГОТОВО! Теперь сделайте Git Commit и Push ===
pause
