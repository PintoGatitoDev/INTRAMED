<?php

namespace App\Models\User;
use App\Models\User\User;

abstract class Employee extends User
{
    protected string $subrol;

	/**
	 * @return string
	 */
	public function getSubrol(): string {
		return $this->subrol;
	}
	
	/**
	 * @param string $subrol 
	 * @return self
	 */
	public function setSubrol(string $subrol): self {
		$this->subrol = $subrol;
		return $this;
	}
}