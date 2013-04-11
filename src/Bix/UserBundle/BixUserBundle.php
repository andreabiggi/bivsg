<?php

namespace Bix\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BixUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
