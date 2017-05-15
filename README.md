# Steps for configuration:

### Installation

Open your terminal and run these commands.
Change the current working directory to the location where you want the cloned directory to be made.
Type ``` git clone```, and then paste the URL you copied under the repository name.

```sh
$ cd path/to/your/directory
$ git clone git@github.com:adriana16/job.git
```
Fixing file permisions:
```sh
$ cd path/to/your/directory/project_name
$ HTTPDUSER=`ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
$ sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var
$ sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var
```

Install necessary dependencies...

```sh
$ cd path/to/your/directory/project_name
$ composer install
$ php bin/console assets:install --symlink
```

### Database

Create database:
```sh
$ php bin/console doctrine:database:create
```
Migrate database with necessary tables:

```sh
$ php bin/console doctrine:migrations:migrate
```
Add data into cv table:

```sh
$ php bin/console doctrine:fixtures:load
```

### Open your browser and have fun :) :
```sh
example.dev/app_dev.php/jobs
```