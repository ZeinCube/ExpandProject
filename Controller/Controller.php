<?php
class Controller
{
    public static function isCompany(){
        return Auth::getUser()->isCompany;
    }

    public static function getCluster($Object){

    }

}