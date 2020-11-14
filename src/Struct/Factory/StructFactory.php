<?php


namespace QuizProcessing\Struct\Factory;


use QuizProcessing\Struct\AbstractBaseStruct;
use QuizProcessing\Struct\Guest;
use QuizProcessing\Struct\Teacher;
use QuizProcessing\Struct\Student;

class StructFactory
{
    /**
     * @param string $type
     * @return AbstractBaseStruct
     */
    public static function create(string $type): AbstractBaseStruct
    {
        switch ($type) {
            case 'teacher':
                return new Teacher();
            case 'student':
                return new Student();
            case 'guest':
                return new Guest();
            default:
                throw new \InvalidArgumentException('Invalid type');
        }
    }
}