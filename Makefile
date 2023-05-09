.PHONY: migrate helpers deploy install dev

dev:
	php artisan serve

migrate:
	php artisan migrate:fresh --seed

helpers:
	php artisan ide-helper:generate
	php artisan ide-helper:models -M
	php artisan ide-helper:meta

deploy: public/build/manifest.json
	ssh -A digest 'cd ~/sites/digest.droapp.com && git pull origin main && make install'

install: vendor/autoload.php .env public/storage
	php artisan cache:clear
	php artisan migrate

.env:
	cp .env.example
	php artisan key:generate

public/storage:
	php artisan storage:link

vendor/autoload.php: composer.lock
	composer install
	touch vendor/autoload.php

public/build/manifest.json: package.json
	pnpm i
	pnpm run build
	rsync -avz ./public/build/ digest:~/sites/digest.droapp.com/public/build/
