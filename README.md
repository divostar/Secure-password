# Generate random string passwords with the option of including symbols

This package uses Laravels Str random function to generate the basic alpha numeric string and then adds symbols as requested.

##Installation
Add bobkingstone/securepass to your composer.json

    "require": {
        "bobkingstone/securepass": "dev-master"
    }

Run composer update

    composer update

Once this has completed add the service provider to the array of providers in `app/config/app.php`

    'Bobkingstone\Securepass\SecurepassServiceProvider'


##Usage
The package generates a facade for the package automatically, so all you need to run is:

    Securepass::generate();

This will return a random string with a length of 10 characters by default.

To create a different length string pass in the required length:

    Securepass::generate(11);

To include symbols within password:

    Securepass::generate(11,true);
    
To generate a more human readable password:

    Securepass::generateHuman();

