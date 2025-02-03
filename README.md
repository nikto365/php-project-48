### Hexlet tests and linter status:
[![Actions Status](https://github.com/nikto365/php-project-48/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/nikto365/php-project-48/actions)

# gendiff

Вычислитель отличий – программа, определяющая разницу между двумя структурами данных.

# gendiff

Linux, MacOS
PHP 8.3
Composer 2.6.6

## Установление зависимостей
1. Клонируем репозиторий:

    ```bash
    git clone git@github.com:nikto365/php-project-48.git
    ```

2. Переходим в директорию проекта:

    ```bash
    cd php-project-48
    ```

3. Устанавливаем зависимости:

    ```bash
    make install
    ```
   
4. Делаем gindiff исполняемым

    ```bash
    chmod +x bin/gindiff
    ```

5. Запуск исполняемого файла из корня проекта
    ```bash
    make update_path
    ```
6. Перезапуск терминала для вступления в силу настроек для gindiff
    ```bash
    make source ~/.zshrc
    ```