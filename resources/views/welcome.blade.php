<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-8">
                <h1>Select Server</h1>
                {!! Form:: open(['url'=>'/form-submit'],array('class'=>'form-inline')) !!}
                <div class="form-group" >
                    {!! Form::label('select', 'Select Your Server')!!}
                        <select name="select_server" class="form-control">
                            @foreach($result as $key=>$value)
                                @foreach($value as $key=>$value1)
                                    <option value="{{$value1}}">{{$value1}}</option>
                                @endforeach
                            @endforeach
                        </select>
                </div>
                    <div class="form-group">
                        {!! Form::submit('submit', array('class'=>'btn btn-primary','id'=>'sbtn')) !!}
                    </div>
                {!! Form::close() !!}      
            </div>
        </div>

    </div>
    </body>
</html>
