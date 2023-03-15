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
    <form action="{{ route('save_data')}}" method="post" style="padding: 2% 21%;">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name </label>
          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter Name">
          
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email </label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mobile </label>
            <input type="number" class="form-control" name="mobile" aria-describedby="emailHelp" placeholder="Enter Mobile">
        
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Country </label>
            <select name="country" id="country" class="form-control" onchange="getstate()">
                @foreach($country as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>        
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">State </label>
            <select name="state" id="state" class="form-control" onchange="getcity()">
                <option value="">Select State</option>
            </select>
        
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">City </label>
            <select name="city" id="city" class="form-control">
                <option value="">Select City</option>
            </select>
        
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      <a href="{{ route('welcome1')}}" class="btn btn-success" style="padding-left: 10%;">Click here to other logic</a>
    <script>
        function getstate(){
            var country = $('#country').val();
            $.get('{{ route("get_state_by_countryid")}}' + '/' + country, function(data){
                var n=0;
                var option = '';
                while(n<data.length){
                    option+='<option value="'+data[n]['id']+'">'+data[n]['name']+'</option>';
                    n=n+1;
                }
                $('#state').html(option);
                getcity();

            });
        }
        function getcity(){
            var state = $('#state').val();
            $.get('{{ route("get_state_by_stateid")}}' + '/' + state, function(data){
                var n=0;
                var option = '';
                while(n<data.length){
                    option+='<option value="'+data[n]['id']+'">'+data[n]['name']+'</option>';
                    n=n+1;
                }
                $('#city').html(option);

            });
        }
        
    </script>
</body>
</html>