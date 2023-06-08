<?php 


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nurses";
        $selected_department_id = $_POST['department_id'];

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        

        $stmt = $conn->prepare("SELECT n.name FROM nurse n
                INNER JOIN nurse_ward nw ON nw.fid_nurse = n.id_nurse
                WHERE nw.fid_ward = :selected");

        $stmt->bindParam(':selected', $selected_department_id);       

        $stmt->execute();

        
        $xml = new SimpleXMLElement('<nurses/>');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nurse = $xml->addChild('nurses');
            $nurse->addChild('name', $row['name']);            
        }

       
        header('Content-Type: application/xml; charset=utf-8');
        echo $xml->asXML();

        $conn = null;
    
    ?>