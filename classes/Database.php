<?php
/**
* @Author - Ralph Harris
* 3/2/2019
*
* class database
*/

if(session_status() == PHP_SESSION_NONE){ session_start(); }
require_once __DIR__.'/../../../../wp-config.php';

class Database{
    /** prepare PDO connection */
    private $pdo;  
    /** database ref */
    public $database;
     /** any possible error msgs */
    private $last_msg;
    private $connectString;//connection string for pdo()
    private $dbUser;//db user
    private $dbPass;//db pass
    
    public function printMsg(){
        return $this->last_msg;
    }
    public function printError(){
        return $this->last_msg;
    }
    
    /**
    * Constructor - initializes pdo connection
    * @init private string $SconnectString - DB connection string.
    * @init private string $DbUser - DB user.
    * @init private string $pass - DB password.
    */
    public function __construct(){
        $this->connectString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";";//connection string for pdo()
        $this->dbUser = DB_USER;//db user
        $this->dbPass = DB_PASSWORD;//db pass
        $this->dbConnect();//connect to database - init pdo / creates SQL tables
    }

    /**
    * Connection initialization  
    * @init PHP Data Object - secure pdo db connection
    * @init createTables (() - check that all tables are created
    * @return bool Returns connection success/failure.
    */
    private function dbConnect(){
        try {
            $pdo = new PDO($this->connectString, $this->dbUser, $this->dbPass);//establish connection
            $this->pdo = $pdo;//make global in this class
            $this->createTables();
            return true;
        }catch(PDOException $e) {//set error
            $this->last_msg = 'PDO Connection error! '.$e;
            return false;
        }
    }
    
    /**
    * Create database retech
    *@return bool success/fail
    */
    function createTables()
    {
        $this->create_richco_settings();
        $this->createWork_order();
        $this->createUsers();
        $this->createChat();
        $this->createEmail();
        return true;
    }    
    public function send_message($sender, $reciever, $message, $date){
         if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('INSERT INTO messages (sender_email, reciever_email, message, date) VALUES (?, ?, ?, ?)');//statement
        if($stmt->execute([$sender, $reciever, $message, $date])){//execute - success
                return true;
        }else{//execute - failure
            $this->last_msg = 'Failed sending message.';//set error
            return false;//you loose
        }
    }
    public function get_sent_messages($email){
         if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "SELECT * FROM messages WHERE sender_email = ?";
        $stmt = $pdo->prepare($wrds);//sql statement
        $stmt->execute([$email]);//execute with email
        $user = $stmt->fetchAll();//define user
        return $user;
    }
    public function get_email_from_id($id){
         if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "SELECT * FROM emails WHERE id = ?";
        $stmt = $pdo->prepare($wrds);//sql statement
        $stmt->execute([$id]);//execute with email
        $user = $stmt->fetch();//define user
        return $user['id'];
    }
    function remove_user($id){
                 if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "DELETE FROM users WHERE id = ?";
            $stmt = $pdo->prepare($wrds);//sql statement
            if( $stmt->execute([$id]) ){//execute with email
                return true;
            }else{
                $this->last_msg = 'error deleting user: sql error';
                return false;
            }
      
    }
    public function set_email_password($id, $password){
         if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "UPDATE emails SET password = ? WHERE id = ?";
        $pass = $this->hashPass($password);
        $stmt = $pdo->prepare($wrds);//sql statement
        if( $stmt->execute([$pass, $id]) ){//execute with email
            return true;
        }else{
            $this->last_msg = 'error setting email password - sql error';
            return false;
        }
    }
    public function set_user_password($id, $password){
         if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "UPDATE users SET password = ? WHERE id = ?";
        $pass = $this->hashPass($password);
        $stmt = $pdo->prepare($wrds);//sql statement
        if( $stmt->execute([$pass, $id]) ){//execute with email
            $this->last_msg = 'Successfully updated user password';
            return true;
        }else{
            $this->last_msg = 'error setting users password - sql error';
            return false;
        }
    }
    public function update_emails($id, $password){
          if(is_null($this->pdo)){//bad connection?
            $this->last_msg = 'Connection error!';
            return false;
        }else{//good connection
            $pdo = $this->pdo;//connection
            $stmt = $pdo->prepare('SELECT * FROM emails WHERE id = ? limit 1');//sql statement
            if( $stmt->execute([$id]) ){//php's pass hash verification
                $user = $stmt->fetch();//define user
                if($password !== $user['password'] || $password !== "*hidden*"){//check if this is the same pass
                    $message = 'RichCo email update new password:/r/nEmail: '.$user['email'].'/r/n/r/npassword: '.$password;
                    $this->send_self_email($message);
                    return $this->set_email_password($id, $password);//run set_email_password
                }else {
                    return true;
                }
            }else{//error
                $this->last_msg = 'Error: Email not found. ';//set error
                return false;//failure
            } 
        }
    }
    public function update_users($name, $email, $address, $company, $password, $phone, $type, $id){
          if(is_null($this->pdo)){//bad connection?
            $this->last_msg = 'Connection error!';
            return false;
        }else{//good connection
            $pdo = $this->pdo;//connection
            $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ? LIMIT 1');//sql statement
            if( $stmt->execute([$id]) ){//php's pass hash verification
                $user = $stmt->fetch();//define user
                $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ?, address = ?, company = ?, phone = ?, type = ? WHERE id = ?');//sql statement
                $stmt->execute([$name, $email, $address, $company, $phone, $type, $id]); //php's pass hash verification
                if($password !== $user['password'] || $password !== "*hidden*" || !ctype_space($password)){//check if this is the same pass
                    $pass = $this->hashPass($password);
                    return $this->set_users_password($id, $pass);//run set_user_password
                }else {
                    $this->last_msg = 'Successfully updated user info.(Did not update password)';//set error
                    return true;
                }
            }else{//error
                $this->last_msg = 'Error: User not found. ';//set error
                return false;//failure
            } 
        }
    }
    function set_users_password($id, $password){
        if(is_null($this->pdo)){//bad connection?
            $this->last_msg = 'Connection error!';
            return false;
        }else{
            $pdo = $this->pdo;
             $stmt = $pdo->prepare('UPDATE users SET password = ? WHERE id = ?');//sql statement
             return  $stmt->execute([$password, $id]);
        }
    }
    public function insert_email($email, $password, $date){
         if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "INSERT INTO emails (password, email, date) VALUES (?, ?, ?)";
        $message = 'RichCo email addition:/r/nEmail: '.$email.'/r/n/r/npassword: '.$password;
        if($this->send_self_email($message)){
            if($this->checkEmailUsers($email)){
                $this->last_msg = 'This email address is already in use. You may delete or edit it below.';
                return false;
            }else{
                $pass = $this->hashPass($password);
                $stmt = $pdo->prepare($wrds);//sql statement
                if( $stmt->execute([$pass, $email, $date]) ){//execute with email
                    return true;
                }else{
                    $this->last_msg = 'error inserting new email - sql error';
                    return false;
                }
            }
        }else{
            $this->last_msg = 'error in Email generation.';
            return false;
        }
    }
    function send_self_email($message){
	$user_email='rahaprogramming@richcopropertysolutions.com';
	$to_email = 'admin@rahaprogramming.com';
	$subject =    "RichCo Property Solutions Email Mod";
	
	//email body
	$message_body = $message;
	
	// compose headers
	$headers = "From: $user_email\r\n";
	$headers .= "Reply-To: $user_email\r\n";
	$headers .= "X-Mailer: PHP/".phpversion();
	
	return mail($to_email, $subject, $message_body, $headers);
    }
    function send_email($message, $to_email, $subject){
	$user_email='support@richcopropertysolutions.com';
	
	//email body
	$message_body = $message;
	
	// compose headers
	$headers = "From: $user_email\r\n";
	$headers .= "Reply-To: $user_email\r\n";
	$headers .= "X-Mailer: PHP/".phpversion();
	
	return mail($to_email, $subject, $message_body, $headers);
    }
    function remove_email($id){
                 if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "DELETE FROM emails WHERE id = ?";
        $message = 'RichCo email deletion:/r/nEmail: '.$this->get_email_from_id($id);
        if($this->send_self_email($message)){
            $stmt = $pdo->prepare($wrds);//sql statement
            if( $stmt->execute([$id]) ){//execute with email
                return true;
            }else{
                $this->last_msg = 'error deleting email: sql error';
                return false;
            }
        }else{
            $this->last_msg = 'error in Email deletion. '. error_get_last();
            return false;
        }
    }
    //@return Array - returns all emails w/ passwords hidden as *hidden*
    public function get_all_emails(){
         if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "SELECT * FROM emails";
        $stmt = $pdo->prepare($wrds);//sql statement
        $stmt->execute([]);//execute with email
        $emails_data = $stmt->fetchAll();//define user
        //do NOT return hashed paswords - using $this->int_count() located at end of file
        for($i = 0;$i < count($emails_data);$i++){
            $emails_pass = $emails_data[$i]['password'];
            $emails_data[$i]['password'] = '*hidden*';//hide named index password
            //mySql returns numerically indexed arrays combined with a 
            //named array - remove both occurrances
            for($j = 0; $j < count($emails_data[$i]); $j++){
                if(isset($emails_data[$i][$j])){
                    if($emails_data[$i][$j] === $emails_pass){
                        $emails_data[$i][$j] = '*hidden*';//hide numerically indexed pass
                    }
                }
            }
            //remove password as variable
            $emails_pass = null;//probably redundant but better safe than sorry
        }
        return $emails_data;
    }
    //@return Array - returns all messages sorted by date/time
    public function get_all_messages(){
         if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        date_default_timezone_set('America/New_York');
        $pdo = $this->pdo;
        $wrds = "SELECT * FROM messages ORDER BY date";
        $stmt = $pdo->prepare($wrds);//sql statement
        $stmt->execute([]);//execute with email
        $data = $stmt->fetchAll();//define user
       /* $format='Y-m-d H:i:s';
        for ($i = 0; $i < count($data); $i++) {
            date_default_timezone_set('UTC');
            $date = date($format, $data[$i][date]);
            $newDatetime = strtotime($date);
            date_default_timezone_set('America/New_York');
            $newDatetime = date($format, $newDatetime);
            $data[$i]['date'] = $newDatetime;
        }
        /*
        for ($i = 0; $i < count($data); $i++) {
            $date = $data[$i]['date'];
            $from='UTC';
            $to='America/New_York';
            $format='Y-m-d H:i:s';
            date_default_timezone_set($from);
            $newDatetime = strtotime($date);
            date_default_timezone_set('America/New_York');
            $newDatetime = date($format, $newDatetime);
            date_default_timezone_set('UTC');
            $data[$i]['date'] = $newDatetime;
        }
         * 
         */
        return $data;
    }
    //@return Array - returns all users w/ passwords hidden as *hidden*
    public function get_all_users(){
         if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "SELECT * FROM users";
        $stmt = $pdo->prepare($wrds);//sql statement
        $stmt->execute([]);//execute with email
        $users_data = $stmt->fetchAll();//define user
        //do NOT return hashed paswords
        for($i = 0;$i < count($users_data);$i++){
            $user_pass = $users_data[$i]['password'];
            $users_data[$i]['password'] = '*hidden*';
            for($j = 0; $j < count($users_data[$i]); $j++){
                if(isset($users_data[$i][$j])){
                    if($users_data[$i][$j] === $user_pass){
                        $users_data[$i][$j] = '*hidden*';
                    }
                }
            }
            $user_pass = null;//probably redundant but better safe than sorry
        }
        return $users_data;
    }
    public function get_recieved_messages($email){
         if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "SELECT * FROM messages WHERE reciever_email = '".$email."'";
        $stmt = $pdo->prepare($wrds);//sql statement
        $stmt->execute([$email]);//execute with email
        $user = $stmt->fetchAll();//define user
        return $user;
    }
   /**
    * Create table messages
    *@return bool success/fail
    */
    function createChat(){
        try {
            $pdo = $this->pdo;
            $sql = "CREATE TABLE IF NOT EXISTS messages (
                    id int(10) AUTO_INCREMENT PRIMARY KEY,
                    sender_email varchar(50),
                    reciever_email varchar(50),
                    message varchar(255),
                    viewed smallint(2) DEFAULT 0,
                    date TIMESTAMP(6)
                    )";
            if($pdo->exec($sql)){
                $this->last_msg = "DB table messages created successfully";
                return true;
            }else{
                $this->last_msg = "DB table messages not created";
                return true;
            }
        }
        catch(PDOException $e)
        {
                $this->last_msg = 'error creating clients table: '.($e->getMessage());
                return false;
        }
    }
   /**
    * Create table work_orders
    *@return bool success/fail
    */
    function createWork_order(){
        try {
            $pdo = $this->pdo;
            $sql = "CREATE TABLE IF NOT EXISTS work_orders (
                    id int(10) AUTO_INCREMENT PRIMARY KEY,
                    work_id varchar(50),
                    folder varchar(100),
                    email varchar(50),
                    email_alt varchar(50),
                    details varchar(255),
                    viewed smallint(2) DEFAULT 0,
                    todo varchar(255),
                    comments varchar(255),
                    status varchar(50),
                    date TIMESTAMP(6)
                    )";
            if($pdo->exec($sql)){
                $this->last_msg = "DB table work_orders created successfully";
                return true;
            }else{
                $this->last_msg = "DB table work_orders not created";
                return true;
            }
        }
        catch(PDOException $e)
        {
                $this->last_msg = 'error creating clients table: '.($e->getMessage());
                return false;
        }
    }
    function activate_settings(){
        try {
            $pdo = $this->pdo;
            if(!$this->settings_exist()){
                $wrds = "INSERT INTO richco_settings (id) VALUES (1)";
                $pdo->exec($wrds);
                return true;
            }else{
                return true;
            }
        }
        catch(PDOException $e)
        {
                $this->last_msg = 'error creating clients table: '.($e->getMessage());
                return false;
        }
    }
   /**
    * Create table richco_settings
    *@return bool success/fail
    */
    function create_richco_settings(){
        try {
            $pdo = $this->pdo;
            $sql = "CREATE TABLE IF NOT EXISTS richco_settings (
                    id int(10) AUTO_INCREMENT PRIMARY KEY,
                    email varchar(150) DEFAULT 'jamie@richcopropertysolutions.com'
                    )";
            if($pdo->exec($sql)){
                $this->last_msg = "DB table richco_settings created successfully";
                return true;
            }else{
                $this->last_msg = "DB table richco_settings not created";
                return true;
            }
        }
        catch(PDOException $e)
        {
                $this->last_msg = 'error creating clients table: '.($e->getMessage());
                return false;
        }
    }
    public function save_work_order_details($id, $details, $comments, $status, $todo_array) {
        if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "UPDATE work_orders SET details = ?, comments = ?, status = ?, todo = ? WHERE id = ?";
        $stmt = $pdo->prepare($wrds);//sql statement
        if( $stmt->execute([$details, $comments, $status, $todo_array, $id]) ){//execute
            $this->last_msg = 'Successfully updated work order';
            return true;
        }else{
            $this->last_msg = 'error updating work order - sql error';
            return false;
        }
    }
    public function mark_work_order_seen($id) {
        if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "UPDATE work_orders SET viewed = 1 WHERE id = ?";
        $stmt = $pdo->prepare($wrds);//sql statement
        if( $stmt->execute([$id]) ){//execute
            $this->last_msg = 'Successfully updated work order';
            return true;
        }else{
            $this->last_msg = 'error updating work order - sql error';
            return false;
        }
    }
    public function set_order_to_viewed($id) {
        if(!isset($this->pdo)){
            $this->last_msg = 'error getting order - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "UPDATE work_orders SET viewed = ? WHERE id = ?";
        $stmt = $pdo->prepare($wrds);//sql statement
        if( $stmt->execute([1, $id]) ){//execute
            $this->last_msg = 'Successfully updated order';
            return true;
        }else{
            $this->last_msg = 'error updating order - sql error';
            return false;
        }
    }
    public function set_message_to_viewed($id) {
        if(!isset($this->pdo)){
            $this->last_msg = 'error getting message - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "UPDATE messages SET viewed = ? WHERE id = ?";
        $stmt = $pdo->prepare($wrds);//sql statement
        if( $stmt->execute([1, $id]) ){//execute
            $this->last_msg = 'Successfully updated message';
            return true;
        }else{
            $this->last_msg = 'error updating message - sql error';
            return false;
        }
    }
    public function settings_exist(){
        if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "SELECT * FROM richco_settings WHERE id = ?";
        $stmt = $pdo->prepare($wrds);//sql statement
        $stmt->execute([1]);//execute w/ email
        if($stmt->rowCount() > 0){//if it's there - success
            return true;
        }else{
            return false;//failure
        }
    }
    public function add_work_order($id, $email, $details, $comments, $date, $folder, $viewed){
        if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "INSERT INTO work_orders (work_id, email, details, comments, date, folder, viewed) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($wrds);//sql statement
        if( $stmt->execute([$id, $email, $details, $comments, $date, $folder, $viewed]) ){//execute
            $this->last_msg = 'Successfully added new work order';
            return true;
        }else{
            $this->last_msg = 'error inserting new user - sql error';
            return false;
        }
    }
    public function remove_work_order($id){
        if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "DELETE FROM work_orders WHERE id = ?";
        $stmt = $pdo->prepare($wrds);//sql statement
        if( $stmt->execute([$id]) ){//execute with email
            $this->last_msg = 'Successfully removed work order data';
            return true;
        }else{
            $this->last_msg = 'Error getting work order data - pdo error.';
            return false;
        }
    }
    public function get_work_orders($email){
        if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "SELECT * FROM work_orders WHERE email = ?";
        $stmt = $pdo->prepare($wrds);//sql statement
        if( $stmt->execute([$email]) ){//execute with email
            $this->last_msg = 'Successfully got work order data';
            $work_order_array = $stmt->fetchAll();
            for($i = 0; $i < count($work_order_array); $i++){//clean json data
                if($work_order_array[$i]['todo'] !== null && $work_order_array[$i]['todo'] !== ''){
                    $todo = html_entity_decode(strip_tags($work_order_array[$i]['todo']));
                    $fin = str_replace('\\', '', $todo);
                    $work_order_array[$i]['todo'] = $fin;
                }
            }
            return $work_order_array;
        }else{
            $this->last_msg = 'Error getting work order data - pdo error.';
            return false;
        }
    }
    public function get_all_work_orders(){
        if(!isset($this->pdo)){
            $this->last_msg = 'error getting work order data - pdo error';
            return false;
        }
        $pdo = $this->pdo; $wrds = "SELECT * FROM work_orders"; $stmt = $pdo->prepare($wrds);//sql statement
        if( $stmt->execute([]) ){//execute with email
            $this->last_msg = 'Successfully got work order data';
            $work_order_array = $stmt->fetchAll();
            for($i = 0; $i < count($work_order_array); $i++){//clean json data
                if($work_order_array[$i]['todo'] !== null && $work_order_array[$i]['todo'] !== ''){
                    $todo = html_entity_decode(strip_tags($work_order_array[$i]['todo']));
                    $fin = str_replace('\\', '', $todo);
                    $work_order_array[$i]['todo'] = $fin;
                }
            }
            return $work_order_array;
        }else{
            $this->last_msg = 'Error getting work order data - pdo error.';
            return false;
        }
    }
   /**
    * Create table messages
    *@return bool success/fail
    */
    function createEmail(){
        try {
            $pdo = $this->pdo;
            $sql = "CREATE TABLE IF NOT EXISTS emails (
                    id int(10) AUTO_INCREMENT PRIMARY KEY,
                    email varchar(50),
                    password varchar(255),
                    date varchar(20)
                    )";
            $pdo->exec($sql);
            $this->last_msg = "DB table emails created successfully";
            return true;
        }
        catch(PDOException $e)
        {
                $this->last_msg = 'error creating clients table: '.($e->getMessage());
                return false;
        }
    }
   /**
    * Create table clients
    *@return bool success/fail
    */
    function createUsers(){
        try {
            $pdo = $this->pdo;
            $sql = "CREATE TABLE IF NOT EXISTS users (
                    id int(10) AUTO_INCREMENT PRIMARY KEY,
                    name varchar(50),
                    email varchar(50),
                    address varchar(255),
                    company varchar(80),
                    password varchar(255),
                    pic varchar(100),
                    phone varchar(15),
                    type varchar(15),
                    date varchar(15)
                    )";
            $pdo->exec($sql);
            $this->last_msg = "DB table created clients successfully";
            return true;
        }
        catch(PDOException $e)
        {
                $this->last_msg = 'error creating clients table: '.($e->getMessage());
                return false;
        }
    }
    public function insert_user($name, $email, $address, $company, $password, $pic, $phone, $type, $date){
         if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $wrds = "INSERT INTO users (name, email, address, company, password, pic, phone, type, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            if($this->checkUserUsers($email)){
                $this->last_msg = 'This user already exists. You may delete or edit it below.';
                return false;
            }else{
                $pass = $this->hashPass($password);
                $stmt = $pdo->prepare($wrds);//sql statement
                if( $stmt->execute([$name, $email, $address, $company, $pass, $pic, $phone, $type, $date]) ){//execute with email
                    $this->last_msg = 'Successfully added new user';
                    return true;
                }else{
                    $this->last_msg = 'error inserting new user - sql error';
                    return false;
                }
            }
    }
    
    /**
    * Login function
    * @param string $email - employees email.
    * @param string $password - employees password.
    *
    * @return bool returns login success or failure.
    */
    public function login($email,$password){
        if(is_null($this->pdo)){//bad connection?
            $this->last_msg = 'Connection error!';
            return false;
        }else{//good connection
            $pdo = $this->pdo;//connection
            $type = '';$stmt = '';
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? limit 1');//sql statement        
            if( $stmt->execute([$email]) ){//php's pass hash verification
                $user = $stmt->fetch();//define user
                if(password_verify($password, $user['password'])){
                    //define session variables
                    $this->set_session($user['type'], $user['name'], $user['pic'], $user['phone'], $user['email'], $user['address'], $user['company'] , $user['date'], $user['id'] );
                    return true;//success
                }else{
                    $this->last_msg = 'Error: Invalid login information: ';//set error
                    return false;
                }
            }else{//error
                $this->last_msg = 'Error: Email not found. ';//set error
                return false;//failure
            } 
        }
    }
    /**
     * function to pull array of user data and set/reset the sessions data
     * @param string - email address of user
     * @return bool/array - array of users' information or false for error
     */
    function get_users_data($email){
        if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? limit 1');//sql statement
        $stmt->execute([$email]);//execute with email
        $user = $stmt->fetch();//define user
        $this->set_session($user['type'], $user['name'], $user['pic'], $user['phone'], $user['email'], $user['address'], $user['company'] , $user['date'], $user['id'] );
        return $user;
    }
    function reset_users_data($email){
        if(!isset($this->pdo)){
            $this->last_msg = 'error getting users data - pdo error';
            return false;
        }
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? limit 1');//sql statement
        $stmt->execute([$email]);//execute with email
        $user = $stmt->fetch();//define user
        return $this->set_session($user['type'], $user['name'], $user['pic'], $user['phone'], $user['email'], $user['address'], $user['company'] , $user['date'], $user['id'] );
    }
    /**
    * update users info
    * @param string $old_email - previous email.
    * @param string $email - new email.
    *
    * @return bool returns success or failure.
    */
    public function update_user($name, $email, $address, $phone, $company, $old_email){
        if(is_null($this->pdo)){//bad connection?
            $this->last_msg = 'Connection error!';
            return false;
        }else{//good connection
            $pdo = $this->pdo;//connection
            if( !isset($_SESSION['type']) ){
                $this->last_msg = "Cannot update information because you are logged out!";
                return false;
            }//ctype_space() - checks for only white space
            if(empty($name) || ctype_space($name)){ $name = $_SESSION['name']; }
            if(empty($email) || ctype_space($email)){ $email = $_SESSION['email']; }
            if(empty($address) || ctype_space($address)){ $address = $_SESSION['address']; }
            if(empty($phone) || ctype_space($phone)){ $phone = $_SESSION['phone']; }
            if(empty($company) || ctype_space($company)){ $company = $_SESSION['company']; }
            $pre_stmt = 'UPDATE users SET name = ?, email = ?, address = ?, phone = ?, company = ? WHERE email = ?';
            $stmt = $pdo->prepare($pre_stmt);
            if($stmt->execute([$name, $email, $address, $phone, $company, $old_email])){//execute with email
                return $this->reset_users_data($email);
            }else{
                $this->last_msg = "sql error.";
                return false;
            }
        }
    }
         /**
    * update profile picture
    * @param int id.
    * @return boolean of success.
    */
    public function setPic($email,$pic){
        $pdo = $this->pdo;
        if(isset($email) && isset($pic)){
            $stmt = $pdo->prepare('UPDATE users SET pic = ? WHERE email = ?');
            if($stmt->execute([$pic,$email])){
                $_SESSION['pic'] = $pic;
                return true;
            }else{
                $this->last_msg = 'Update photo failed.';
                return false;
            }
        }else{
            $this->last_msg = 'Error updating photo.';
            return false;
        }
    }
    /**
    * function to pass the pdo connection to other classes
    * @return pdo connection.
    */
    public function getPdo(){
        return $this->pdo;
    }

    public function getIDFromEmail($email){
        
        $pdo = $this->pdo;//connection
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? limit 1');//sql statement
        $stmt->execute([$email]);//execute w/ email
        $user = $stmt->fetch();
        $id = $user['id'];
        return $id;
    }
    public function set_session($type, $name, $pic, $phone, $email, $address, $company, $date, $id){
        if($id === '' || $id === ' ' || $id === null || !isset($id) || is_null($id)){
            $id = $this->getIDFromEmail($email);
        }
        if(isset($_SESSION)){
            session_regenerate_id();
            $_SESSION['id'] = $id;
            $_SESSION['type'] = $type;
            $_SESSION['name'] = $name;
            $_SESSION['pic'] = $pic;
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] = $email;
            $_SESSION['address'] = $address;
            $_SESSION['company'] = $company;
            $_SESSION['date'] = $date;
            return true;
        }else{
            session_regenerate_id();//new session
            $this->last_msg = 'error in set session: session not set';
            return false;
        }
    }
    
    /**
    * Password hash - hashes the pass for a pass hash
    * @param string $password - employee entered password.
    * @return string $password - Hashed password.
    */
    private function hashPass($pass){
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    /**
    * Logout the user and remove it from the session.
    *
    * @return true
    */
    public function logout() {
        $_SESSION['type'] = null;
        session_regenerate_id();
        return true;
    }
        
    /**
    * Check if email is already used
    * @param string $email - employee's email.
    * @return success/failure.
    */
    public function checkEmailVendors($email){
        $pdo = $this->pdo;//connection
        $stmt = $pdo->prepare('SELECT id FROM vendors WHERE email = ? limit 1');//statement
        $stmt->execute([$email]);//execute w/ email
        if($stmt->rowCount() > 0){//if it's there - success
            return true;
        }else{
            return false;//failure
        }
    }
        
    /**
    * Check if email is already used
    * @param string $email - account's email.
    * @return success/failure.
    */
    public function checkEmailUsers($email){
        $pdo = $this->pdo;//connection
        $stmt = $pdo->prepare('SELECT id FROM emails WHERE email = ? limit 1');//statement
        $stmt->execute([$email]);//execute w/ email
        if($stmt->rowCount() > 0){//if it's there - success
            return true;
        }else{
            return false;//failure
        }
    }
        
    /**
    * Check if email is already used
    * @param string $email - user's email.
    * @return success/failure.
    */
    public function checkUserUsers($email){
        $pdo = $this->pdo;//connection
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? limit 1');//statement
        $stmt->execute([$email]);//execute w/ email
        if($stmt->rowCount() > 0){//if it's there - success
            return true;
        }else{
            return false;//failure
        }
    }
        
        /**
    * Check if email is already used
    * @param string $email - employee's email.
    * @return success/failure.
    */
    public function checkEmailClients($email){
        $pdo = $this->pdo;//connection
        $stmt = $pdo->prepare('SELECT id FROM clients WHERE email = ? limit 1');//statement
        $stmt->execute([$email]);//execute w/ email
        if($stmt->rowCount() > 0){//if it's there - success
            return true;
        }else{
            return false;//failure
        }
    }
    /**
    * Useful template rendering function
    * @param string $path - path of the template file.
    * @return void.
    */
    public function render($path,$vars = '') {
        ob_start();
        include($path);
        return ob_get_clean();
    }

    /**
    * securely output any page 
    * @return void.
    */
    public function renderPage($path) {
        print $this->render($path);
    }
        
    /**
     * Encrypt a message
     * 
     * @param string $message - message to encrypt
     * @param string $key - encryption key
     * @return string
     */
    function encrypt($message)
    {
        $key = 'J@NcRfUjXn2r5u8x!A%D*G-KaPdSgVkYp3s6v9y$B?E(H+MbQeThWmZq4t7w!z%C*F)J@NcRfUjXn2r5u8x/A?D(G+KaPdSgVkYp3s6v9y$B&E)H@McQeThWmZq4t7w!';
        $nonce = \Sodium\randombytes_buf(\Sodium\CRYPTO_SECRETBOX_NONCEBYTES);

        return base64_encode(
            $nonce.
            \Sodium\crypto_secretbox(
                $message,
                $nonce,
                $key
            )
        );
    }
    
    /**
     * Decrypt a message
     * 
     * @param string $encrypted - message encrypted with safeEncrypt()
     * @param string $key - encryption key
     * @return string
     */
    function decrypt($encrypted)
    {   
        $key = 'J@NcRfUjXn2r5u8x!A%D*G-KaPdSgVkYp3s6v9y$B?E(H+MbQeThWmZq4t7w!z%C*F)J@NcRfUjXn2r5u8x/A?D(G+KaPdSgVkYp3s6v9y$B&E)H@McQeThWmZq4t7w!';
        $decoded = base64_decode($encrypted);
        $nonce = mb_substr($decoded, 0, \Sodium\CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
        $ciphertext = mb_substr($decoded, \Sodium\CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');

        return \Sodium\crypto_secretbox_open(
            $ciphertext,
            $nonce,
            $key
        );
    }  
    
/* function similar to count, but only counts integer idexes - 
 * (not string or decimal indexes) useful for working with mySql
 * returned table values
 * @param array
 * @return int - number of integer indexes in an array
 */
function int_count ($array) {
    count(array_filter(array_keys($array), function($key) {
        return is_int($key);
    }));
  }
}