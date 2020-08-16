# Installing NPM dependencies
npm install
# Installing composer
composer install --no-dev --optimize-autoloader
# Run Database Migration
php artisan migrate
# Run Route optimization
php artisan route:optimize
# Clear Cache
php artisan cache:clear
# Starting server
php artisan serve
