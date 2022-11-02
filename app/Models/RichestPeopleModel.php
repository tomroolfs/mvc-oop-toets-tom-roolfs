<?php

class RichestPeopleModel
{
    
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getRichestPeople(): array
    {
        $this->db->query('SELECT * FROM `richestpeople`');
        return $this->db->resultSet();
    }

    public function getRichestPeopleById(string|int $id): object
    {

        $this->db->query('SELECT * FROM `richestpeople` WHERE `Id` = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();

    }

    public function updateRichestPeopleById($id): void
    {
        $this->db->query('UPDATE `richestpeople` SET `Name` = :`Name`, `Networth` = :Networth, `Age` = :Age, `MyCompany` = :MyCompany WHERE `Id` = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':Name', $_POST['Name']);
        $this->db->bind(':Networth', $_POST['Networth']);
        $this->db->bind(':Age', $_POST['Age']);
        $this->db->bind(':MyCompany', $_POST['MyCompany']);

        $this->db->execute();
    }


    public function storeRichestPeople(): void
    {
        $this->db->query('INSERT INTO `richestpeople` (`Name`, `Networth`, `Age`, `MyCompany`) VALUES (:`Name`, :Networth, :Age, :MyCompany)');
        $this->db->bind(':Name', $_POST['Name']);
        $this->db->bind(':Networth', $_POST['Networth']);
        $this->db->bind(':Age', $_POST['Age']);
        $this->db->bind(':MyCompany', $_POST['MyCompany']);

        $this->db->execute();
    }

    public function deleteRichestPeopleById($id): void
    {
        $this->db->query('DELETE FROM `richestpeople` WHERE `Id` = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
}