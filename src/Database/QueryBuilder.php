<?php

namespace MyProject1\Database;

class QueryBuilder
{
    /**
     * @var \mysqli
     */
    private $oDb;
    private $table;
    private $errMsg;
    private $where;
    private $what = '*';
    private $limit;
    private static $_self;
    private $whereConcat = '';
    /**
     * @var \mysqli_result
     */
    private $query;

    public function __construct()
    {
        try {
            $this->oDb = Connection::makeConnection();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            die;
        }
    }

    public function reset()
    {
        $this->where = '';
        $this->what = '*';
        $this->limit = '';
        $this->whereConcat = '';
        $this->errMsg = '';
        return $this;
    }

    //Singleton Pattern
    public static function table($table)
    {
        if (!self::$_self) {
            self::$_self = new self();
        }
        self::$_self->reset();
        self::$_self->table = $table;
        return self::$_self;
    }

    public function select(...$what)
    {
        $this->what = implode(',', $what);
        return $this;

    }

    public static function getId()
    {
        return self::$_self->oDb->insert_id;
    }

    public function where($key, $operatorOrValue = '', $maybeValue = '')
    {
        if (empty($maybeValue)) {
            $value = $operatorOrValue;
            $operator = '=';
        } else {
            $value = $maybeValue;
            $operator = $operatorOrValue;
        }
        $value = is_numeric($value) ? $value : '"' . $value . '"';
        if ($this->where) {
            $this->where .= $this->whereConcat . $this->oDb->real_escape_string($key) . $operator . $value;
        } else {
            $this->where = $this->oDb->real_escape_string($key) . $operator . $value;
        }
        return $this;
    }

    public function orWhere($key, $operatorOrValue = '', $maybeValue = '')
    {
        $this->whereConcat = ' OR ';
        return $this->where($key, $operatorOrValue, $maybeValue);
    }

    public function andWhere($key, $operatorOrValue = '', $maybeValue = '')
    {
        $this->whereConcat = ' AND ';
        return $this->where($key, $operatorOrValue, $maybeValue);
    }

    public function query($sql)
    {
        $this->query = $this->oDb->query($sql);
        if (!$this->query) {
            $this->errMsg = sprintf("Error %s %s", $sql, $this->oDb->error);
            return false;
        }
        return true;
    }

    public function get()
    {
        $sql = sprintf("SELECT %s FROM %s", $this->what, $this->table);
        if ($this->where) {
            $sql .= sprintf(" WHERE %s ", $this->where);
        }
        if ($this->limit) {
            $sql .= sprintf(" LIMIT %s ", $this->limit);
        }
        $status = $this->query($sql);
        if ($status) {
            $aResults = [];
            if ($this->query->num_rows > 0) {
                while ($aRow = $this->query->fetch_assoc()) {
                    $aResults[] = $aRow;
                }
            }
            return $aResults;
        } else {
            return false;
        }
    }

    public function insert($aInfo)
    {
        $aColumns = array_keys($aInfo);
        $aValues = array_values($aInfo);
        $aParseColumn = implode(',', $aColumns);
        $aValues = '"' . implode('","', $aValues) . '"';
        $sql = sprintf("insert into %s(%s) values (%s)", $this->table, $aParseColumn, $aValues);
        return $this->query($sql);
    }

    public function update($aInfo, $aWhere)
    {
        $info = '';
        $where = '';
        foreach ($aInfo as $key => $val) {
            $info .= $key . '=' . '"' . $val . '"' . ',';
        }
        foreach ($aWhere as $key => $val) {
            $where .= $key . '=' . '"' . $val . '"' . ',';
        }
        $info = rtrim($info, ',');
        $where = rtrim($where, ',');
        $aWhere = explode(',', $where);
        $aInfo = explode(',', $info);
        $parseInfo = implode(', ', $aInfo);
        $parseWhere = implode(', ', $aWhere);
        $sql = sprintf("update %s set %s where %s", $this->table, $parseInfo, $parseWhere);
        return $this->query($sql);
    }

    public function getAll()
    {
        $sql = sprintf("select %s from %s", $this->what, $this->table);
        $status = $this->query($sql);
        if (!$status) {
            return $status;
        }
        return $this->query;
    }

    public function delete($What, $what)
    {
        $sql = sprintf("delete from %s where %s = %s", $this->table, $What, $what);
        $status = $this->query($sql);
        if (!$status) {
            return $status;
        }
        return $status;
    }

    public function first()
    {
        $this->limit = 1;
        $aResults = $this->get();
        if (empty($aResults)) {
            return $aResults;
        }
        return $aResults[0];
    }

    public function __destruct()
    {
        $this->oDb->close();
    }
}