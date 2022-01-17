* Xoá 1 bảng có foreign key trong MysQ

VD xoá bảng người dùng " set foreign_key_checks=0;
truncate table users";

* Sử dụng 1 Schema trong database: "USE {Schema}"
* Lecture  59:

  1. Role

     + Admin has access: Users,Categories,Brands,Products,Question, Reviews,
       Customers,Shipping,Orders, Reports,Articles, Menus, Setting
     + SalesPerson has access: Products,Customers,Shipping,Orders,Reports
     + Editor has access: Categories, Brands,Products, Articles, Menus
     + Shippers has access: Products,Orders
     + Assistant has access: Question, Reviews
* Lecture 71:

  + List Categories Hierarchi and sub Hierarchi leen bảng
* Lecture 72: Update Category

  + Update Categories
  + Hiển thị lỗi nếu category Id không tìm thấy hoặc không có
  + Trong image edit, image không yêu cầu
  + Nếu không có ảnh được upload, không chỉnh sửa ảnh hiện tại
* Lecture 74: Check unique

  + Sử dụng rest api check name va alias neu trung thi tra ve false. Ngược lại trả về true
  + Trả về trong hàm checkIdNameAlias() trong lớp CategoryServiceImp. Hàm trả về chuỗi String
    "OK", "DuplicateName","DuplicateAlias"
* Lecture 75: Code Sort

  + Người dùng có thể sort với tên category theo tăng dần hoặc giảm dần
  + Sort với root category, sau đó tới sub category

*Lecture 76: Update Enabled Status

*Lecture 77: Code delete Category function

+ Thêm thuộc tính hasParent với annotation @Transient trong class Category
+ Trong function copyFullProperties trong class Category. Set
  giá trị
