<?php 
namespace App\Dtos;

class BaseDto 
{
    public function __construct(...$array)
    {
        
    }


    public static function fromRequest(array $array)
    {
        return new static(...$array);
    }
}