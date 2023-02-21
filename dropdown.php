
<!DOCTYPE html>
<html>
 <head>
  <title>Dropdown List using Jquery and Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 
 </head>
 <body style="background-color: #c9fdff">
  <br /><br />
  <div class="container" style="width:600px; align:left">
  <h2> District Selection Dropdown List (php)</h2>
<label> District </label>
   <select name="District" id="District" class="form-control input-lg">
    <option value="">Select District</option>
   </select>
   <label> Taluk</label>
   <select name="Taluk" id="Taluk" class="form-control input-lg">
    <option value="">Select Taluk</option>
   </select>
   <br>
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 load_json_data('District');

 function load_json_data(id, parent_id)
 {
  var html_code = '';
  $.getJSON('dropdown.json', function(data){

   html_code += '<option value="">Select '+id+'</option>';
   $.each(data, function(key, value){
    if(id == 'District')
    {
     if(value.parent_id == '0')
     {
      html_code += '<option value="'+value.id+'">'+value.name+'</option>';
     }
    }
    else 
    {
     if(value.parent_id == parent_id)
     {
      html_code += '<option value="'+value.id+'">'+value.name+'</option>';
     }
    }
   });
   $('#'+id).html(html_code);
  });

 }

 $(document).on('change', '#District', function(){
  var District_id = $(this).val();
  if(District_id != '')
  {
   load_json_data('Taluk', District_id);
  }
  else
  {
   $('#Taluk').html('<option value="">Select Taluk</option>');
  }
 });
});
</script>