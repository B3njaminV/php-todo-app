<?php

class Liste
{
    private $id;
    private $titre;
    private $status;

    public function __construct($id, $titre, $status)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

}
?>