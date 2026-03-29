#!/bin/bash

echo "🚀 Laravel Praktikum 6 - Start Server"
echo "======================================"

# Check if PHP is installed
if ! command -v php &> /dev/null; then
    echo "❌ PHP tidak ditemukan. Silakan install PHP 8.2+ terlebih dahulu."
    echo "   Di WSL: sudo apt update && sudo apt install php php-sqlite3 php-mbstring php-xml php-zip unzip curl"
    exit 1
fi

# Check PHP version
PHP_VERSION=$(php -v | head -n 1 | cut -d " " -f 2 | cut -c 1-3)
echo "✅ PHP terdeteksi: $PHP_VERSION"

# Check if Composer is installed
if ! command -v composer &> /dev/null; then
    echo "❌ Composer tidak ditemukan. Menginstall Composer..."
    curl -sS https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
fi
echo "✅ Composer terdeteksi"

# Install dependencies if vendor folder doesn't exist
if [ ! -d "vendor" ]; then
    echo ""
    echo "📦 Menginstall dependencies..."
    composer install
else
    echo "✅ Dependencies sudah terinstall"
fi

# Create SQLite database if not exists
if [ ! -f "database/database.sqlite" ]; then
    echo ""
    echo "🗄️  Membuat database SQLite..."
    touch database/database.sqlite
fi

# Set permissions
chmod 664 database/database.sqlite
chmod -R 775 storage bootstrap/cache

# Run migrations
echo ""
echo "🔄 Menjalankan migrasi..."
php artisan migrate --force

# Generate app key if not set
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ]; then
    echo ""
    echo "🔑 Generate app key..."
    php artisan key:generate
fi

# Cari port yang tersedia (mulai dari 8000)
PORT=8000
while netstat -tlnp 2>/dev/null | grep -q ":$PORT " || lsof -i :$PORT 2>/dev/null; do
    PORT=$((PORT + 1))
    if [ $PORT -gt 8010 ]; then
        echo "❌ Tidak ada port tersedia antara 8000-8010"
        exit 1
    fi
done

echo ""
echo "======================================"
echo "✅ Setup selesai!"
echo ""
echo "🌐 Menjalankan server di http://localhost:$PORT"
echo ""
echo "📚 Akses Tutorial:"
echo "   - Beranda: http://localhost:$PORT"
echo "   - Tutorial: http://localhost:$PORT/tutorial"
echo "   - Acara 13 (Edit): http://localhost:$PORT/tutorial/acara-13-edit-data"
echo "   - Acara 14 (Delete): http://localhost:$PORT/tutorial/acara-14-delete-data"
echo "   - Aplikasi CRUD: http://localhost:$PORT/posts"
echo ""
echo "🛑 Tekan Ctrl+C untuk menghentikan server"
echo "======================================"
echo ""

php artisan serve --host=0.0.0.0 --port=$PORT
