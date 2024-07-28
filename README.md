# Website Subscriber

## Description

This is a simple website subscriber that allows users to subscribe to a website and receive updates via email.

## Setup

### Environment Variables

Create a `.env` file in the root directory of the project and add the following environment variables:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

A mail provider is required to send emails. The following are the environment variables for Gmail:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=example@gmail.com
MAIL_PASSWORD=****************
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=example@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

### Create Database

```sh
# Run migrations
php artisan migrate

# Seed the database
php artisan db:seed
```

## Running the Application

```sh
# Start backend
php artisan serve

# Start frontend
cd vue
npm install
npm run dev
```

## Running the Tests

```sh
php artisan test
```

## Running the Queue Worker

```sh
php artisan queue:work
```

## Resources

- [Postman collection](https://www.postman.com/technical-specialist-99498802/workspace/apis/collection/37177620-cb706729-35d7-4d23-a0cf-faf58836f070?action=share&creator=37177620)
