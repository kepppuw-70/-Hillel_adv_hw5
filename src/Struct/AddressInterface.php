<?php


namespace QuizProcessing\Struct;


interface AddressInterface
{
    /*
     * Get user address.
     *
     * @return string
     */
    public function getAddress(): string;
}