.PHONY: migrate helpers

migrate:
	php artisan migrate:fresh --seed

.PHONY: helpers
helpers:
	php artisan ide-helper:generate
	php artisan ide-helper:models -M
	php artisan ide-helper:meta

deploy:
	ssh -A digest 'cd digest.droapp.com && make install'
	# pnpm run build
	# rsync -avz ./public/build/ digest:~/sites/digest.droapp.com/public/build/

install:
	git pull origin main
	composer install
	php artisan cache:clear
	php artisan migrate
