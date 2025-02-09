# Пусть это путь к папке с вашими исполняемыми файлами
BIN_DIR := bin

# Установка зависимостей с Composer
install:
	composer install

# Добавить папку bin в PATH навсегда
update_path:
	echo 'export PATH="$(BIN_DIR):$$PATH"' >> ~/.zshrc
	source ~/.zshrc

# Проверка файла composer.json на правильность
validate:
	composer validate

# Запуск phpcs - сниффер
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

# Запуск тестов
test:
	vendor/bin/phpunit

test-coverage:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml

test-coverage-text:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-text