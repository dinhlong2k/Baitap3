<?php
    include 'db.php';

    $query = $connect->query("SELECT * FROM employee ORDER BY id ASC"); 
 
    if($query->num_rows > 0){ 
        $delimiter = ","; 
        $filename = "members-data_" . date('Y-m-d') . ".csv"; 
        
        // Create a file pointer 
        $f = fopen('php://memory', 'w'); 
        fputs($f,chr(0xEF).chr(0xBB).chr(0xBF));

        // Set column headers 
        $fields = array('ID', 'NAME', 'EMAIL', 'LOCATION', 'PHONE'); 
        fputcsv($f, $fields, $delimiter); 
        
        // Output each row of the data, format line as csv and write to file pointer 
        while($row = $query->fetch_assoc()){ 
            $lineData = array($row['id'], $row['name'], $row['email'], $row['location'],"=\"" .$row['phone']. "\""); 
            fputcsv($f, $lineData, $delimiter); 
        } 
        
        // Move back to beginning of file 
        fseek($f, 0); 
        
        // Set headers to download file rather than displayed 
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/csv;charset=UTF-8'); 
        header('Content-Disposition: attachment; filename="' . $filename . '";'); 
        
        //output all remaining data on a file pointer 
        fpassthru($f); 
    } 
    exit; 
?>