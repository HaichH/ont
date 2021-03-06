<?php
//Class providing generic data access functionality for PDO methods
class DatabaseHandler
{
	// Hold an instance of the PDO class
	private static $conn;
	private static $dsn = 'mysql:host=localhost:3306:;dbname=uncommon_DBA';
    private static $username = 'uncom_ghost';
    private static $password = '!Invisible@2';
    
	//Private constructor to prevent direct creation of object
	private function _construct()
	{}
	
	//Return an initialised database handler object
	private static function GetConnection()
	{
		//Create a database connection only if one does not alraedy exist
		if (!isset(self::$conn)) {
            try {
                self::$conn = new PDO(self::$dsn,
                                    self::$username,
                                    self::$password);
            } 
			catch (PDOException $e) 
			{
				self::Close();
                print_r($error_message = $e->getMessage());
				die();
               // include('errors/database_error.php');
             //   exit();
            }
        }
        return self::$conn;
	}//End GetConnection()
	
	//Method to close the database connection
	public static function Close()
	{
		self::$conn = null;
	}//End Close()
	
	/*Execute() method to call when executing INSERT, UPDATE, DELETE
	This method is a wrapper for the PDOStatement::execute() method*/
	public static function Execute($sql, $params = null)
	{
		try
		{
			//Get a connection
			$pdo_conn = self::GetConnection();
                        $pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			//Prepare query for execution
			$statement = $pdo_conn->prepare($sql);
			//Execute query
			$statement->execute($params);
		}//End try
		catch (PDOException $e) 
		{
                self::Close();
				$error_message = $e->getMessage();
                                die(print_r($e->getMessage()));
              //  include('errors/database_error.php');
                exit();
        }
		
	}//End Execute()
	
	/*The GetAll() method is a wrapper for the PDOStatement::fetchall().
	This method will be used for retrieving a complete result set from a SELECT
	query. */
	public static function GetAll( $sql, $params = null,
									$fetchStyle = PDO::FETCH_ASSOC)
	{
		$result = null;
		try
		{
			//Get a connection
			$pdo_conn = self::GetConnection();
			$pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Prepare query for execution
			$statement = $pdo_conn->prepare($sql);
			//Execute query
			$statement->execute($params);
			$result = $statement->fetchall($fetchStyle);
		}//End try
		catch (PDOException $e) 
		{
                self::Close();
				
               die(print_r($error_message = $e->getMessage()));
        }
		return $result;								
	}//End GetAll
	
	/*The GetRow() method is a wrapper for the PDOStatement::fetch().
	This method will be used for retrieving a single row from a SELECT
	query. */
	public static function GetRow( $sql, $params = null,
									$fetchStyle = PDO::FETCH_ASSOC)
	{
		$result = null;
		try
		{
			//Get a connection
			$pdo_conn = self::GetConnection();
			$pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Prepare query for execution
			$statement = $pdo_conn->prepare($sql);
			//Execute query
			$statement->execute($params);
			$result = $statement->fetch($fetchStyle);
		}//End try
		catch (PDOException $e) 
		{
                self::Close();
				die(print_r($error_message = $e->getMessage()));
        }
		return $result;								
	}//End GetRow
}//End class
