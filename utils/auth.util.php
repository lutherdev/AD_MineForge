<?php

class Auth{
    public static function init(): void {
    if (session_status() === PHP_SESSION_NONE) { 
        session_start();      
        }
    }
}