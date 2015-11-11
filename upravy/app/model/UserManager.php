<?php

namespace App\Model;

use Nette,
	Nette\Utils\Strings,
	Nette\Security\Passwords;

/**
 * Users management.
 */
class UserManager extends Nette\Object implements Nette\Security\IAuthenticator
{

	private $db;
	 
	public function __construct(Nette\Database\Context $database)
	{
		$this->db = $database;
	}

	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;
		
		// Hashovani hesla pomoci algoritmu sha1
                //zatim bez hashovani
		//$hashPassword = hash("sha1", $password);
		
		$result = $this->db->table('user')
                                   ->where('login = ? AND password = ?', $username, $password)
                                   ->fetch();
                
		if (!$result)
                {
                    throw new Nette\Security\AuthenticationException('Nesprávné uživatelské jméno nebo heslo.');
		}
		
		return new Nette\Security\Identity($result->id, array('name' => $username));
		
	}

}