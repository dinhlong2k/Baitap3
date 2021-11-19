$(document).ready(function(){
    getAllDataEmployee();
});

function showPreview(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-ip-1-preview");
        preview.src = src;
        preview.style.display = "block";
    }
}

function getAllDataEmployee(){
    $.ajax({
        url: "/baitap3/db/list.php",
        method: "POST",
        success:function(data){
            $('#load_data').html(data);
        }
    });
}

function addUser(){
    event.preventDefault();

    var name=$('#nameInput').val();
    var email=$('#emailinput').val();
    var password=$('#passwordinput').val();
    var phone=$('#phoneinput').val();
    var location=$('#locationinput').val();
    var selectRole = $("input[name='role']").val();

    $.ajax({
        url: "/baitap3/db/create.php",
        method: "post",
        data:{
            name: name,
            email: email,
            password: password,
            phone: phone,
            location: location,
            role: selectRole
        },
        success:function(data){
          $('#ModalCenterAdd').modal('hide');
          getAllDataEmployee();
        }
    })
}

