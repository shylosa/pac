<?php

namespace App\Entity;


class Author
{
    private $name;

    private $surename;

    //Отчество
    private $patronymic;

    //Дата рождения
    private $dateBirth;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurename()
    {
        return $this->surename;
    }

    /**
     * @param mixed $surename
     */
    public function setSurename($surename): void
    {
        $this->surename = $surename;
    }

    /**
     * @return mixed
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * @param mixed $patronymic
     */
    public function setPatronymic($patronymic): void
    {
        $this->patronymic = $patronymic;
    }

    /**
     * @return mixed
     */
    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    /**
     * @param mixed $dateBirth
     */
    public function setDateBirth($dateBirth): void
    {
        $this->dateBirth = $dateBirth;
    }

}
