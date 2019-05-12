Lavalite package that provides merchant management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `merchant/merchant`.

    "merchant/merchant": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Merchant\Merchant\Providers\MerchantServiceProvider::class,

And also add it to alias

    'Merchant'  => Merchant\Merchant\Facades\Merchant::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Merchant\\MerchantTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Merchant\Merchant\Providers\MerchantServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Merchant\Merchant\Providers\MerchantServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Merchant\Merchant\Providers\MerchantServiceProvider" --tag="view"


## Usage


