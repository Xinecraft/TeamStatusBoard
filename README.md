<h1 align="center">Team Status Board</h1>
<p align="center">No bullshit team status board!</p>

![J2RX7xqs18](https://user-images.githubusercontent.com/3089863/122630657-05e55000-d0e3-11eb-9cf6-24d37cb4dfa9.gif)


## About

I don't know why this exists, Maybe coz I was bored.

## Features
- Live Status with Polling.
- Auto Mode - Keep you online till you are on website.
- Manual Mode - Hide yourself if you want to.
- Let other know what you doing.
- Create multiple teams and invite members.

## Requirements
- PHP 8+
- Composer
- MySQL 8+ or Postgres 11+
- NPM (NodeJS)

## Install
Just like basic laravel install procedure.

- git clone https://github.com/Xinecraft/TeamStatusBoard.git
- cd TeamStatusBoard
- composer install
- npm install && npm run prod
- cp .env.example .env
- php artisan key:generate
- npm run db:migrate
- done!
Note: make sure to set SMTP details in .env for invite emails to work.


## Contributing

Just open a PR. What you waiting for 🤔

## License

I think its [MIT license](https://opensource.org/licenses/MIT).
