stop:
	docker-compose -f backend/docker-compose.yml stop && docker-compose -f frontend/docker-compose.yml stop
start:
	docker-compose -f backend/docker-compose.yml -f frontend/docker-compose.yml up --detach
destroy:
	docker-compose -f backend/docker-compose.yml down --volumes && docker-compose -f frontend/docker-compose.yml down --volumes
build:
	docker-compose -f backend/docker-compose.yml up --detach --build --force-recreate && docker-compose -f frontend/docker-compose.yml up --detach --build --force-recreate