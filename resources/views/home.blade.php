<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <title>Test Task</title>
    </head>
    <body>
      <div class="container p-3">
        @if ($errors->any())
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
  @endif

      <form action="{{route('countExpenses')}}" method="POST">
        @csrf
  <table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col"><b>Expense/Driver</b></th>
      <th scope="col"><b>Amount, $</b></th>
      <th scope="col"><b>Actions</b></th>
    </tr>
  </thead>
  <tbody id="add_table">
    <tr>
        <td><input class="form-control" required type="text" name="expense[]" id=""></td>
        <td><input class="form-control" required  type="number" step="0.01" name="amount[]" id=""></td>
      <td scope="col"><button id="add_btn" type="button" class="btn btn-primary">+</button></td>

    </tr>
  </tbody>
</table>
<button type="submit" class="submit btn btn-success float-right mb-3 ">Count</button>
 </form>


<div class="">
  @if(isset($driverExpensis1))
<table  class="table ">
  <thead class="thead-light">
    <tr>
     
      <th scope="col">Expense/Driver</th>
      <th scope="col">amount</th>
      <th scope="col">Driver1</th>
      <th scope="col">Driver2</th>
    </tr>
  </thead>
  <tbody>
    @foreach($driverExpensis1 as $index => $exp)
    <tr>
      <td>{{$request->expense[$index]}}</td>
      <td>{{$request->amount[$index]}}</td>
      <td>{{$exp}}</td>
      <td>{{$driverExpensis2[$index]}}</td>
    </tr>
    @endforeach
    
    <tr>
      <td><b>Total:</b></td>
      <td><b>{{$totalDrv1 + $totalDrv2}}</b></td>
      <td><b>{{$totalDrv1}}</b></td>
      <td><b>{{$totalDrv2}}</b></td>
    </tr>
    @endif
  </tbody>
</table>
  </div>
</div>

</body>

<script type="text/javascript">
    $(document).ready(function(){
        $('#add_btn').on('click', function(){
            var html = '';
            html+='<tr>';
            html+= '<td><input class="form-control" type="text" name="expense[]" id=""></td>';
            html+= '<td><input class="form-control" type="number" step="0.01" name="amount[]" id=""></td>';
            html+='<td scope="col"><button id="remove" type="button" class="btn btn-danger">-</button></td>';
            html+='</tr>';
            $('#add_table').append(html);
        })
    });

    $(document).on('click', '#remove', function(){
        $(this).closest('tr').remove();
    });
</script>

</html>

