<?php
require_once 'Connect.php';
require_once 'ICrudDAL.php';
$baseName = __DIR__;
$baseName = str_replace('dals', '', $baseName);
require_once $baseName.'services/helper.php';

class DalCategory extends Connect implements ICrudDAL
{
    const tableName = 'category';
    const displayPerPage = 6; //mỗi trang show ra 6 bản ghi

    function getTotalRows ()
    {
        $rs = $this->pdo->query('SELECT COUNT(*) as total FROM '.self::tableName);
        $count = $rs->fetch(PDO::FETCH_ASSOC);
        return $count['total'];
    }

    function get ($page)
    {
        // TODO: Implement get() method.
        $offset = getOffsetInRS($page, self::displayPerPage);
        return $this->pdo->query('SELECT * FROM '.self::tableName.' LIMIT '.$offset.','.self::displayPerPage);
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

    function edit ($id, $payload)
    {
        // TODO: Implement edit() method.
        try {
            $stm = $this->getStatement('UPDATE '.self::tableName.' SET name=:name WHERE id='.$id);
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

    function getOne ($id)
    {
        $rs = $this->pdo->query('SELECT * FROM '.self::tableName.' WHERE id='.$id);
        return $rs->fetch(PDO::FETCH_ASSOC);
    }
}

?>