<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">

    </head>
    <body>
            <div class="content">
                <div class="raw">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Import Export System
                                </h4>
                            </div>
                            <form method="post" action="{{ route('data.import') }}" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-body">

                    <div class="form-group">
											@if(Session::has('flash_message_success'))
													<div class="alert alert-success alert-block">
													<button type="button" class="close" data-dismiss="alert">x</button>
													<strong>{!! session('flash_message_success') !!}</strong>
													</div>
												@endif
                    </div>

                    <div class="form-group">
                        <label for="file" class="col-md-3 control-label">Import</label>
                        <div class="col-md-6">
                            <input type="file" id="file" name="file" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
