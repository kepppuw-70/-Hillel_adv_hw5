<?php


namespace QuizProcessing;

use Exception;
use QuizProcessing\Struct\AbstractBaseStruct;
use QuizProcessing\Struct\ContactInterface;
use QuizProcessing\Struct\ProfileInterface;
use QuizProcessing\Struct\CommentInterface;
use QuizProcessing\Struct\AddressInterface;
use QuizProcessing\Struct\SalaryInterface;
use QuizProcessing\Struct\AverageInterface;
use QuizProcessing\Struct\GroupInterface;
use QuizProcessing\Struct\Factory\StructFactory;

class DataParser
{
    private $data;
    private $jsonFile;

    public function __construct(string $jsonFile)
    {
        if (!file_exists($jsonFile)) {
            throw new Exception('File not exists');
        }
        $this->jsonFile = $jsonFile;
        
    }

    public function process()
    {
        try {
            $this->loadJson();
            
            foreach ($this->data as $item) {
                $struct = StructFactory::create($item['type']);

                if ($struct instanceof AbstractBaseStruct) {
                    $struct->name = $item['name'];
                    $struct->type = $item['type'];
                }

                if ($struct instanceof ContactInterface) {
                    $struct->email = $item['email'];
                }
              
                if ($struct instanceof ProfileInterface) {
                    $struct->first_name = $item['first_name'];
                    $struct->last_name = $item['last_name'];
                }

                if ($struct instanceof AddressInterface) {
                    $struct->address = $item['address'];
                }

                if ($struct instanceof CommentInterface) {
                    $struct->comment = $item['comment'];
                }

                if ($struct instanceof SalaryInterface) {
                    $struct->salary = $item['salary'];
                }

                if ($struct instanceof AverageInterface) {
                    $struct->average_score = $item['average_score'];
                }

                if ($struct instanceof GroupInterface) {
                    $struct->group = $item['group'];
                }

                var_dump($struct);
                echo '<br><br>';
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    private function loadJson()
    {
        $json = file_get_contents($this->jsonFile);

        $data = json_decode($json, true);
        if ($data === null) {
            throw new Exception('Invalid json file');
        }
        $this->data = $data;
        
    }
}