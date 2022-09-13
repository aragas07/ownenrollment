$(document).ready(function(){
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    // code to read selected table row cell data (values).
    $(".btnSelect").click(function(){
        var rows = [];

        $('input:checked').each(function() {
            var row = $(this).parent().parent();
            
            var data = {}; 

            $(row).find("td").each(function(i,obj){
                if(i == 1){
                    data.school_id = $(this).text();
                }
                else if(i == 2){
                    data.name = $(this).text();
                }
                else if(i == 3){
                    data.course = $(this).text();
                }
            })
            rows.push(data);
            
        });
        if($('#checkAll').is(':checked')){
            rows.splice(0, 1);
        }
        
        $('#assignBody tbody').empty();
        $.each(rows, function(i, item) {
            var $tr = $('<tr>').append(
                $('<td>').text(item.school_id),
                $('<td>').text(item.name),
                $('<td>').text(item.course)
            ).appendTo('#assignBody');
        });
    });

    function loadTableData(items) {
        const table = document.getElementById("testBody");
        
        items.forEach( item => {
        let row = table.insertRow();
        let school_id = row.insertCell(0);
        school_id.innerHTML = item.school_id;
        let name = row.insertCell(1);
        name.innerHTML = item.name;
        let course = row.insertCell(1);
        course.innerHTML = item.course;
        });
    }

    $("#checkRequirements").click(function () {
        console.log('test');
    });

    
});

function updateIncoming(){
    
}

