<?php
namespace Support;
use PDO;
use PDOException;
use Config\Database;
use Support\DB;
class BaseModel
{
    protected $table;
    protected static $dynamicTable = null;
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $guarded = [];
    protected $attributes = [];
    protected $connection;
    protected $selectColumns = ['*'];
    protected $whereConditions = [];
    protected $whereParams = [];
    protected $joins = [];
    protected $groupBy;
    protected $orderBy = [];
    protected $distinct = '';
    protected $limit;
    protected $offset;
    protected $orWhereConditions = [];
    public function __construct($attributes = [])
    {
        if (is_object($attributes)) {
            $attributes = (array) $attributes;
        }
        $this->attributes = $this->filterAttributes($attributes);
        $this->connect();
    }
    private function connect()
    {
        try {
            $database = new Database();
            $this->connection = $database->getConnection();
            if ($this->connection === null) {
                throw new \Exception('Database connection failed.');
            }
        } catch (\Exception $e) {
            ErrorHandler::handleException($e);
            die();
        }
    }
    private function filterAttributes($attributes)
    {
        if (!empty($this->fillable)) {
            return array_intersect_key($attributes, array_flip($this->fillable));
        }
        if (!empty($this->guarded)) {
            return array_diff_key($attributes, array_flip($this->guarded));
        }
        return $attributes;
    }
    public function fill(array $attributes)
    {
        $this->attributes = array_merge($this->attributes, $this->filterAttributes($attributes));
    }
    public function beginTransaction()
    {
        $this->connection->beginTransaction();
    }
    public function commit()
    {
        $this->connection->commit();
    }
    public function rollback()
    {
        $this->connection->rollback();
    }
    public static function query()
    {
        return new static();
    }
    public function select(...$columns)
    {
        $this->selectColumns = empty($columns) ? ['*'] : $columns;
        return $this;
    }
    public function selectRaw($rawExpression)
    {
        $this->selectColumns[] = $rawExpression; // Menambahkan SQL mentah ke daftar kolom
        return $this;
    }
    public function distinct($value = true)
    {
        $this->distinct = $value ? 'DISTINCT' : '';
        return $this;
    }
    public function where($column, $operator = '=', $value = null)
    {
        if (strtoupper($operator) === 'LIKE') {
            $paramName = str_replace('.', '_', $column) . '_' . count($this->whereParams);
            $this->whereConditions[] = "{$column} LIKE :{$paramName}";
            $this->whereParams[":{$paramName}"] = $value; // e.g., "%keyword%"
        } elseif ($value === null || $value == '') {
            if ($operator === '=') {
                $operator = 'IS';
            } elseif ($operator === '!=') {
                $operator = 'IS NOT';
            }
            $this->whereConditions[] = "{$column} {$operator} NULL";
        } else {
            $paramName = str_replace('.', '_', $column) . '_' . count($this->whereParams);
            $this->whereConditions[] = "{$column} {$operator} :{$paramName}";
            $this->whereParams[":{$paramName}"] = $value;
        }
        return $this;
    }
    public function whereIn($column, array $values)
    {
        if (empty($values)) {
            throw new \InvalidArgumentException('The values array cannot be empty for whereIn condition.');
        }
        $placeholders = [];
        foreach ($values as $index => $value) {
            $paramName = str_replace('.', '_', $column) . "_in_{$index}";
            $placeholders[] = ":{$paramName}";
            $this->whereParams[":{$paramName}"] = $value;
        }
        $placeholdersString = implode(', ', $placeholders);
        $this->whereConditions[] = "{$column} IN ({$placeholdersString})";
        return $this;
    }
    public function orWhere($column, $operator = '=', $value = null)
    {
        if ($value === null || $value == '') {
            if ($operator === '=') {
                $operator = 'IS';
            } elseif ($operator === '!=') {
                $operator = 'IS NOT';
            }
            $this->orWhereConditions[] = "{$column} {$operator} NULL";
        } else {
            $paramName = str_replace('.', '_', $column) . '_' . count($this->whereParams);
            $this->orWhereConditions[] = "{$column} {$operator} :{$paramName}";
            $this->whereParams[":{$paramName}"] = $value;
        }
        return $this;
    }
    public function whereDate($column, $date)
    {
        return $this->where($column, '=', $date);
    }
    public function whereMonth($column, $month)
    {
        $this->whereConditions[] = "MONTH({$column}) = :month";
        $this->whereParams[':month'] = $month;
        return $this;
    }
    public function whereYear($column, $year)
    {
        $this->whereConditions[] = "YEAR({$column}) = :year";
        $this->whereParams[':year'] = $year;
        return $this;
    }
    public function whereBetween($column, $start, $end)
    {
        $paramStart = str_replace('.', '_', $column) . "_start_" . count($this->whereParams);
        $paramEnd = str_replace('.', '_', $column) . "_end_" . count($this->whereParams);
        $this->whereConditions[] = "{$column} BETWEEN :{$paramStart} AND :{$paramEnd}";
        $this->whereParams[":{$paramStart}"] = $start;
        $this->whereParams[":{$paramEnd}"] = $end;
        return $this;
    }
    public function innerJoin($table, $first, $operator, $second)
    {
        return $this->join($table, $first, $operator, $second, 'INNER');
    }
    public function leftJoin($table, $first, $operator, $second)
    {
        return $this->join($table, $first, $operator, $second, 'LEFT');
    }
    public function rightJoin($table, $first, $operator, $second)
    {
        return $this->join($table, $first, $operator, $second, 'RIGHT');
    }
    public function outerJoin($table, $first, $operator, $second)
    {
        return $this->join($table, $first, $operator, $second, 'OUTER');
    }
    private function join($table, $first, $operator, $second, $type)
    {
        $validJoinTypes = ['INNER', 'LEFT', 'RIGHT', 'OUTER'];
        if (in_array(strtoupper($type), $validJoinTypes)) {
            $this->joins[] = "{$type} JOIN {$table} ON {$first} {$operator} {$second}";
        } else {
            throw new \InvalidArgumentException("Invalid join type: {$type}");
        }
        return $this;
    }
    public function groupBy($columns)
    {
        $this->groupBy = is_array($columns) ? implode(', ', $columns) : $columns;
        return $this;
    }
    public function orderBy($column, $direction = 'ASC')
    {
        $this->orderBy[] = "{$column} {$direction}";
        return $this;
    }
    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }
    public function offset($offset)
    {
        $this->offset = $offset;
        return $this;
    }
    public function get($fetchStyle = PDO::FETCH_OBJ)
    {
        try {
            $table = self::$dynamicTable ?? $this->table;
            $sql = "SELECT {$this->distinct} " . implode(', ', $this->selectColumns) . " FROM {$table}";
            if (!empty($this->joins)) {
                $sql .= ' ' . implode(' ', $this->joins);
            }
            if (!empty($this->whereConditions) || !empty($this->orWhereConditions)) {
                $sql .= ' WHERE ';
                $conditions = [];
                if (!empty($this->whereConditions)) {
                    $conditions[] = '(' . implode(' AND ', $this->whereConditions) . ')';
                }
                if (!empty($this->orWhereConditions)) {
                    $conditions[] = '(' . implode(' OR ', $this->orWhereConditions) . ')';
                }
                $sql .= implode(' AND ', $conditions); // Gabung AND dan OR dengan benar
            }
            if (!empty($this->groupBy)) {
                $sql .= ' GROUP BY ' . $this->groupBy;
            }
            if (!empty($this->orderBy)) {
                $sql .= ' ORDER BY ' . implode(', ', $this->orderBy);
            }
            if ($this->limit !== null) {
                $sql .= ' LIMIT ' . (int) $this->limit;
            }
            if ($this->offset !== null) {
                $sql .= ' OFFSET ' . (int) $this->offset;
            }
            $stmt = $this->connection->prepare($sql);
            foreach ($this->whereParams as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            $stmt->execute();
            return $stmt->fetchAll($fetchStyle);
        } catch (\Exception $e) {
            ErrorHandler::handleException($e);
            return [];
        }
    }
    public function toSql()
    {
        try {
            $table = self::$dynamicTable ?? $this->table;
            $sql = "SELECT {$this->distinct} " . implode(', ', $this->selectColumns) . " FROM {$table}";
            if (!empty($this->joins)) {
                $sql .= ' ' . implode(' ', $this->joins);
            }
            if (!empty($this->whereConditions)) {
                $sql .= ' WHERE ' . implode(' AND ', $this->whereConditions);
            }
            if (!empty($this->groupBy)) {
                $sql .= ' GROUP BY ' . $this->groupBy;
            }
            if (!empty($this->orderBy)) {
                $sql .= ' ORDER BY ' . implode(', ', $this->orderBy);
            }
            if ($this->limit !== null) {
                $sql .= ' LIMIT ' . (int) $this->limit;
            }
            if ($this->offset !== null) {
                $sql .= ' OFFSET ' . (int) $this->offset;
            }
            return $sql;
        } catch (\Exception $e) {
            ErrorHandler::handleException($e);
        }
    }
    public function first()
    {
        $this->limit(1);
        $results = $this->get();
        if (!empty($results)) {
            return new static($results[0]);
        }
        return null;
    }
    public static function setCustomTable($parameter)
    {
        $instance = new static();
        self::$dynamicTable = $parameter;
        return $instance;
    }
    public static function setTable($tablecustom)
    {
        $instance = new static();
        $tablePrefix = $instance->table;
        self::$dynamicTable = $tablePrefix . $tablecustom;
        return new static();
    }
    public static function all($fetchStyle = PDO::FETCH_OBJ)
    {
        try {
            $instance = new static();
            $instance->table = self::$dynamicTable ?? ($instance->table ?? 'default_table');
            $sql = "SELECT * FROM {$instance->table}";
            $stmt = $instance->connection->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll($fetchStyle);
            return $data;
        } catch (\Exception $e) {
            ErrorHandler::handleException($e);
            return [];
        }
    }
    public function count()
    {
        try {
            $table = self::$dynamicTable ?? $this->table;
            $sql = "SELECT COUNT(*) as count FROM {$table}";
            if (!empty($this->joins)) {
                $sql .= ' ' . implode(' ', $this->joins);
            }
            if (!empty($this->whereConditions) || !empty($this->orWhereConditions)) {
                $sql .= ' WHERE ';
                $conditions = [];
                if (!empty($this->whereConditions)) {
                    $conditions[] = '(' . implode(' AND ', $this->whereConditions) . ')';
                }
                if (!empty($this->orWhereConditions)) {
                    $conditions[] = '(' . implode(' OR ', $this->orWhereConditions) . ')';
                }
                $sql .= implode(' AND ', $conditions);
            }
            $stmt = $this->connection->prepare($sql);
            foreach ($this->whereParams as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (\Exception $e) {
            ErrorHandler::handleException($e);
            return 0;
        }
    }
    public static function create($attributes)
    {
        try {
            $instance = new static($attributes);
            if (self::$dynamicTable) {
                $instance->table = self::$dynamicTable; // Gunakan tabel yang telah diset secara statis
            }
            if (!$instance->table) {
                $instance->table = isset($instance->table) ? $instance->table : 'default_table'; // Default based on the model
            }
            $instance->save();
            return $instance;
        } catch (\Exception $e) {
            ErrorHandler::handleException($e);
            return null;
        }
    }
    public function save()
    {
        try {
            $this->connection = DB::getConnection();
            if (isset($this->attributes[$this->primaryKey])) {
                $this->updates(); // Menggunakan update jika sudah ada primary key
            } else {
                $columns = implode(',', array_keys($this->attributes));
                $placeholders = ':' . implode(', :', array_keys($this->attributes));
                $table = self::$dynamicTable ?? $this->table;
                $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
                $stmt = $this->connection->prepare($sql);
                foreach ($this->attributes as $key => $value) {
                    $stmt->bindValue(':' . $key, $value);
                }
                $stmt->execute();
                $this->attributes[$this->primaryKey] = $this->connection->lastInsertId();
            }
        } catch (\Exception $e) {
            ErrorHandler::handleException($e); // Menangani error
        }
    }
    public function updates()
    {
        try {
            if (empty($this->table)) {
                $this->table = 'default_table'; // Fallback jika table tidak diatur
            }
            $setClause = [];
            foreach ($this->attributes as $key => $value) {
                $setClause[] = "{$key} = :{$key}";
            }
            $setClause = implode(', ', $setClause);
            $sql = "UPDATE {$this->table} SET {$setClause} WHERE {$this->primaryKey} = :{$this->primaryKey}";
            $stmt = $this->connection->prepare($sql);
            foreach ($this->attributes as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
            $stmt->execute();
        } catch (\Exception $e) {
            ErrorHandler::handleException($e);
        }
    }
    public function update($data)
    {
        $this->connection = DB::getConnection();
        $setClause = [];
        foreach ($data as $key => $value) {
            $setClause[] = "{$key} = :{$key}";
        }
        $setClause = implode(', ', $setClause);
        $table = self::$dynamicTable ?? $this->table;
        $sql = "UPDATE {$table} SET {$setClause} WHERE {$this->primaryKey} = :{$this->primaryKey}";
        $stmt = $this->connection->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        $stmt->bindValue(':' . $this->primaryKey, $this->attributes[$this->primaryKey]);
        $stmt->execute();
    }
    public function updateWhere($conditions, $data)
    {
        $this->connection = DB::getConnection();
        
        $setClause = [];
        foreach ($data as $key => $value) {
            $setClause[] = "{$key} = :{$key}";
        }
        $setClause = implode(', ', $setClause);
        
        $whereClause = [];
        $bindValues = [];
        foreach ($conditions as $key => $value) {
            if (is_array($value)) {
                $placeholders = [];
                foreach ($value as $index => $val) {
                    $param = ":where_{$key}_{$index}";
                    $placeholders[] = $param;
                    $bindValues[$param] = $val;
                }
                $whereClause[] = "{$key} IN (" . implode(', ', $placeholders) . ")";
            } else {
                $whereClause[] = "{$key} = :where_{$key}";
                $bindValues[":where_{$key}"] = $value;
            }
        }
        $whereClause = implode(' AND ', $whereClause);

        $table = self::$dynamicTable ?? $this->table;
        $sql = "UPDATE {$table} SET {$setClause} WHERE {$whereClause}";

        $stmt = $this->connection->prepare($sql);
        
        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }
        foreach ($bindValues as $param => $val) {
            $stmt->bindValue($param, $val);
        }

        $stmt->execute();
    }
    public function delete()
    {
        try {
            $table = self::$dynamicTable ?? $this->table;
            $sql = "DELETE FROM {$table} WHERE {$this->primaryKey} = :{$this->primaryKey}";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':' . $this->primaryKey, $this->attributes[$this->primaryKey]);
            $stmt->execute();
        } catch (\Exception $e) {
            ErrorHandler::handleException($e);
        }
    }
    public function lockForUpdate()
    {
        if (empty($this->table)) {
            $this->table = 'default_table'; // Fallback jika table tidak diatur
        }
        $sql = "SELECT {$this->distinct} " . implode(', ', $this->selectColumns) . " FROM {$this->table}";
        if (!empty($this->joins)) {
            $sql .= ' ' . implode(' ', $this->joins);
        }
        if (!empty($this->whereConditions) || !empty($this->orWhereConditions)) {
            $sql .= ' WHERE ';
            $conditions = [];
            if (!empty($this->whereConditions)) {
                $conditions[] = '(' . implode(' AND ', $this->whereConditions) . ')';
            }
            if (!empty($this->orWhereConditions)) {
                $conditions[] = '(' . implode(' OR ', $this->orWhereConditions) . ')';
            }
            $sql .= implode(' AND ', $conditions);
        }
        $sql .= ' FOR UPDATE';
        $stmt = $this->connection->prepare($sql);
        foreach ($this->whereParams as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function sharedLock()
    {
        if (empty($this->table)) {
            $this->table = 'default_table'; // Fallback jika table tidak diatur
        }
        $sql = "SELECT {$this->distinct} " . implode(', ', $this->selectColumns) . " FROM {$this->table}";
        if (!empty($this->joins)) {
            $sql .= ' ' . implode(' ', $this->joins);
        }
        if (!empty($this->whereConditions) || !empty($this->orWhereConditions)) {
            $sql .= ' WHERE ';
            $conditions = [];
            if (!empty($this->whereConditions)) {
                $conditions[] = '(' . implode(' AND ', $this->whereConditions) . ')';
            }
            if (!empty($this->orWhereConditions)) {
                $conditions[] = '(' . implode(' OR ', $this->orWhereConditions) . ')';
            }
            $sql .= implode(' AND ', $conditions);
        }
        $sql .= ' LOCK IN SHARE MODE';
        $stmt = $this->connection->prepare($sql);
        foreach ($this->whereParams as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function find($id, $fetchStyle = PDO::FETCH_OBJ)
    {
        $instance = new static();
        $table = self::$dynamicTable ?? $instance->table;
        $sql = "SELECT * FROM {$table} WHERE {$instance->primaryKey} = :id";
        $stmt = $instance->connection->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch($fetchStyle);
        if ($data) {
            return new static((array) $data);
        }
        return null;
    }
    public function formatWithRelations(array $relations)
    {
        if (empty($this->attributes)) {
            return [];
        }

        foreach ($relations as $relationKey => $fields) {
            $relationData = [];

            foreach ($fields as $field) {
                if (isset($this->attributes[$field])) {
                    $relationData[$field] = $this->attributes[$field];
                    unset($this->attributes[$field]); // Hapus dari atribut utama
                }
            }

            $this->attributes[$relationKey] = $relationData;
        }

        return $this->attributes;
    }
    public function hasOne($relatedModel, $foreignKey, $localKey = 'id')
    {
        $relatedInstance = new $relatedModel();
        if (!isset($this->attributes[$localKey])) {
            return null;
        }

        return $relatedInstance->where($foreignKey, '=', $this->attributes[$localKey])->first();
    }

    public function hasMany($relatedModel, $foreignKey, $localKey = 'id')
    {
        $relatedInstance = new $relatedModel();
        if (!isset($this->attributes[$localKey])) {
            return [];
        }

        return $relatedInstance->where($foreignKey, '=', $this->attributes[$localKey])->get();
    }

    public function belongsTo($relatedModel, $foreignKey, $ownerKey = 'id')
    {
        $relatedInstance = new $relatedModel();
        
        if (!isset($this->attributes[$foreignKey])) {
            return null; // Pastikan return null jika tidak ada data
        }

        return $relatedInstance->where($ownerKey, '=', $this->attributes[$foreignKey])->first(); // ✅ Ambil data langsung
    }

    public function belongsToMany($relatedModel, $pivotTable, $foreignKey, $relatedKey, $localKey = 'id', $relatedLocalKey = 'id')
    {
        $relatedInstance = new $relatedModel();
        if (!isset($this->attributes[$localKey])) {
            return [];
        }
        $localKeyValue = $this->attributes[$localKey];
        if ($localKeyValue === null) {
            return [];
        }
        $query = "SELECT {$relatedInstance->table}.* 
                FROM {$relatedInstance->table} 
                INNER JOIN {$pivotTable} 
                ON {$relatedInstance->table}.{$relatedLocalKey} = {$pivotTable}.{$relatedKey}
                WHERE {$pivotTable}.{$foreignKey} = :local_key";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':local_key', $localKeyValue, is_int($localKeyValue) ? PDO::PARAM_INT : PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function with($relations)
    {
        if (is_array($relations)) {
            foreach ($relations as $relation) {
                $this->load($relation);
            }
        } else {
            $this->load($relations);
        }
        return $this;
    }

    public function load($relation)
    {
        if (method_exists($this, $relation)) {
            $relationData = $this->{$relation}(); // Panggil method relasi
            if ($relationData) {
                $this->attributes[$relation] = $relationData; // Simpan hasil relasi
            }
        }
        return $this;
    }

    public static function exists($conditions)
    {
        $query = static::query();
        foreach ($conditions as $field => $value) {
            $query->where($field, '=', $value);
        }
        $result = $query->first();
        return $result !== null;
    }
    
    public function toArray()
    {
        return $this->attributes;
    }

    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }
}
?>
