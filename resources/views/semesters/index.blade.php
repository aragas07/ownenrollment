@extends('layouts.app', ['activePage' => 'manage-semester', 'title' => 'Enrollment Pre-registration Module', 'navName' => 'Semester Management', 'activeButton' => 'semesters'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Semesters List</h4>
                        <p class="card-category">{{ __('Lists of semesters') }}</p>
                        <button type="button" class="btn btn-primary float-right" style="margin-top: -3.5em ;" data-toggle="modal" data-target="#exampleModalCenter">
                            Open Semester
                        </button>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>School Year</th>
                                <th>Semester</th>
                                <th>Opened at</th>
                                <th>Opened by</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($semesters as $semester)
                                    <tr>
                                        <td>{{ $semester->school_year }}</td>
                                        <td>{{ $semester->semester }}</td>
                                        <td>{{ $semester->created_at }}</td>
                                        <td>{{ $semester->email }}</td>
                                        <td>{{ $semester->closed_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Open Semester</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="/semesters" method="post">
            <div class="modal-body">
                @csrf
                <div class="form-row mb-3">
                    <div class="col-sm-12">
                        <label for="schoolYear">School Year</label>
                        <select class="form-select form-control" aria-label="semester" id="school_year" name="school_year">
                            <option selected>Choose---</option>
                            @for($i = -1; $i < 3; $i++)
                            <option value="{{ date('Y') + $i }}-{{ date('Y') + $i + 1 }}">{{ date('Y') + $i }}-{{ date('Y') + $i + 1 }}</option>
                            @endfor
                        </select> 
                    </div>
                    <div class="col-sm-12">
                        <label for="semester">School Semester</label>
                        <select class="form-select form-control" aria-label="semester" id="semester" name="semester">
                            <option selected>Choose---</option>
                            <option value="First Semester">First Semester</option>
                            <option value="Second Semester">Second Semester</option>
                            <option value="Summer Semester">Summer Semester</option>
                            <option value="Late Semester">Late Semester</option>
                        </select>  
                    </div>
                </div>
            </div>
        </form> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      </form> 
    </div>
  </div>
</div>
@endsection