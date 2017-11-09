<?php
class Controller
{
    public static function isCompany(){
        return Auth::getUser()->isCompany;
    }

    public static function addTask($titleContent , $content){

    }

//    public static function addSolution(){
//
//    }

    public static function addPractice(){

    }
}