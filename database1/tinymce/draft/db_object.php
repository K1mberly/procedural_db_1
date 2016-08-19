<?php

class Db_object{


	public $errors=array();
	public $upload_errors_array = array(
		UPLOAD_ERR_OK         => "There is no error",
		UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
		UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
		UPLOAD_ERR_PARTIAL    => "The uploaded file was only partially uploaded.",
		UPLOAD_ERR_NO_FILE    => "No file was uploaded.",
		UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
		UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
		UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload."
	);



	

	public static function find_all(){
		return static::find_by_query("SELECT * FROM " . static::$db_table. " ");
		//Falta la validacion por si no hay ningun usuario........
	}

	public static function find_by_id($id){
		global $database;
		$the_result_array= static::find_by_query("SELECT * FROM " . static::$db_table. " WHERE id=$id LIMIT 1");
		/*
		The array_shift() function removes the first element from an array, and returns the value of the removed element.
		REVIEW TERNARY PHP:
		variable = (condition) ? value-if-true : value-if-false;
		If the_result_array is not empty returns the unique row, else returns a FALSE
		*/
		return !empty($the_result_array) ? array_shift($the_result_array) : false;		
	}

	public static function find_by_query($sql){
		global $database;
		$result_set= $database->query($sql);
		$the_object_array=array();
		while($row=mysqli_fetch_array($result_set)){
			$the_object_array[]=static::instantiation($row);
		}
		return $the_object_array;

	}	

	public static function instantiation($the_record){
		/*
		$the_record: Is a ROW of a table (as result of the query and after doing the fetch array)
		With this function: "instantiation", we assign the values of the colums of $the_record
		to the corresponding attributes of the object (also named variables)

		new self: Creating a new object (from the class) (self= current class)
		*/

		/* ##########################################################
		Example: Long way of auto instantiate:
		
		public static function instantiation($the_record){
			$the_object->id         =$the_record['id'];
			$the_object->username   =$the_record['username'];
			$the_object->password   =$the_record['password'];
			$the_object->first_name =$the_record['first_name'];
			$the_object->last_name  =$the_record['last_name'];
		}
		########################################################## */
		
		/*
		LATE STATIC BINDING: get_called_class();
		Allow us to instantiate the calling class
		We need this in order to instantiate the "calling class".
		Normally without the use of inheritance we could use: $the_object= new self;
		but as this code is part of the PARENT class, we could not use in that way and we use the 
		"late Static Binding"
		*/
		$calling_class=get_called_class();

		$the_object= new $calling_class;
		//$the_object= new self;

		foreach ($the_record as $the_attribute => $value) {
			if($the_object->has_the_attribute($the_attribute)){
				$the_object->$the_attribute=$value;
			}
		}
        return $the_object;

        /*
        FOREACH. There are two syntaxes:
			foreach (array_expression as $value)
			    statement
			foreach (array_expression as $key => $value)
			    statement
		The first form loops over the array given by array_expression. On each loop, 
		the value of the current element is assigned to $value and the internal array 
		pointer is advanced by one (so on the next loop, you'll be looking at the next element).

		The second form does the same thing, except that the current element's key will be 
		assigned to the variable $key on each loop.
		*/

		/* ##########################################################
		Example: 
		<html>
		<body>
			<?php
			$x=array("id" => 1,"username" => pablo,"password" => 123);
				foreach ($x as $key => $value)
				{
					echo $key."=".$value."<br>";
				}
			?>
		</body>
		</html> 

		The PRINT will be:
				id=1
				username=pablo
				password=123
        ########################################################## */
	}

	private function has_the_attribute($the_attribute){
		/*
		get_object_vars($this): Receive all the variables of the current object 
		(created from the class)
		*/
		$object_properties=get_object_vars($this);
		/*
		The array_key_exists() function checks an array for a specified key, and returns 
		true if the key exists and false if the key does not exist.
		*/
			/* ##########################################################
			Example:
			$a=array("id"=>"1","username"=>"pablo","password"=>"123");
			if (array_key_exists("username",$a))
			  {
			  echo "Key exists!";
			  }
			else
			  {
			  echo "Key does not exist!";
			  } 
			  ########################################################## */
		return array_key_exists($the_attribute, $object_properties);
	}
	
	public function properties(){
		$db_table_fields=array();

		foreach (static::$db_table_fields as $db_field) {
			if(property_exists($this, $db_field)){
				$properties[$db_field]=$this->$db_field;
				/*
				Assigning the fields of the array "$db_table_fields" into the "properties" array.
				Only if the field is equal to a PROPERTY of the Object
				*/
			}
		}
		return $properties;
	}

	public function clean_properties(){
		global $database;

		$clean_properties=array();

		foreach ($this->properties() as $key => $value) {
			$clean_properties[$key]=$database->escape_string($value);
		}
		return $clean_properties;
	}

	public function save(){
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create(){
		global $database;
		$properties=$this->clean_properties();

		$sql= "INSERT INTO ".static::$db_table." (".implode(",", array_keys($properties)).") ";
		$sql.="VALUES('".implode("','", array_values($properties))."')";
		
		/*
		The implode() function returns a string from the elements of an array.
		SINTAXIS: implode(separator,array)
		separator=Optional. Specifies what to put between the array elements. 
		Default is "" (an empty string)
		array=	Required. The array to join to a string

		The array_keys() function returns an array containing the keys.
		SINTAXIS: array_keys(array,value,strict)
		*/


		if($database->query($sql)){
			$this->id=$database->the_insert_id();
			return true;
		}else{
			return false;
		}
		
	} //Create Method

	public function update(){
		global $database;
		$properties=$this->clean_properties();
		$properties_pairs=array();

		foreach ($properties as $key => $value) {
			$properties_pairs[]="{$key}='{$value}'";
		}

		$sql= "UPDATE ".static::$db_table." SET ";
		$sql.= implode(", ", $properties_pairs);
		$sql.= " WHERE id= ". $database->escape_string($this->id);

		$database->query($sql);

		return (mysqli_affected_rows($database->connection) ==1) ? true: false;

	}

	public function delete(){
		global $database;
		$sql= "DELETE FROM " .static::$db_table. " ";
		$sql.= "WHERE id=". $database->escape_string($this->id);
		$sql.= " LIMIT 1";

		$database->query($sql);

		//$this->code=$sql;
		return (mysqli_affected_rows($database->connection) ==1) ? true: false;
	}

	public static function count_all(){
		global $database;

		$sql="SELECT COUNT(*) FROM ". static::$db_table;
		$result_set= $database->query($sql);
		$row=mysqli_fetch_array($result_set);

		return array_shift($row);
	}



} //End of Class





?>