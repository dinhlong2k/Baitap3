<?php

    require_once "db.php";
    $sql ="SELECT * FROM employee";
    $row =mysqli_query($connect,$sql);

    if(mysqli_num_rows($row) >0){
        echo '<table id="table_employee" class="table table-striped table-hover" >
        <thead>
            <tr>
                <th>Id</th>
                <th>Ảnh</th>
                <th>Tên nhân viên</th>
                <th>Email</th>				
                <th>Số điện thoại</th>
                <th>Địa chỉ </th>
                <th>Action</th>
            </tr>
        </thead>';
        $id=1;
        while($item = mysqli_fetch_assoc($row)) {
            echo '
            <tr>
                <td> '. $id.' </td>
                <td><img src="'.($item['image'] ).'" width="50px" height="50px" style="border-radius:50%"/> </td>
                <td> '. $item['name'].' </td>
                <td> '. $item['email'].' </td>
                <td> '. $item['phone'].' </td>
                <td> '. $item['location'].' </td>

                <td>
                    <a id="btn-edit" class="settings edit-btn" title="Settings" data-toggle="modal" data-target="#ModalCenterUpdate" data-idedit='. $item['id'].'><i class="far fa-edit"></i></a>
                    <a id="btn_delete" class="delete delete-btn" title="Delete" data-toggle="modal" data-target="#exampleModalCenterDelete"  data-id='. $item['id'].'><i class="fas fa-trash" style="color: red;"></i></a>
                </td>
                
            </tr>';
            $id++;
        }
    }

    mysqli_close($connect);
?>