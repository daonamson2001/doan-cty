z$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('main')
	        }
});

$(document).ready(function(){
    $('div#alert-err').hide();
    // EDIT
    $(document).on('click', '.btn-icon ', function(){
        var id = $(this).val();
        $.ajax({
            type : 'GET',
            url  : "users/" + id + "/edit",
            success: function(data){
                $("h4#title").text("Sửa người dùng có mã: " + data.id)
                $("input#id").val(data.id);
                $("input#name_users").val(data.name_users);
                $("input#address_users").val(data.address_users);
                $("input#phone_users").val(data.phone_users);
                console.log(data);
            }
        });
    });

    $(document).on('submit', '#form-update', function(){
        window.location.reload();
        if(confirm('Bạn Có Chắc Chắn Muốn Sửa Không?')){
            var id            = $('#id').val();
            var name_users   = $('#name_users').val();
            var address_users = $('#address_users').val();
            var phone_users    = $('#phone_users').val();
            console.log(id, name_users, address_users, phone_users);
            $.ajax({
               type :'put',
               url  : 'users/' + id,
               data : {
                    id         : id,
                    name_users   : name_users,
                    address_users : address_users,
                    phone_users    : phone_users,
               },
               success:function(data){
                   console.log(data);
                   window.location.reload();
                   if(data){
                        alert("Đã Sửa Thông Tin Chất Lượng: " + data);
                   }else{
                        alert("Lỗi!");
                        window.stop();
                   }
               }
            });

        }else{
            $(document).ready(function(){
                window.stop();
                $("#update").modal('show');
            });
        }
    });

    //DELETE
    $(document).on('click', '.btn-delete', function(){
        var id = $(this).val();
        if(confirm('Bạn Có Chắc Chắn Muốn Xóa Không?')){
            $.ajax({
               type    :'delete',
               url     : 'users/' + id,
               success :function(items){
                    console.log(items);
                   window.location.reload();
                   alert("Đã Xóa " + items.name_users);
               },
               error: function(items){
                   alert("Dữ Liệu Này Không Thể Xóa!");
               }
            });
        }
    });
});
