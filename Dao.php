<?php

/**
 * Contains all of our database accessing functions with prepared statements.
 */
class Dao{

    //creates and returns the PDO connection
    private function getConnection(){
        $host=getenv('DB_HOST');
        $db=getenv('DB_NAME');
        $user=getenv('DB_USER');
        $pass=getenv('DB_PASS');
        // $host='db-mysql-nyc1-73291-do-user-8637549-0.b.db.ondigitalocean.com';
        // $db='defaultdb';
        // $user='doadmin';
        // $pass='cn1qp7q2j316zguj';

        $dsn = "mysql:host=$host; dbname=$db; port=25060";
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    //returns connection status
    public function getConnectionStatus(){
        $conn = $this->getConnection();
        return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
    }

    public function addMainLead($first_name, $last_name, $email, $city, $state, $phone_number, $zip_code, $msg, $industry, $client_name, $sub_domain, $requirements){
        $conn = $this->getConnection();
        $query = "INSERT INTO leads(first_name, last_name, email, city, state, phone_number, zip_code, msg, industry, client_name, sub_domain, requirements)
                    VALUE(:first_name, :last_name, :email, :city, :state, :phone_number, :zip_code, :msg, :industry, :client_name, :sub_domain, :requirements)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':zip_code', $zip_code);
        $stmt->bindParam(':msg', $msg);
        $stmt->bindParam(':industry', $industry);
        $stmt->bindParam(':client_name', $client_name);
        $stmt->bindParam(':sub_domain', $sub_domain);
        $stmt->bindParam(':requirements', $requirements);

        try{
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    // public function addMainLead($first_name, $last_name, $email, $phone_number, $zip_code, $msg, $industry, $client_name, $sub_domain){
    //     $conn = $this->getConnection();
    //     $query = "INSERT INTO leads(first_name, last_name, email, phone_number, zip_code, msg, industry, client_name, sub_domain)
    //                 VALUE(:first_name, :last_name, :email, :phone_number, :zip_code, :msg, :industry, :client_name, :sub_domain)";
    //     $stmt = $conn->prepare($query);
    //     $stmt->bindParam(':first_name', $first_name);
    //     $stmt->bindParam(':last_name', $last_name);
    //     $stmt->bindParam(':email', $email);
    //     $stmt->bindParam(':phone_number', $phone_number);
    //     $stmt->bindParam(':zip_code', $zip_code);
    //     $stmt->bindParam(':msg', $msg);
    //     $stmt->bindParam(':industry', $industry);
    //     $stmt->bindParam(':client_name', $client_name);
    //     $stmt->bindParam(':sub_domain', $sub_domain);

    //     try{
    //         $stmt->execute();
    //         return true;
    //     }catch(PDOException $e){
    //         return false;
    //     }
    // }

    public function addSimpleLead($first_name, $last_name, $email, $phone_number, $zip_code, $industry, $client_name, $sub_domain, $requirements){
        $conn = $this->getConnection();
        $query = "INSERT INTO leads(first_name, last_name, email, phone_number, zip_code, industry, client_name, sub_domain, requirements)
                    VALUE(:first_name, :last_name, :email, :phone_number, :zip_code, :industry, :client_name, :sub_domain, :requirements)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':zip_code', $zip_code);
        $stmt->bindParam(':industry', $industry);
        $stmt->bindParam(':client_name', $client_name);
        $stmt->bindParam(':sub_domain', $sub_domain);
        $stmt->bindParam(':requirements', $requirements);

        try{
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    // public function addSimpleLead($first_name, $last_name, $email, $phone_number, $zip_code, $industry, $client_name, $sub_domain){
    //     $conn = $this->getConnection();
    //     $query = "INSERT INTO leads(first_name, last_name, email, phone_number, zip_code, industry, client_name, sub_domain)
    //                 VALUE(:first_name, :last_name, :email, :phone_number, :zip_code, :industry, :client_name, :sub_domain)";
    //     $stmt = $conn->prepare($query);
    //     $stmt->bindParam(':first_name', $first_name);
    //     $stmt->bindParam(':last_name', $last_name);
    //     $stmt->bindParam(':email', $email);
    //     $stmt->bindParam(':phone_number', $phone_number);
    //     $stmt->bindParam(':zip_code', $zip_code);
    //     $stmt->bindParam(':industry', $industry);
    //     $stmt->bindParam(':client_name', $client_name);
    //     $stmt->bindParam(':sub_domain', $sub_domain);

    //     try{
    //         $stmt->execute();
    //         return true;
    //     }catch(PDOException $e){
    //         return false;
    //     }
    // }

    public function addChatbotLead($chatbot_id, $first_name, $email, $phone_number, $zip_code, $industry, $client_name, $sub_domain){
        $conn = $this->getConnection();

        $query = "INSERT INTO leads(chatbot_id, first_name, email, phone_number, zip_code, industry, client_name, sub_domain)
        VALUE(:chatbot_id, :first_name, :email, :phone_number, :zip_code, :industry, :client_name, :sub_domain)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':chatbot_id', $chatbot_id);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':zip_code', $zip_code);
        $stmt->bindParam(':industry', $industry);
        $stmt->bindParam(':client_name', $client_name);
        $stmt->bindParam(':sub_domain', $sub_domain);

        try{
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    //updates email on chatbot record according to the chatbot id
    public function updateEmail($email, $chatbot_id){
        $conn = $this->getConnection();
        //where session id
        $query = "UPDATE leads SET email = '$email' WHERE chatbot_id='$chatbot_id'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }

    //updates phone number on chatbot record according to the chatbot id
    public function updatePhoneNumber($phone_number, $chatbot_id){
        $conn = $this->getConnection();
        $query = "UPDATE leads SET phone_number = '$phone_number' WHERE chatbot_id='$chatbot_id'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }

    public function updateZipCode($zip_code, $chatbot_id){
        $conn = $this->getConnection();
        $query = "UPDATE leads SET zip_code = '$zip_code' WHERE chatbot_id='$chatbot_id'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }

    /**
     * Returns all of the leads in our leads table (for the forms) and outputs in json format
     */
    public function getAllLeads(){
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT first_name, last_name, email, phone_number, zip_code, industry, msg, client_name, sub_domain FROM leads");

        $rows = array();
        header("Content-Type: JSON");
        while($r = $stmt->fetch()){
            $rows[] = $r;
        }
        $data = json_encode($rows, JSON_PRETTY_PRINT);

        return print $data;
    }

    /**
     * Returns the last added lead in our leads table and outputs in json format
     */
    public function getLatestLead(){
        $conn = $this->getConnection();
        $stmt = $conn->query("SELECT leads_id, chatbot_id, first_name, last_name, email, phone_number, zip_code, industry, msg, client_name, sub_domain FROM leads
            ORDER BY leads_id
            DESC
            LIMIT 1");
        $rows = array();
        header("Content-Type: JSON");
        while($r = $stmt->fetch()){
            $rows[] = $r;
        }
        $data = json_encode($rows, JSON_PRETTY_PRINT);
        return print $data;
    }
}
?>