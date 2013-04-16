<?php

namespace Sg\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SgUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
