<?php
  //Connect to DB
  function connect($db)
  {
      try {
          $conn = new PDO("mysql:host={$db['host']};dbname={$db['db']};charset=utf8", $db['username'], $db['password']);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conn;
      } catch (PDOException $exception) {
          exit($exception->getMessage());
      }
  }
 //Updates parameters
 function getParams($input)
 {
    $filterParams = [];
    foreach($input as $param => $value)
    {
            $filterParams[] = "$param=:$param";
    }
    return implode(", ", $filterParams);
	}
  //Associate all parameters into a Query
	function bindAllValues($statement, $params)
  {
		foreach($params as $param => $value)
    {
				$statement->bindValue(':'.$param, $value);
		}
		return $statement;
   }
 ?>