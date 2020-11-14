<?php


namespace QuizProcessing\Struct;


abstract class AbstractBaseStruct
{
    /*
     * Get struct name.
     * @return string
     */
    abstract public function getName(): string;

    /*
     * Get struct type.
     *
     * @return string
     */
    abstract public function getType(): string;
}