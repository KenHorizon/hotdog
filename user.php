<?php

namespace classes;

spl_autoload_register(function ($class) {
    require str_replace('\\', '/', $class) . '.php';
});

class user
{
    public $register = '';
    public $account = 'account';
    public $user = 'user';
    public $membership = 'membership';
    public function account()
    {
        $getInfo = $this->register;
        return mysqli_fetch_assoc(database::query("SELECT * FROM accounts WHERE username = '$getInfo'"));
    }
    public function isEmpty()
    {
        $getInfo = $this->register;
        return mysqli_num_rows(database::query("SELECT * FROM accounts WHERE username = '$getInfo'")) < 0;
    }
}
$user = new user();
?>