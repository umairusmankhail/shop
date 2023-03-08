$(document).ready(function(){
    var rowcount, addBtn, tableBody, imgPath, basePath;

    addBtn = $("#addNew");
    rowcount = $("#autocomplete_table tbody tr").length+1;
    tableBody = $("#autocomplete_table tbody");
    imgPath = $("#imgPath").val();
    basePath = $("#base_path").val();


    function formHtml() {
        html = '<tr id="row_'+rowcount+'">';
        html += '<th id="delete_'+rowcount+'" scope="row" class="delete_row"><img src="'+imgPath+'" alt=""></th>';
        html += '<td>';
        html += '<input type="text" data-field-name="name" name="countryname[]" id="countryname_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off">';
        html += '</td>';
        html += '<td>';
        html += '<input type="text" data-field-name="numcode" name="countryno[]" id="countryno_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off">';
        html += '</td>';
        html += '<td>';
        html += '<input type="text" data-field-name="phonecode" name="phone_code[]" id="phone_code_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off">';
        html += '</td>';
    
        html += '<td>';
        html += '<input type="text" data-field-name="iso3" name="country_code[]" id="country_code_'+rowcount+'" class="form-control autocomplete_txt" autocomplete="off">';
        html += '</td>';
        html += '</tr>';
        rowcount++;
        return html;
    }

    function addNewRow() { 
        var html = formHtml();
        //console.log(html);
        tableBody.append(html);
    }

    function deleteRow() { 
        // var  rowNo;
        // id = $(this).attr('id');
        // console.log(id);
        // idArr = id.split("_");
        // console.log(idArr);
        // rowNo = idArr[idArr.length - 1];
        // console.log(rowNo);
        // $("#row_"+rowNo).remove();

        console.log($(this).parent());
        $(this).parent().remove();
    }

    function getId(element){
        var id, idArr;
        id = element.attr('id');
        idArr = id.split("_");
        return idArr[idArr.length - 1];
    }

    function handleAutocomplete() {
        var fieldName, currentEle; 
        currentEle = $(this);
        fieldName = currentEle.data('field-name');

        if(typeof fieldName === 'undefined') {
            return false;
        }

        currentEle.autocomplete({
            source: function( data, cb ) {	 
                console.log(data);
                
                $.ajax({
                    url: basePath+'/get-countries',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        name:  data.term,
                        fieldName: fieldName
                    },
                    success: function(res){
                        var result;
                        result = [
                            {
                                label: 'There is no matching record found for '+data.term,
                                value: ''
                            }
                        ];

                        if (res.length) {
                            result = $.map(res, function(obj){
                                
                                return {
                                    label: obj[fieldName],
                                    value: obj[fieldName],
                                    data : obj
                                };
                            });
                        }
                        cb(result);
                    }
                });
            },
            autoFocus: true,	      	
            minLength: 2,
            select: function( event, selectedData ) {
                if(selectedData && selectedData.item && selectedData.item.data){
                    console.log(selectedData);
                    var rowNo, data;
                    rowNo = getId(currentEle);
                    data = selectedData.item.data;
                    $('#countryname_'+rowNo).val(data.name);
                    $('#countryno_'+rowNo).val(data.numcode);
                    $('#phone_code_'+rowNo).val(data.phonecode);
                    $('#country_code_'+rowNo).val(data.iso3);
                }
            }		      	
        });
    }

    function registerEvents() {
        addBtn.on("click", addNewRow);
        $(document).on('click', '.delete_row', deleteRow);
        //register autocomplete events
        $(document).on('focus','.autocomplete_txt', handleAutocomplete);
    }
    registerEvents();

});