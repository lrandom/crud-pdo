<?php
require_once 'Connect.php';
require_once 'ICrudDAL.php';

class DalCategory extends Connect implements ICrudDAL
{
    const tableName = 'category';

    function get ()
    {
        // TODO: Implement get() method.
        return $this->pdo->query('SELECT * FROM '.self::tableName);
    }

    function add ($payload)
    {
        // TODO: Implement add() method.
        try {
            $stm = $this->getStatement('INSERT INTO '.self::tableName.'(name) VALUES(:name)');
            $stm->bindParam(':name', $name);
            $name = $payload['name'];
            $stm->execute();
            return $this->pdo->lastInsertId();
        } catch (Exception $e) {
            return 0;
        }
    }

    function edit ($payload)
    {
        // TODO: Implement edit() method.
        try {
            $stm = $this->getStatement('UPDATE '.self::tableName.' SET name=:name');
            $stm->bindParam(':name', $name);
            $name = $payload['name'];
            $stm->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function delete ($id)
    {
        // TODO: Implement delete() method.
        try {
            $this->pdo->exec('DELETE FROM '.self::tableName.' WHERE id='.$id);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}

?>