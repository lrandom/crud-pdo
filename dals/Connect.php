<?php

class Connect
{
    protected $pdo = null;
    const dbName = 'fish_sauce_shop';
    const dbUser = 'root';
    const dbPassword = 'koodinh';

    public function __construct ()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname='.self::dbName, self::dbUser,
                self::dbPassword);
            $this->pdo->exec('SET NAMES UTF8');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function getStatement ($query)
    {
        return $this->pdo->prepare($query);
    }

    public function getPDO ()
    {
        return $this->getPDO();
    }

    public function __destruct ()
    {
        // TODO: Implement __destruct() method.
        $this->pdo = null;
    }
}

?>