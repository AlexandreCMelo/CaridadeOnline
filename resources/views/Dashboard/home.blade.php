@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <br /><br />
            <form id="togglingForm" method="post" class="form-horizontal">
                <div class="form-group">
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="company"
                               required data-fv-notempty-message="The company name is required" /> <br />


                    </div>

                    <div class="col-xs-2">
                        <button type="button" class="btn btn-success" data-toggle="#jobInfo">Search</button>
                    </div>
                </div>
            </form>




        </div>
    </div>
@endsection