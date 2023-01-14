hello:
	echo Hello World !

dev.init:
	cd backend; \
 		composer dump-autoload;
	cd frontend; \
		npm install;

dev.up:
	docker-compose -f docker-compose.yml -f docker-compose.dev.yml up -d
dev.down:
	docker-compose -f docker-compose.yml -f docker-compose.dev.yml down
sudo.dev.up:
	sudo docker-compose -f docker-compose.yml -f docker-compose.dev.yml up -d
sudo.dev.down:
	sudo docker-compose -f docker-compose.yml -f docker-compose.dev.yml down

prod.up:
	docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d
prod.down:
	docker-compose -f docker-compose.yml -f docker-compose.prod.yml down
sudo.prod.up:
	sudo docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d
sudo.prod.down:
	sudo docker-compose -f docker-compose.yml -f docker-compose.prod.yml down