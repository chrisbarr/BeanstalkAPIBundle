#BeanstalkAPIBundle
A Symfony2 bundle for the Beanstalk PHP API

##Installation

  1. Add this bundle and the sfBeanstalk-PHP-API library as submodules

        $ git submodule add https://chrisbarr@github.com/chrisbarr/BeanstalkAPIBundle.git vendor/bundles/Beanstalkapp/BeanstalkAPIBundle
        $ git submodule add https://chrisbarr@github.com/chrisbarr/sfBeanstalk-PHP-API.git  vendor/Beanstalk

  2. Add the namespaces to the autoloader

``` php
// app/autoload.php
$loader->registerNamespaces(array(
	// ...
	'Beanstalk'      => __DIR__.'/../vendor',
	'Beanstalkapp'      => __DIR__.'/../vendor/bundles'
));
```

  3. Initialise the bundle

``` php
// app/AppKernel.php
public function registerBundles()
{
	return array(
		// ...
		new Beanstalkapp\BeanstalkAPIBundle\BeanstalkAPIBundle()
	);
}
```

  4. Set the required config - *all 3 parameters are required*

``` yml
// app/config/config.yml
beanstalk_api:
    account: my_account
    username: chris
    password: pass
```

##Usage

``` php
<?php
	$beanstalk = $this->get('beanstalkapi');
	$plans = $beanstalk->find_all_plans();
```