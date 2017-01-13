@echo off
vendor/bin/phpunit --bootstrap "src\autoload.php" --report-useless-tests
