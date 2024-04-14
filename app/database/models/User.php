<?php

namespace app\database\models;

class User extends Model
{
    public static string $table = 'user';
    public readonly int $id;
    public readonly string $firstname;
    public readonly string $lastname;
    public readonly string $password;
    public readonly string $created_at;
    public readonly string $updated_at;
    public readonly string $email;
}