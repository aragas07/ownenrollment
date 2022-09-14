<div hidden class="hdn-div col-lg-10 fadeInDown">
    <div class="row justify-content-between">
        <div class="col-lg-12">
            <div class="card">
                <div class="row m-0">
                    <form action="{{ route('uploadreq') }}" method="POST" enctype="multipart/form-data" class="col-12 p-0 upload-form">
                        @csrf
                        <div class="input-group" style="font-family: Arial;">
                            <span class="input-group-text fs-5">TAKE NOTE, THIS IS YOUR TICKET CODE:
                            </span>
                            <input type="text" class="form-control fs-4" id="ticketnumupload" disabled>
                        </div>
                        <div class="cols-md-12 mb-3">
                            <div class="col-md-12 mb-3">
                            </div>
                            <div class="col-12">
                                <div class="card mb-4 rounded-3 shadow-sm border-secondary">
                                    <div class="card-header py-3 text-white bg-secondary border-secondary"
                                        style="font-family: Arial;">
                                        <h1 class="card-title pricing-card-title">UPLOAD REQUIRED FILES
                                            INDICATED BELOW</h1>
                                    </div>
                                    <div class="card-body text-start">
                                        <ul class="list-unstyled mt-3 mb-4" style="padding-left: 10px;">
                                            <li class="mb-4">
                                                <div class="form-check" style="float: right;">
                                                    <button type="button" class="w-100 btn btn-md btn-outline-primary">Upload</button>
                                                    <input type="file" name="admissionProfile" hidden class="req-file">
                                                </div>
                                                <div class="form-check">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <input class="form-check-input requirements fs-4" type="checkbox" onclick="return false">
                                                            <a class="form-check-label fs-4">
                                                                Admission Profile Form
                                                            </a>
                                                        </div>
                                                        <div class="col-4"><label class="file-label"></label></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-4">
                                                <div class="form-check" style="float: right;">
                                                    <button type="button" class="w-100 btn btn-md btn-outline-primary">Upload</button>
                                                    <input type="file" name="formOne" hidden class="req-file">
                                                </div>
                                                <div class="form-check">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <input class="form-check-input requirements fs-4" type="checkbox" onclick="return false">
                                                            <a class="form-check-label fs-4">
                                                                Form 138-A with original signature of the School Principal
                                                            </a>
                                                        </div>
                                                        <div class="col-4"><label class="file-label"></label></div>
                                                    </div>
                                                    
                                                </div>
                                            </li>
                                            <li class="mb-4">
                                                <div class="form-check" style="float: right;">
                                                    <button type="button" class="w-100 btn btn-md btn-outline-primary">Upload</button>
                                                    <input type="file" name="goodMoral" hidden class="req-file">
                                                </div>
                                                <div class="form-check">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <input class="form-check-input requirements fs-4" type="checkbox" onclick="return false">
                                                            <a class="form-check-label fs-4">
                                                                Certificate of Good Moral Character
                                                            </a>
                                                        </div>
                                                        <div class="col-4"><label class="file-label"></label></div>
                                                    </div>
                                                    
                                                </div>
                                            </li>
                                            <li class="mb-4">
                                                <div class="form-check" style="float: right;">
                                                    <button type="button" class="w-100 btn btn-md btn-outline-primary">Upload</button>
                                                    <input type="file" name="psa" hidden class="req-file">
                                                </div>
                                                <div class="form-check">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <input class="form-check-input requirements fs-4" type="checkbox" onclick="return false">
                                                            <a class="form-check-label fs-4">
                                                                NSO/PSA-authenticated Birth Certificate
                                                            </a>
                                                        </div>
                                                        <div class="col-4"><label class="file-label"></label></div>
                                                    </div>
                                                    
                                                </div>
                                            </li>
                                            <li class="mb-4">
                                                <div class="form-check" style="float: right;">
                                                    <button type="button" class="w-100 btn btn-md btn-outline-primary">Upload</button>
                                                    <input type="file" name="marriage" hidden class="req-file">
                                                </div>
                                                <div class="form-check">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <input class="form-check-input requirements fs-4" type="checkbox" onclick="return false">
                                                            <a class="form-check-label fs-4">
                                                                Certificate Photocopy of Marriage Contract (for married women only)
                                                            </a>
                                                        </div>
                                                        <div class="col-4"><label class="file-label"></label></div>
                                                    </div>
                                                    
                                                </div>
                                            </li>
                                            <li class="mb-4">
                                                <div class="form-check" style="float: right;">
                                                    <button type="button" class="w-100 btn btn-md btn-outline-primary">Upload</button>
                                                    <input type="file" name="husband" hidden class="req-file">
                                                </div>
                                                <div class="form-check">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <input class="form-check-input requirements fs-4" type="checkbox" onclick="return false">
                                                            <a class="form-check-label fs-4">
                                                                NSO/PSA-authenticated Birth Certificate of Husband (for married women only)
                                                            </a>
                                                        </div>
                                                        <div class="col-4"><label class="file-label"></label></div>
                                                    </div>
                                                    
                                                </div>
                                            </li>
                                            <li class="mb-4">
                                                <div class="form-check" style="float: right;">
                                                    <button type="button" class="w-100 btn btn-md btn-outline-primary">Upload</button>
                                                    <input type="file" name="rog" hidden class="req-file">
                                                </div>
                                                <div class="form-check">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <input class="form-check-input requirements fs-4" type="checkbox" onclick="return false">
                                                            <a class="form-check-label fs-4">
                                                                Report of Grades (ROG) for the last semester attended
                                                            </a>
                                                        </div>
                                                        <div class="col-4"><label class="file-label"></label></div>
                                                    </div>
                                                    
                                                </div>
                                            </li>
                                            <li class="mb-4">
                                                <div class="form-check" style="float: right;">
                                                    <button type="button" class="w-100 btn btn-md btn-outline-primary">Upload</button>
                                                    <input type="file" name="tor" hidden class="req-file">
                                                </div>
                                                <div class="form-check">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <input class="form-check-input requirements fs-4" type="checkbox" onclick="return false">
                                                            <a class="form-check-label fs-4">
                                                                Informative Copy of the Transcript of Records (TOR)
                                                            </a>
                                                        </div>
                                                        <div class="col-4"><label class="file-label"></label></div>
                                                    </div>
                                                    
                                                </div>
                                            </li>
                                            <li class="mb-4">
                                                <div class="form-check" style="float: right;">
                                                    <button type="button" class="w-100 btn btn-md btn-outline-primary">Upload</button>
                                                    <input type="file" name="honorable" hidden class="req-file">
                                                </div>
                                                <div class="form-check">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <input class="form-check-input requirements fs-4" type="checkbox" onclick="return false">
                                                            <a class="form-check-label fs-4">
                                                                Certificate of Transfer Credential or Honorable Dismissal
                                                            </a>
                                                        </div>
                                                        <div class="col-4"><label class="file-label"></label></div>
                                                    </div>
                                                    
                                                </div>
                                            </li>
                                        </ul>
                                        <button class="w-100 btn btn-lg btn-primary btn-proceed forconfirm">Proceed</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>