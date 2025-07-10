<?php

class Auth{
    public static function init(): void {
    if (session_status() === PHP_SESSION_NONE) { 
        session_start();      
        }
    }

    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    
}