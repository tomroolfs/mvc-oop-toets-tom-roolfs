<?php
class RichestPeopleEntity
{
    
    private int $Id;

    private string $Networth;
    private string $NetworthError;

    private string $Name;
    private string $NameError;

    private int $Age;
    private string $AgeError;

    private string $MyCompany;
    private string $MyCompanyError;


    public function __get($property)
    {
        if (property_exists($this, $property))
        {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property))
        {
            $this->$property = $value;
        }
    }
}