<p align="center"><a href="https://daniaair.com" target="_blank"><img src="public\assets\images\logo.png" width="400" alt="Dania Air Logo"></a></p>


## Installation
After downloading the project files to your machine you need to follow this instructions:

1. Create `.env` file and copy the content of `.env.example` to it

```bash
cp .env.example .env
```

2. Open `.env` file and edit the following configuration based on the configuration for your machine

```php
APP_URL=

DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
> [!CAUTION]
> Make sure you have entered the configuration for your machine correctly before continuing

3. After create the database you can install composer dependencies

```bash
composer install
```

4. After complete the dependencies run this custom command to complete the installation

```bash
php artisan dania-air:install
```

Once finished a link will appear in terminal `CTRL + Click it` to open in your browser

> [!TIP]
> You can login to dashboard by using the following credentials:
>
> Email
> ```bash
> admin@admin.com
> ```
> Password
> ```bash
> 123456789
> ```

## Approach and thought process

I choose Safety checkList file and i found it contain multiple languages `Arabic` and `English`
and can be divide it into some database tables like the following:

1. `safety_categories` for the main safety topics
2. `safety_items` in relation with `safety_categories` as every `safety_category` have many items
3. `safety_reports` to store the general safety report information like inspector name, date and time
4. `report_item` to store safety report items, as many to many relation between `safety_reports` and `safety_items`

__Development__
- Start to build mini dashboard to control this tables:
1. Implement the main layouts views
2. Create authentication and admin cruds for dashboard and it's views
3. Create cruds for `safety_categories` and it's views
4. Create cruds for `safety_items` and it's views 
5. Create cruds for `safety_reports` and it's views
6. Added all needed routes for dashboard

- Start to build web view for users:
1. Designed simple home page with login button to dashboard and other button to report page
2. Designed a form to create safety report with some interacted animations

> [!TIP]
> After finished form design added some enhancement like:
>
> - `Notifications` after new report added it will send database notification to admin to check it

## Database schema design

> [!NOTE]
> The following schema design for main project tables only

<p align="center"><img src="public\assets\images\database.png" width="400" alt="Database schema"></p>

__There are some other tables like:__
1. `admins` table
2. `notifications` table

## Challenges

__There are some challenges appear__
- To make organized, easy to use form look like the file 
- to show all items from the database with their categories
- to submit the form with its all items data and validate it before create and show every error in it's place


