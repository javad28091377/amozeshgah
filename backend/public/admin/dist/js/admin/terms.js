// تموم درخواست‌های ایجکس شما به طور خودکار توکن را ارسال میکنند
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$("#add_terms").submit(function(event){

    event.preventDefault();

    var formdata = new FormData($(this)[0]);

    $.ajax({
        url: "/adminpanel/AddTerms",
        type: "POST",
        data: formdata,
        contentType: false,
        processData: false,

        success: function(response){

            // console.log(response);

            response = JSON.parse(response);

            Swal.fire({
                position: "center",
                title: response.message,
                icon: response.status,
                showConfirmButton: false,
                timer: 1500

            }).then(function(result){

                GetAllTerms();

            });
        },

        // error: function(xhr){

        //     console.log("Status:", xhr.status);
        //     console.log("Response:", xhr.responseText);

        // }
    });
});


function GetAllTerms()
{
    $.ajax({
        url:"/adminpanel/GetAllTerms",
        type:"POST",
        dataType: "json",
        success:function(response){
            
            console.log(response);
            // response=JSON.parse(response); // در کنترلر لاراول وقتی دستور ریترن میزنی نیاز به این خط نیست

            var tr_tag="";
            var base_url = "{{ asset('uploads') }}/";

            for(let i=0;i<response.length;i++)
            {
                tr_tag+=`<tr>
                            <td>`+(i+1)+`</td>
                            <td>`+response[i].title+`</td>
                            <td>`+response[i].master+`</td>
                            <td>`+response[i].capacity+`</td>
                            <td>`+response[i].price+`</td>
                            <td><img src="`+base_url+response[i].pic+`" width="50" height="50"></td>
                            <td>
                              <button id-terms="`+response[i].id+`" class="btn btn-danger btndeletterms" data-toggle="modal" data-target="#delettermsModal">حذف</button>
                              <button id-terms="`+response[i].id+`" class="btn btn-primary btneditterms" data-toggle="modal" data-target="#edittermsmodal">ویرایش</button>
                            </td>
                        </tr>`
            }

            $("#id-table-getterms").html(tr_tag);

            // show modal delet 
            $(".btndeletterms").click(function(){
                let id_terms=$(this).attr("id-terms");
                $("#btndeletterms").attr("id-terms",id_terms);
            });

            // get info edit
            $(".btneditterms").click(function(){

                let id_terms=$(this).attr("id-terms");
                $.ajax({
                    url:"/GetinfoTerms",
                    type:"POST",
                    data:"id_terms="+id_terms,
                    success:function(response){

                    response=JSON.parse(response);
                        
                        $("#editid").val(response.id);
                        $("#edittitle").val(response.title);
                        $("#editcapacity").val(response.capacity);
                        $("#editprice").val(response.price);
                        $("#editpic").val(response.pic);
                    }
                })
            });
        }
    });
}


$("#btndeletterms").click(function(){

    let id_terms=$(this).attr("id-terms");

    $.ajax({
        url:"/adminpanel/DeletTerms",
        type:"POST",
        data:"id_terms="+id_terms,
        success:function(response){
            // response=JSON.parse(response);
            
            Swal.fire({
                position: "center",
                title: response.message,
                icon: response.status,
                showConfirmButton: false,
                timer: 1500
              }).then(function(result){
                $("#delettermsModal").modal("hide");
                GetAllterms();
              });
        }
    })
});   


$("#edittermsform").submit(function(event){
    event.preventDefault();

    var formdata = new FormData($(this)[0]);
    
    $.ajax({
        url:"/adminpanel/EditTerms",
        type:"POST",
        data:formdata,
        async:false,
        contentType:false,
        cache:false,
        processData:false,
        enctype:false,
        success:function(response){

            console.log(response);
            
            // response = JSON.parse(response);
            
            Swal.fire({
                position: "center",
                title: response.massage,
                icon: response.status,
                showConfirmButton: false,
                timer: 1500
              }).then(function(result){
                $("#edittermsmodal").modal("hide");
                GetAllTerms();
              });
        }
    })
}); 