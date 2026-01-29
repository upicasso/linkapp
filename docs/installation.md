# INSTALATION GUIDE


1. Clone inside your development folder the docker repository by this commnd:
```
git@github.com:upicasso/efplants_docker.git
```

2. Download app repository and extract it to folder ~/effectiveplants-docker-3086621e3e54/app 
(if folder app doesn't exist - create it)

3. Inside ~/effectiveplants-docker-3086621e3e54 configure .ENV file and run command
```
./setup.sh
```

3. Go to the inside php container and run there:

```
docker exec -it app-symfony-php bash
```
```
composer install
```

4. Run migrations from the container

```
php bin/console doctrine:migrations:migrate
```

5. Add to your hosts file the server name which you configured in .env file
