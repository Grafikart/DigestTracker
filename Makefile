.PHONY: migrate helpers

migrate:
	php artisan migrate:fresh --seed

.PHONY: helpers
helpers:
	php artisan ide-helper:generate
	php artisan ide-helper:models -M
	php artisan ide-helper:meta
