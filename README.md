#BeanstalkAPIBundle
A Symfony2 bundle for the [Beanstalkapp](http://beanstalkapp.com) API

This bundle uses a slightly modified version of the [Beanstalk PHP API](https://github.com/chrisbarr/sfBeanstalk-PHP-API)

##Installation

  1. Add this bundle and the sfBeanstalk-PHP-API library as submodules
  
        $ git submodule add https://chrisbarr@github.com/chrisbarr/BeanstalkAPIBundle.git vendor/bundles/Beanstalkapp/BeanstalkAPIBundle
        $ git submodule add https://chrisbarr@github.com/chrisbarr/sfBeanstalk-PHP-API.git  vendor/Beanstalk
  
  2. Add the namespaces to the autoloader
  
        // app/autoload.php
        $loader->registerNamespaces(array(
            // ...
            'Beanstalk'      => __DIR__.'/../vendor',
            'Beanstalkapp'      => __DIR__.'/../vendor/bundles'
        ));
  
  3. Initialise the bundle
  
        // app/AppKernel.php
        public function registerBundles()
        {
            return array(
                // ...
                new Beanstalkapp\BeanstalkAPIBundle\BeanstalkAPIBundle()
            );
        }
  
  4. Set the required config - *all 3 parameters are required*
  
        // app/config/config.yml
        beanstalk_api:
            account: my_account
            username: chris
            password: pass

##Usage

All Beanstalk API methods are available through the `beanstalkapi` service - see https://github.com/chrisbarr/sfBeanstalk-PHP-API for available methods

All methods return `SimpleXMLElement` objects

``` php
<?php
    $beanstalk = $this->get('beanstalkapi');
    $plans = $beanstalk->find_all_plans();
```