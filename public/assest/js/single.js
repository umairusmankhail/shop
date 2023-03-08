
$(document).ready(function(){
    var basePath = $("#base_path").val();
    //Array of Values
    $("#employee_id").autocomplete({
        source: function(request, cb){
            $.ajax({
                url: basePath+'/get-employess/'+request.term,
                method: 'GET',
                dataType: 'json',
                success: function(res){
                    var result;
                    result = [
                        {
                            label: 'There is no matching record found for '+request.term,
                            value: ''
                        }
                    ];

                    console.log(res);
                    

                    if (res.length) {
                        result = $.map(res, function(obj){
                            return {
                                label: obj.id,
                                value: obj.id,
                                data : obj
                            };
                        });
                    }
                    cb(result);
                }
            });
        },
        select:function(e, selectedData) {
            console.log(selectedData);

            if (selectedData && selectedData.item && selectedData.item.data){
                var data = selectedData.item.data;

                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#email').val(data.email);
                $('#designation').val(data.designationsName);
                $('#department').val(data.deptName);
            }
        }
    });
});



