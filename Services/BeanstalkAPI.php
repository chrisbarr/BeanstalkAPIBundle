<?php

namespace Beanstalkapp\BeanstalkAPIBundle\Services;

use Beanstalk\BeanstalkAPI as BeanstalkAPIClass;

class BeanstalkAPI extends BeanstalkAPIClass
{
	public function __construct($account, $username, $password)
	{
		parent::__construct($account, $username, $password);
	}
}
