<?php

class RichestPeople extends BaseController
{
    private richestPeopleModel $richestPeopleModel;

    public function __construct()
    {
        $this->richestPeopleModel = $this->model('RichestPeopleModel');
    }


    public function index()
    {
        $data = [
            'richestPeople' => $this->richestPeopleModel->getrichestPeople()
        ];

        $this->view('RichestPeople/index', $data);
    }

    public function show(string|int $id)
    {
        $data = [
            'richestPeople' => $this->richestPeopleModel->getRichestPeopleById($id)
        ];

        $this->view('RichestPeople/show', $data);
    }

    public function create()
    {
        $data = [
            'richestPeople' => $this->richestPeopleModel->getRichestPeople()
        ];

        $this->view('RichestPeople/create', $data);
    }

    public function store()
    {
        $this->richestPeopleModel->storeRichestPeople();

        header('LOCATION: /RichestPeople/');
    }

   
    public function delete($id)
    {
        $this->richestPeopleModel->deleteRichestPeopleById($id);

        header('LOCATION: /RichestPeople/');
    }

}