@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Estimates</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Estimates</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->
     <div class="content">
      <div class="container-fluid">

      <!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    </head>
    <body>

    <form class="form-horizontal" action="" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Estimate ID:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="estimate_id" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Project name:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="project_name" required>
                                           
                                          </div>
                                        </div>

                                        <div class="container">
                                        <h3> Cost of labor </h3>
                                       <div class="card">
                                      <div class="card-body">

                                      <div class="form-group">
                                      <label class="control-label col-sm-2" for="empniclbl">Employee Type:</label>
                                      <div class="col-sm-10">
  <select class="form-control" name="project_type">
    <option value="">Select type:</option>
    <option value="Marine">Marine</option>
    <option value="Mechanical">Mechanical</option>
    <option value="Civil">Civil</option>
    <option value="Electrical">Electrical</option>
</select>


</div>
</div>

<div class="form-group">
                                      <label class="control-label col-sm-10" for="empniclbl">Internal employees:</label>
                                      <div class="col-sm-11">
<select  id="type2" name="service" class="calculate" >
<option data-price="0" value=""> Select Number </option>
<option data-price="1" value="SE">1</option>
<option data-price="2" value="SE">2</option>
<option data-price="3" value="SE">3</option>
<option data-price="4" value="SE">4</option>
<option data-price="5" value="SE">5</option>
<option data-price="6" value="SE">6</option>
<option data-price="7" value="SE">7</option>
<option data-price="8" value="SE">8</option>
<option data-price="9" value="SE">9</option>
<option data-price="10" value="SE">10</option>
<option data-price="11" value="SE">11</option>
<option data-price="12" value="SE">12</option>
<option data-price="13" value="SE">13</option>
<option data-price="14" value="SE">14</option>
<option data-price="15" value="SE">15</option>
<option data-price="16" value="SE">16</option>
<option data-price="17" value="SE">17</option>
<option data-price="18" value="SE">18</option>
<option data-price="19" value="SE">19</option>
<option data-price="20" value="SE">20</option>
</select> 


<input type="checkbox"  class="calculate" data-price="300" name="employee" value="Senior Engineer"> Senior Engineer
<input type="checkbox"  class="calculate" data-price="200" name="employee" value="Junior Engineer"> Junior Engineer
<input type="checkbox"  class="calculate" data-price="300" name="employee" value="Project Supervisor"> Project Supervisor
<input type="checkbox"  class="calculate" data-price="300" name="employee" value="Foreman"> Foreman
<input type="checkbox"  class="calculate" data-price="300" name="employee" value="Helper"> Helper
<input type="checkbox"  class="calculate" data-price="300" name="employee" value="Multi-skilled laborers"> Multi-skilled laborers
<br>
Total labor cost: $ 
<span id="item-price">  </span>

<script>
$(function(){

// You need to run the function when the select gets changed but also when the
// checkboxes get clicked. Now, you could use a simple selector to get references
// to all the elements in question here, but this could cause other elements that 
// are not related to this operation to be erroneously included. It's better to 
// be specific with selectors so that the code can scale.
// Also, modern JQuery recommends the use of the "on" method for event binding.
$("select.calculate").on("change", calc);
$("input[type=checkbox].calculate").on("click", calc);

function calc() {
 var basePrice = 0;
  newPrice = basePrice;
  // You need to loop over, not only the selected option, but also the checked checboxes
  $("select.calculate option:selected, input[type=checkbox].calculate:checked").each(function () {
    newPrice += ($(this).data('price'));
    
  });

  newPrice = newPrice.toFixed(2);
  $("#item-price").html(newPrice);
}
});
</script>

                                      <!--fieldset>
    <div id="employees">&nbsp&nbsp&nbsp Employees: 
        <label><input type="checkbox" name="SE" value="6000"/> Senior Engineer </label> &nbsp
        <label><input type="checkbox" name="JE" value="5000" /> Junior Engineer</label> &nbsp
        <label><input type="checkbox" name="PS" value="4500" /> Project supervisor</label> &nbsp
        <label><input type="checkbox" name="foreman" value="3000" /> Foreman </label> &nbsp
        <label><input type="checkbox" name="helper" value="2000" /> Helper </label> &nbsp
        <label><input type="checkbox" name="multi_skilled" value="3000" /> Multi skilled laborers </label> &nbsp
    </div>

    <div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label><input type="checkbox" name="other" onchange="enableText(this)"/> Other </label>
    <script>
    function enableText(checkBox) {
    if (checkBox.nextSibling.tagName != 'INPUT') {
        var input = document.createElement('input');
        input.type = "text";
        checkBox.parentNode.insertBefore(input, checkBox.nextSibling);
    }
}
</script>
    </div>
    
    <br>
    <p>
        <label>&nbsp&nbspTotal labor cost: $ <input type="text" name="total_labor" class="num" size="6" value="0.00" readonly="readonly" /></label>
    </p>
    </fieldset>

    <script>
    function attachCheckboxHandlers() {
    // get reference to element containing toppings checkboxes
    var el = document.getElementById('employees');

    // get reference to input elements in toppings container element
    var tops = el.getElementsByTagName('input');
    
    // assign updateTotal function to onclick property of each checkbox
    for (var i=0, len=tops.length; i<len; i++) {
        if ( tops[i].type === 'checkbox' ) {
            tops[i].onclick = updateTotal;
        }
    }
}
    
// called onclick of toppings checkboxes
function updateTotal(e) {
    // 'this' is reference to checkbox clicked on
    var form = this.form;
    
    // get current value in total text box, using parseFloat since it is a string
    var val = parseFloat( form.elements['total_labor'].value );
    
    // if check box is checked, add its value to val, otherwise subtract it
    if ( this.checked ) {
        val += parseFloat(this.value);
    } else {
        val -= parseFloat(this.value);
    }
    
    // format val with correct number of decimal places
    // and use it to update value of total text box
    form.elements['total_labor'].value = formatDecimal(val);
}
    
// format val to n number of decimal places
// modified version of Danny Goodman's (JS Bible)
function formatDecimal(val, n) {
    n = n || 2;
    var str = "" + Math.round ( parseFloat(val) * Math.pow(10, n) );
    while (str.length <= n) {
        str = "0" + str;
    }
    var pt = str.length - n;
    return str.slice(0,pt) + "." + str.slice(pt);
}

// in script segment below form
attachCheckboxHandlers();
</script-->

                                        <div class="form-group">
                                          <label class="control-label col-sm-10" for="empniclbl">No. of days worked by internal workers</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="internal_days_per_worker" name="internal_days_per_worker" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                      <label class="control-label col-sm-10" for="empniclbl">External employees:</label>
                                      <div class="col-sm-11">
<select  id="type2" name="service" class="calculate_2" >
<option data-price="0" value=""> Select Number </option>
<option data-price="1" value="SE">1</option>
<option data-price="2" value="SE">2</option>
<option data-price="3" value="SE">3</option>
<option data-price="4" value="SE">4</option>
<option data-price="5" value="SE">5</option>
<option data-price="6" value="SE">6</option>
<option data-price="7" value="SE">7</option>
<option data-price="8" value="SE">8</option>
<option data-price="9" value="SE">9</option>
<option data-price="10" value="SE">10</option>
<option data-price="11" value="SE">11</option>
<option data-price="12" value="SE">12</option>
<option data-price="13" value="SE">13</option>
<option data-price="14" value="SE">14</option>
<option data-price="15" value="SE">15</option>
<option data-price="16" value="SE">16</option>
<option data-price="17" value="SE">17</option>
<option data-price="18" value="SE">18</option>
<option data-price="19" value="SE">19</option>
<option data-price="20" value="SE">20</option>
</select> 


<input type="checkbox"  class="calculate_2" data-price="300" name="employee" value="Senior Engineer"> Senior Engineer
<input type="checkbox"  class="calculate" data-price="200" name="employee" value="Junior Engineer"> Junior Engineer
<input type="checkbox"  class="calculate" data-price="300" name="employee" value="Project Supervisor"> Project Supervisor
<input type="checkbox"  class="calculate" data-price="300" name="employee" value="Foreman"> Foreman
<input type="checkbox"  class="calculate" data-price="300" name="employee" value="Helper"> Helper
<input type="checkbox"  class="calculate" data-price="300" name="employee" value="Multi-skilled laborers"> Multi-skilled laborers
<br>
Total labor cost: $ 
<span id="item-price-2">  </span>

<script>
$(function(){

// You need to run the function when the select gets changed but also when the
// checkboxes get clicked. Now, you could use a simple selector to get references
// to all the elements in question here, but this could cause other elements that 
// are not related to this operation to be erroneously included. It's better to 
// be specific with selectors so that the code can scale.
// Also, modern JQuery recommends the use of the "on" method for event binding.
$("select.calculate_2").on("change", calc);
$("input[type=checkbox].calculate_2").on("click", calc);

function calc() {
 var basePrice = 0;
  newPrice = basePrice;
  // You need to loop over, not only the selected option, but also the checked checboxes
  $("select.calculate_2 option:selected, input[type=checkbox].calculate_2:checked").each(function () {
    newPrice += ($(this).data('price'));
    
  });

  newPrice = newPrice.toFixed(2);
  $("#item-price-2").html(newPrice);
}
});
</script>

                                        <div class="form-group">
                                          <label class="control-label col-sm-10" for="empniclbl">No. of days worked by external workers</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="external_days_per_worker" name="external_days_per_worker">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-10" for="empniclbl">Total cost for workers</label>
                                          <input readonly id="total_cost" name="total_cost" value="">

                                          <div class="col-sm-10">
                                          <input type="button" onclick="laborCalc()" value="Total cost">

                                            <script>
                                          laborCalc = function(){

                                           var internal_no_of_workers = Number(document.getElementById("internal_no_of_workers").value);
                                           var internal_cost_per_worker = Number(document.getElementById("internal_cost_per_worker").value);
                                           var internal_hours_per_day_per_worker = Number(document.getElementById("internal_hours_per_day_per_worker").value);
                                           var internal_days_per_worker = Number(document.getElementById("internal_days_per_worker").value); 

                                           var external_no_of_workers = Number(document.getElementById("external_no_of_workers").value); 
                                           var external_cost_per_worker = Number(document.getElementById("external_cost_per_worker").value); 
                                           var external_hours_per_day_per_worker = Number(document.getElementById("external_hours_per_day_per_worker").value); 
                                           var external_days_per_worker = Number(document.getElementById("external_days_per_worker").value); 

                                           var laborCost = ((internal_no_of_workers * internal_cost_per_worker * internal_hours_per_day_per_worker * internal_days_per_worker) + (external_no_of_workers * external_cost_per_worker * external_hours_per_day_per_worker * external_days_per_worker ))
                                           document.getElementById("total_cost").value = laborCost.toFixed(2);
                                         }
                                         </script>
 
                                           
                                          </div>
                                        </div>
                                      
                                      </div>
                                      </div>
                                      </div>

                                      

                                      <div class="container">
                                        <h3> Cost of machines </h3>
                                       <div class="card">
                                      <div class="card-body">


                                       <fieldset>
    <div id="machines">Machines: 
        <label><input type="checkbox" name="Backhoe_01" value="6500"/> Backhoe 01</label> &nbsp
        <label><input type="checkbox" name="Backhoe_02" value="6500" /> Backhoe 02</label> &nbsp
        <label><input type="checkbox" name="Whacker_01" value="5500" /> Whacker 01</label> &nbsp
        <label><input type="checkbox" name="Whacker_02" value="5500" /> Whacker 02</label> &nbsp
        <label><input type="checkbox" name="Whacker_03" value="5500" /> Whacker 03</label> &nbsp
        <label><input type="checkbox" name="Welding_01" value="4500" /> Welding machine 01</label> &nbsp
        <label><input type="checkbox" name="Welding_02" value="4500" /> Welding machine 02</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <label><input type="checkbox" name="Welding_03" value="4500" /> Welding machine 03</label>
        <label><input type="checkbox" name="Welding_04" value="4500" /> Welding machine 04</label>
        <label><input type="checkbox" name="Welding_05" value="4500" /> Welding machine 05</label>
        <label><input type="checkbox" name="Welding_06" value="4500" /> Welding machine 06</label>
    </div>

    <div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label><input type="checkbox" name="other" onchange="enableText(this)"/> Other </label>
    <script>
    function enableText(checkBox) {
    if (checkBox.nextSibling.tagName != 'INPUT') {
        var input = document.createElement('input');
        input.type = "text";
        checkBox.parentNode.insertBefore(input, checkBox.nextSibling);
    }
}
</script>
    </div>
    
    <br>
    <p>
        <label>Total Cost: $ <input type="text" name="total" class="num" size="6" value="0.00" readonly="readonly" /></label>
    </p>
    </fieldset>

    <script>
    function attachCheckboxHandlers() {
    // get reference to element containing toppings checkboxes
    var el = document.getElementById('machines');

    // get reference to input elements in toppings container element
    var tops = el.getElementsByTagName('input');
    
    // assign updateTotal function to onclick property of each checkbox
    for (var i=0, len=tops.length; i<len; i++) {
        if ( tops[i].type === 'checkbox' ) {
            tops[i].onclick = updateTotal;
        }
    }
}
    
// called onclick of toppings checkboxes
function updateTotal(e) {
    // 'this' is reference to checkbox clicked on
    var form = this.form;
    
    // get current value in total text box, using parseFloat since it is a string
    var val = parseFloat( form.elements['total'].value );
    
    // if check box is checked, add its value to val, otherwise subtract it
    if ( this.checked ) {
        val += parseFloat(this.value);
    } else {
        val -= parseFloat(this.value);
    }
    
    // format val with correct number of decimal places
    // and use it to update value of total text box
    form.elements['total'].value = formatDecimal(val);
}
    
// format val to n number of decimal places
// modified version of Danny Goodman's (JS Bible)
function formatDecimal(val, n) {
    n = n || 2;
    var str = "" + Math.round ( parseFloat(val) * Math.pow(10, n) );
    while (str.length <= n) {
        str = "0" + str;
    }
    var pt = str.length - n;
    return str.slice(0,pt) + "." + str.slice(pt);
}

// in script segment below form
attachCheckboxHandlers();
</script>
                                          

                                        

                                        <div class="form-group">
                                          <label class="control-label col-sm-10" for="empniclbl">No. of hours worked by internal machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="internal_hours_per_day_per_machine">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">No. of days worked by internal machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="internal_days_per_machine">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total cost per internal machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="total_cost_internal_machine" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Number of external machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="external_no_of_machines" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Cost per external machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="external_cost_per_machine_hour" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">No. of hours worked by external machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="external_hours_per_day_per_machine" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">No. of days worked by external machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="external_days_per_machine" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total cost per external machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="total_cost_external_machine" required>
                                           
                                          </div>
                                        </div>

                                      </div>
                                      </div>
                                      </div>

                                      <div class="container">
                                        <h3> Total cost calculation </h3>
                                       <div class="card">
                                      <div class="card-body">

                                      <!-- tot machine and variable cost!-->
                                      <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total variable cost</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="variable_cost" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Overhead rate</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="overhead_rate" required>
                                           
                                          </div>
                                        </div>
                                        
                                        <!-- tot variable cost into oH rate !-->
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Variable overhead cost</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="variable_overhead_cost" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">NBT rate</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nbt_rate" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Variable cost and NBT</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="variable_cost_plus_nbt" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">VAT rate</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="vat_rate" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total cost</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="total_cost" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Profit</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="profit_rate" required>
                                           
                                          </div>
                                        </div>
                                      </div>
                                      </div>
                                      </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total cost charged from customer:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="cost_charged_from_customer" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-info" value="Save">
                                            <input class="btn btn-secondary float-right" type="reset" value="Reset">
                                            </div>
                                        
                                          

                                        
               
                                      
</div>
</div>
    @endsection