export

SAIL := ./vendor/bin/sail 

up: 
	@$(SAIL) up -d

watch: 
	@$(SAIL) yarn dev