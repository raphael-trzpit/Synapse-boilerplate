
vm-up:
	docker-compose up -d
vm-stop:
	docker-compose stop
ssh:
	docker exec -it php_site bash

init-synapse: create-database-synapse update-schema-synapse install-assets-synapse install-fixtures-synapse cache-clear

create-database-synapse:
	php bin/console doc:dat:cre --connection=synapse --if-not-exists

update-schema-synapse:
	php bin/console doc:sche:up --force --em=synapse

install-assets-synapse:
	php bin/console assets:install --symlink

install-fixtures-synapse:
	php bin/console doctrine:fixtures:load --em=synapse

cache-clear:
	php bin/console cache:clear
