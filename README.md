#API Food ordering service
Food ordering service with notification to Telegram.

##Requirements
- Git
- Docker  >= 17.12 
- PHP >= 8.0

##Installation 
Create a folder for project. 
Use [laradock documentation](https://laradock.io/getting-started/). 

Clone this repository:
```
git clone https://github.com/Ocean1342/Potato.Unchained.git
```
Install via composer:
```
composer install
```

Add to your .env Telegram bot token from [BotFather](https://telegram.me/BotFather)
and admin chat id:
```
TELEGRAM_BOT_TOKEN='your token'
ADMIN_CHAT_ID='admin chat id'
```
Create .env.test for tests.\
Open terminal window:
```
cd laradock/

# Up docker containers
docker-compose up -d nginx mysql

# Enter the Workspace container
docker-compose exec --user=laradock workspace  bash

# Go to project dir
cd project-dir/
```
Run migrations:
```
php artisan migrate --seed 
php artisan migrate --seed --env=test 
```

For getting Telegram updates:
```
php artisan telebot:polling &
```
##Usage
You can get auth-token in admin panel (/login) 
 or create with tinker:

```
art tinker
User::find(1)->generateTestToken()
```
Add token in Authorization header:
```
Bearer **|****************************************
```

Use GET method:
- /api/restaurants/ - get info about all restaurants;
- /api/restaurants/{id} - get info about one restaurant;
- /api/orders/ - get info about orders;
- /api/orders/{id} - get info about one order.

Use POST method:
- /api/orders/ - to create order.
Request Body structure:
```
user[id]:1
user[chat_id]:******** #optional
dishes[0][dish_id]:1
dishes[0][amount]:1
dishes[1][dish_id]:2
dishes[1][amount]:2
...
```
