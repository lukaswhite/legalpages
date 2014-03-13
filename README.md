#Legal Pages

Drop-in legal pages for Laravel 4.

Provides basic terms and conditions, privacy and cookies pages for your application. Simply install, configure information such as your company name, and go.

##Installation

Via Composer:

	"lukaswhite/legalpages" : "dev-master"

Add the service provider to `app/config/app.php`:

	'Lukaswhite\Legalpages\LegalpagesServiceProvider',

Publish the config file:

	php artisan config:publish lukaswhite/legalpages

##Configuration

The configuration file - which, once published, you'll find in `app/config/packages/lukaswhite/legalpages/config.php` contains two key elements:

`pages` allows you to turn the various pages on / off and customise their URL / title.

`info` contains your company or organisation info, and gets injected into the various pages.

##Pages

By default, the following URLs will become active:

	www.example.com/terms
	www.example.com/privacy
	www.example.com/cookies

##Customisation

You'll find the content of the pages in Markdown / RainTPL format in `app/storage/legalpages/content` - customise at will. 

##Limitations

The content is currently very UK-focussed.

##Todo

* Versioning