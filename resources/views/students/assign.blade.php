@extends('layouts.app', ['activePage' => 'assign', 'title' => 'Assign School ID - DOrSU', 'navName' => 'Asign School ID', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Accepted Students List</h4>
                            <button type="button" class="btn btn-primary float-right btnSelect" style="margin-top: -2em;" data-toggle="modal" data-target="#exampleModal">
                                Assign School ID
                            </button>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped" id="incomingStudents">
                                <thead>
                                    <th><input type="checkbox" id="checkAll"><span class="dropdown-toggle pl-1" data-toggle="dropdown"></span></th>
                                    <th>Tracking Number</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Campus</th>
                                </thead>
                                <tbody>
                                    @foreach ($assign_students as $assign_student)
                                        <tr class="tablerow">
                                            <td><input type="checkbox" name="" class="chbox" value="{{$assign_student->id}}"></td>
                                            <td>{{ $assign_student->transaction_number }}</td>
                                            <td class="stud-name td-name">{{ $assign_student->first_name }} {{ $assign_student->middle_name }} {{ $assign_student->last_name }}</td>
                                            <td>{{ $assign_student->course_1 }}</td>
                                            <td>{{ $assign_student->campus }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex float-right pr-4">
                                {{ $assign_students->appends(['sort' => 'assign_students'])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            //for select all checkbox
            $("#checkAll").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            // code to read selected table row cell data (values).
            $(".btnSelect").click(function(event){
                event.preventDefault();

                var rows = [];

                //check if checkbox for specific row is checked and if yes add it on the array row.
                $('input:checked').each(function() {
                    var row = $(this).parent().parent();
                    
                    var data = {}; 

                    $(row).find("td").each(function(i, obj){
                        if(i == 0){
                            data.id = $(this).find(".chbox").val();
                        } else if (i == 2) {
                            data.name = $(this).text();
                        }
                    });
                    rows.push(data);
                    
                    if($('#checkAll').is(':checked')){
                        rows.splice(0, 1);
                    }

                    let id = data.id;
                    let _token   = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: "/updateSchoolID",
                        type:"POST",
                        data:{
                        id: id,
                        _token: _token
                        },
                        success:function(response){
                            
                            alert('Successfully added School Identification number to '+ data.name +'.')
                            location.reload();
                        },
                        error: function(error) {
                            console.log(error);
                            alert('Error.');
                        }
                    });
                });
            });
        });
    </script>
@endsection