$(document).ready(function(){
    loadData();
    get();
  });

  function showPreview(event){
          if(event.target.files.length > 0){
              var src = URL.createObjectURL(event.target.files[0]);
              var preview = document.getElementById("file-ip-1-preview");
              preview.src = src;
              preview.style.display = "block";
          }
      }

  function loadData(){
      $.ajax({
        type:'get',
        url:"/baitap3/db/list.php",
        dataType:'json',
        success:function(data){
          data=JSON.parse(JSON.stringify(data));
          var str="";
          $.each(data,function(i,item){
              str+="<tr>";
              str+="<td>" + item.userId +"</td>";
              str+="<td>" + '<img src="'+ item.image + '" width="50px" height="50px" style="border-radius:50%"/>' + "</td>";
              str+="<td>" + item.name +"</td>";
              str+="<td>" + item.email +"</td>";
              str+="<td>" + item.date_join +"</td>";
              str+="<td>" + item.sales +"</td>";
              if(item.is_active == 1){
                str+="<td><span class=\"status text-success\">&bull;</span> Đang hoạt động";
              }else if(item.is_active ==0){
                str+="<td><span class=\"status text-danger\">&bull;</span> Không hoạt động";
              }
              str+="<td>" + item.roles +"</td>";
              str+="<td>" +'<a class=\"settings\" title=\"Settings\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\" data-id='+item.userId+'><i class=\"far fa-edit\"></i></a>'
                  + '<a class="delete" title="Delete" data-toggle=\"modal\" data-target=\"#exampleModalCenterDelete\"><i class="fas fa-trash" style="color: red;"></i></a>' + "</td>";
          });

          $('#load_data').html(str);
        }
      })
  }


  function get(){
    $(document).delegate("[data-target='#exampleModalCenter']","click",function(){
      var employeeId= $(this).attr('data-id');
      $.ajax({
        type:"get",
        url: "/baitap3/db/get.php",
        dataType: "json",
        data: {
          id:employeeId
        },
        beforeSend:function(){},
        success:function(response){
          response = JSON.parse(JSON.stringify(response));
          console.log(response);
            document.getElementById('nameInput').value=response[0].name;
          document.getElementById('emailinput').value=response[0].email;
          document.getElementById('passwordinput').value=response[0].password;
        }
        
      })
    })
  }
