## Install

```bash
git clone https://github.com/lsadm86/elena_project.git
cd elena_project
composer install
npm install
cp .env.example .env
```

В файле .env меняем настройки MySQL

```bash
php artisan key:generate
php artisan migrate --seed
```

index.php находится в папке public
