#!/bin/bash

# Run migrations
php artisan migrate --force

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM in background
php-fpm -D

# Start Nginx in foreground
nginx -g 'daemon off;'
```

## Visual File Tree
```
your-laravel-project/
│
├── Dockerfile              ← File #1 (root level)
├── .dockerignore           ← File #2 (root level)
│
├── docker/                 ← New folder (root level)
│   ├── start.sh           ← File #3
│   └── nginx/             ← New folder
│       └── default.conf   ← File #4
│
├── app/                    ← Existing Laravel folders
├── public/
├── composer.json
└── ... (rest of Laravel files)