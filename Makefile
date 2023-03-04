export

SAIL := ./vendor/bin/sail 

# Run containers
up: 
	@$(SAIL) up -d

# Key generate
key: 
	@$(SAIL) artisan key:generate

# Run migrations
migrate: 
	@$(SAIL) artisan migrate

# Run vite
watch: 
	@$(SAIL) yarn dev

# Install sail and composer. 
sail: 
	docker run --rm \
		-u "root:root" \
		-v $$(pwd):/opt \
		-w /opt \
		laravelsail/php81-composer:latest \
		composer install --ignore-platform-reqs

# Install frontend
yarn-install:
	@$(SAIL) yarn install

# Install backend
composer-install:
	@$(SAIL) composer install

# Setup project
setup: sail up key

# Run project
start: up composer-install yarn-install migrate watch
