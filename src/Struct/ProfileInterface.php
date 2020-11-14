<?php


namespace QuizProcessing\Struct;


interface ProfileInterface
{
    /*
     * Get first name.
     *
     * @return string
     */
    public function getFirstName(): string;

    /*
     * Get last name.
     *
     * @return string
     */
    public function getLastName(): string;
}