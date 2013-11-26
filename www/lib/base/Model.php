<?php

abstract class Model
{
    protected $db;
    public $data;

    public $idField = 'id';

    public function __construct()
    {
        $this->connectToDatabase();
    }

    public function connectToDatabase()
    {
        $this->db = new Database();
    }


    public function save()
    {
        if (!isset($this->data[$this->idField])) {
            $this->insert();
        }
    }

    public function initInput()
    {
        // validate form, setting $this->messages for view to render.
        foreach ($this->allowedData as $key => $value) {
            $this->data[$key] = NULL;
            $this->messages[$key] = NULL;
        }
    }

    public function processInput($input)
    {
        // check for form submission
        switch ($input['action']) {
            case "add":
                $this->parseInput($input);
                $isValid = $this->validate('add');
                if ($isValid) {
                    // commit to database if no problems
                    $this->save();
                }
            default:
                // do nothing
        }
    }

    public function parseInput( $input = array() )
    {
        // populate $this->data with $_POST
        foreach ($input as $key => $value) {
            if (array_key_exists($key, $this->allowedData)) {
                $this->data[$key] = $value;
            }
        }
    }

    public function validate($action = "add")
    {
        // validate form, setting $this->messages for view to render.
        foreach ($this->data as $key => $value) {
            if ($this->isUsableInAction($action, $key) && !is_null($this->allowedData[$key]['validate'])) {
                if (!is_callable($this->allowedData[$key]['validate'])){
                    throw new Exception("found uncallable validate callback on $key");
                }
                $this->messages[$key] = call_user_func($this->allowedData[$key]['validate'], $value);
            }
        }
        return Validation::checkErrorMessages($this->messages);
    }

    public function isUsableInAction($action, $key)
    {
        return (!isset($this->allowedData[$key]['actions']) || (in_array($action, $this->allowedData[$key]['actions'])));
    }

}