<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Laravel E-sign

Laravel Example of E-Signature with Signature Pad and Digital Certified Sign with TCPDF


## Package

* [Laravel TCPDF Service Provider](https://github.com/elibyy/tcpdf-laravel)
* [Javascript Signature Pad](https://github.com/szimek/signature_pad)

## Installation

Clone projet

```sh
git clone git@github.com:Akecel/laravel-esign.git
```

Install back-end dependencies
```
composer install
```

Install front-end dependencies

```
npm install
```

## Configuration

Set env file :
```
cp .env.example .env
```

Generate project key
```
php artisan key:generate
```

To certify your signatures with TCPDF, you will have to create your own SSL certificate with OpenSSL. Otherwise you can find the TCPDF demo certificate here : [TCPDF Demo Certificat](https://github.com/tecnickcom/TCPDF/blob/main/examples/data/cert/tcpdf.crt) 

To create your own certificate use this command :

```
cd storage/app
openssl req -x509 -nodes -days 365000 -newkey rsa:1024 -keyout your-cert-name.crt -out your-cert-name.crt
```

More information in the [TCPDF documentation](https://tcpdf.org/examples/example_052/)

## Usage

Compiling assets :

```
// Build for local developement
npm run dev

// Build for production
npm run prod
```

Local server :
```
// Run the server
php artisan serve
```

## Authors

👤 [**Akecel**](https://github.com/Akecel)

## License

[MIT license](https://opensource.org/licenses/MIT).
