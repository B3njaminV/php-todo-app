<?php
class Utilisateur
{
    private $user_id;
    private $user_name;
    private $password;

    public function __construct($user_id, $user_name, $password)
    {
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
}
?>