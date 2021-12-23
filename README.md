1. Copy .env.example and rename to .env
2. Create db ssp in mysql Server
3. php artisan migrate
4. php artisan db:seed
5. Run MailHog. 
6. Open http://localhost:8025/ 
7. POST request (subscription): http://localhost:8000/api/website-subscriptions
```json
{
	"first_name": "Julian",
	"last_name": "Jupiter",
	"email": "julianjupiter.io@gmail.com",
	"website_id": 1
}
```
8. POST request (post): http://localhost:8000/api/posts
```JSON
{
	"title": "PHP Development 1",
		"description": "Tutorials in PHP development",
		"content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
		"slug": "php-development-1",
		"website_id": 1,
		"user_id": 1
}
```