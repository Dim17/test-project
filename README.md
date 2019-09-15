Test Project
-

requirements: 
 - docker
 - docker-compose
 
Build/Up containers:
-
- ./build.sh
- ./start.sh

Install dependency:
-
- docker exec test-project_app_1 composer install

Migrate db and populate it with template data:
-
- docker exec test-project_app_1 php bins/console doctrine:migration:migrate
- docker exec test-project_app_1 php bins/console doctrine:fixture:load

Template params for request:
-
- from:2019-07-01
- to:2019-11-15
- metrics[]:metrics3
- metrics[]:metrics47
- group_by:month
