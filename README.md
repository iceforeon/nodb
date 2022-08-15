## NoDB

Flat file db demo

### Installation

```bash
cp .env.example .env
composer install
php artisan sail:install
sail up -d
sail artisan key:generate
sail npm install
sail npm run dev
```

### Create a User

```bash
sail artisan tinker
```

```php
User::create(['name' => 'iceforeon', 'username' => 'iceforeon', 'password' => bcrypt('password')]);
```
