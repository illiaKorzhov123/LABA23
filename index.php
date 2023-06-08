<!DOCTYPE html>
<html>
<head>
    <title>Выбор медсестры</title>

    <script src="1.js" defer></script>
    <script src="2.js" defer></script>
    <script src="3.js" defer></script>

</head>
<body>
    <h1>Выберите медсестру:</h1>
    
        <select name="nurse_id" id = 'nurse-select'>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "nurses";
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);      
            $sql = "SELECT id_nurse, name FROM nurse";
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);            
            foreach ($result as $row) {
                echo '<option value="' . $row["id_nurse"] . '">' . $row["name"] . '</option>';
            }        

            $conn = null;
            ?>
        </select>
        <input type="submit" name="submit" value="Отправить" id = 'nurseBtn'>
        <div id = 'nurse'></div>



    <h1>Выберите отделение:</h1>
    
        <select name="department_select" id = 'department_select'>
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "nurses";
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);           

            $sql = "SELECT id_ward, name FROM ward";
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            
                foreach ($result as $row) {
                    echo '<option value="' . $row["id_ward"] . '">' . $row["name"] . '</option>';
                }
            

            $conn = null;

            ?>
        </select>
        <input type="submit" name="submit" value="Отправить" id = 'dep_btn'>
        <div id = 'dep'></div>
    


    <h1>Выберите смену:</h1>
    <form id = 'shiftForm'>
        <select name="shift" id = 'shift-select'>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "nurses";
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "SELECT DISTINCT `shift` FROM nurse";
                $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);            
                foreach ($result as $row) {
                        echo '<option value="' . $row["shift"] . '">' . $row["shift"] . '</option>';            }            

                $conn = null;
                ?>
        </select>
        <input type="submit" name="submit" value="Отправить" id = 'shiftbtn'>
    </form>
    <div id = 'shift'></div>
</body>
</html>