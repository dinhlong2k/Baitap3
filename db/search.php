<?php
    include 'db.php';
    session_start();
    $limit=5;
    $page=0;

    $output='';

    if(isset($_POST["page"])){
        $page= $_POST["page"];
    }else{
        $page=1;
    }
    $start_from=($page - 1) * $limit;

    $sql="SELECT * FROM employee WHERE name LIKE '%".$_POST['name']."%' OR email LIKE '%".$_POST['name']."%' OR phone LIKE '%".$_POST['name']."%' LIMIT $start_from, $limit";

    $result=mysqli_query($connect,$sql);

    if(mysqli_num_rows($result) > 0){
        $output .='
        <div class="table reponsive">
        <table id="table_employee" class="table table-striped table-hover" >
        <thead>
            <tr>
                <th>Id</th>
                <th>Ảnh</th>
                <th>Tên nhân viên</th>
                <th>Email</th>				
                <th>Số điện thoại</th>
                <th>Địa chỉ </th>';
                
        if($_SESSION['role'] == 'admin'){
                $output .='
                <th>Action</th>
            </tr>
        </thead>';
        }
    
        $id=1+(($page-1)*$limit);
        while($item = mysqli_fetch_assoc($result)) {
            $output .='
            <tr>
            <td> '. $id.' </td>';

            if(empty($item['image'])){
                $user_pic='<img src="/baitap3/upload/unknow.png" width="50px" height="50px" style="border-radius:50%"/>';
            }else{
                $user_pic='<img src="/baitap3/upload/'.($item['image'] ).'" width="50px" height="50px" style="border-radius:50%"/>';
            }

            $output .='
            <td> '.$user_pic.'</td>
            <td> '. $item['name'].' </td>
            <td> '. $item['email'].' </td>
            <td> '. $item['phone'].' </td>
            <td> '. $item['location'].' </td>';


            if($_SESSION['role'] == 'admin'){
                $output .='
                    <td>
                        <a id="btn-edit" class="settings edit-btn" title="Settings" data-toggle="modal" data-target="#ModalCenterUpdate" data-idedit='. $item['id'].'><i class="far fa-edit "></i></a>
                        <a id="btn_delete" class="delete delete-btn" title="Delete" data-toggle="modal" data-target="#exampleModalCenterDelete"  data-id='. $item['id'].'><i class="fas fa-trash" style="color: red;"></i></a>
                    </td>';
            }
            $output .='</tr>';
            $id++;
        }

    }

    $output .='
        </table>
        </div>
        ';

    $sql1="SELECT * FROM employee WHERE name LIKE '%".$_POST['name']."%' OR email LIKE '%".$_POST['name']."%' OR phone LIKE '%".$_POST['name']."%'";
    $query1=mysqli_query($connect,$sql1);

    $total_records=mysqli_num_rows($query1);
    $total_pages=ceil($total_records/$limit);

    $output .= '<ul class="pagination">';

    if($page >1){
        $previous=$page - 1;
        $output .=  '<li class="page-item" id="1"><span class="page-link">First Page</span></li>';
        $output .=  '<li class="page-item" id="'.$previous.'"><span class="page-link"><i class="fa fa-arrow-left"></i></span></li>';
    }

    for($i=1;$i<=$total_pages;$i++){
        $active_class ="";
        if($i == $page){
            $active_class ="active";
        }
        $output .=  '<li class="page-item '.$active_class.'" id="'.$i.'"><span class="page-link">'.$i.'</span></li>';
    }

    if($page <$total_pages){
        $page++;
        $output .=  '<li class="page-item" id="'.$page.'"><span class="page-link"><i class="fa fa-arrow-right"></i></span></li>';
        $output .=  '<li class="page-item" id="'.$total_pages.'"><span class="page-link">Last Page</span></li>';
    }

    $output .=  '</ul>';
    echo $output;

?>