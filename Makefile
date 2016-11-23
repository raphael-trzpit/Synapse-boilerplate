
vm-up:
	docker-compose up -d
vm-stop:
	docker-compose stop
ssh:
	docker exec -it php_site -c 'bash'

init-synapse: create-database-synapse update-schema-synapse install-assets-synapse

create-database-synapse:
	php bin/console doc:dat:cre --connection=synapse --if-not-exists

update-schema-synapse:
	php bin/console doc:sche:up --force --em=synapse

install-assets-synapse:
	php bin/console assets:install --symlink
