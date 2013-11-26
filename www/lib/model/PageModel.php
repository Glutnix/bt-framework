<?php

class PageModel extends Model
{

    public $allowedData = array(
        'id'            => array(
            'actions'       => array('edit'),
            'validate'      => 'Validation::checkNumeric',
            'error_message' => 'Invalid ID number.',
            'filter'        => FILTER_SANITIZE_NUMBER_INT,
        ),
        'slug'          => array(
            'validate'      => 'PageModel::validateSlug',
            'filter'        => array(FILTER_SANITIZE_STRING, FILTER_CALLBACK),
            'flags'         => array(FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH)
        ),
        'title'         => array(
            'validate'      => 'Validation::checkRequired',
            'filter'        => array(FILTER_SANITIZE_STRING, FILTER_CALLBACK),
            'flags'         => array(FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH)
        ),
        'heading'       => array(
            'validate'          => 'Validation::checkRequired',
            'filter'        => array(FILTER_SANITIZE_STRING, FILTER_CALLBACK),
            'flags'         => array(FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH)
        ),
        'description'   => array(
            'validate'      => 'Validation::checkRequired',
            'filter'        => array(FILTER_SANITIZE_STRING, FILTER_CALLBACK),
            'flags'         => array(FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH)
        ),
        'keywords'      => array(
            'validate'      => NULL, // not required
            'filter'        => array(FILTER_SANITIZE_STRING, FILTER_CALLBACK),
            'flags'         => array(FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH)
        ),
        'content'       => array(
            'validate'      => 'Validation::checkRequired',
            'filter'        => array(FILTER_SANITIZE_STRING, FILTER_CALLBACK),
            'flags'         => array(FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH)
        )
    );

    public $data = array();
    public $messages = array();

    public function __construct($input = null) {
        parent::__construct();
        $this->initInput();
        if (!is_null($input)) {
            $this->processInput($input);
        }
    }

    public function getOne($slug)
    {
        $this->data = $this->selectSlug($slug);
        return $this->data;
    }

    public function insert()
    {
        $query  = "INSERT INTO pages (slug, title, heading, description, keywords, content) ";
        $query .= "VALUES (:slug , :title , :heading , :description , :keywords , :content );";
        $statement = $this->db->prepare($query);
        foreach ($this->data as $key => $value) {
            if ($this->isUsableInAction('add', $key)) {
                $statement->bindValue(":" . $key, $value);
            }
        }
        //$statement->debugDumpParams();
        $this->db->executeStatement($statement); // if insert fails, it will throw error
    }

    public static function validateSlug($slug)
    {
        $message = Validation::checkRequired($slug);
        if (strlen($message)>0) {
            return $message;
        }
        // make sure not present in database
        $record = new self();
        $record = $record->selectSlug($slug);
        if ($record['slug'] == $slug) {
            $message = "A page with that slug already exists.";
        }
        return $message;
    }

    public function selectSlug($slug)
    {
        $statement = $this->db->prepare("SELECT * FROM pages WHERE slug = :slug");
        $statement->bindValue(":slug", $slug);
        $this->db->executeStatement($statement);
        return $statement->fetch();
    }

}