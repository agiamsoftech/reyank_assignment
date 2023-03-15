<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>User Form</title>
</head>
<body>
    <form style="padding: 2% 21%;">
        @csrf
        
        <div class="form-group">
            <label for="exampleInputEmail1">Number </label>
            <input type="number" class="form-control" id="mobile" aria-describedby="emailHelp" placeholder="Enter Mobile">
        
        </div>

        <button type="button" class="btn btn-primary" onclick="clickme()">Submit</button>
      </form>
      <div class="form-group">
        <span id="demo"> <span>
        
    
    </div>
    <a href="{{ url('/')}}" class="btn btn-success" style="padding-left: 10%;">Click here to other logic</a>
    <script>
        function clickme(){
            var num = $('#mobile').val();
            
            var i;
            if(num > 0){
                // console.log($.isNumeric(num));                
                if($.isNumeric(num) == true){                    
                    var txt = '';
                    for(i=1; i <= num; i++){
                        // console.log(i);
                        txt+= i + '<br>';                                               
                    }
                    $('#demo').html(txt);
                }else{
                    console.log('please enter numeric value');
                }
            }else{
                console.log('sorry ! its 0...');
            }
        }        
    </script>
</body>
</html>