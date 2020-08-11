@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{$quotation == true ? 'Add Quotation' : 'Calculate Estimation'}}</h1>
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

    <form class="form-horizontal" action="{{route('admin.estimates.store')}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="hidden" name="type" value="{{$quotation == true ? 'quotation' : 'estimation'}}">

      @if($labor)
      <h3> Cost of labor </h3>
      <div class="form-group">
        <label class="control-label col-sm-2" for="projecttypetxt"> Employee type: </label>
        <div class="col-sm-10">
          <select class="form-control" name="employee_type" required onchange="calc()" onkeyup="calc()">
            <option value="" disabled selected> Choose your option </option>
            @foreach($emp_types as $t)
            <option value="{{$t->id}}"> {{$t->project_type_name}} </option>
            @endforeach
          </select>
        </div>
      </div>

      <h4>Internal Labors</h4>
      <div class="form-group">
        <div class="form-row mt-4">
          <div class="col-md-3 text-center">
            <label class="control-label" for="empniclbl">Employee Category</label>
          </div>
          <div class="col-md-4 text-center">
            <label class="control-label" for="empniclbl">Number of workers</label>
          </div>
          <div class="col-md-4 text-center">
            <label class="control-label" for="empniclbl">Charge (Rs.)</label>
          </div>
        </div>
  
        @foreach($emp_cats as $e)
        <div class="form-row mb-2">
          <div class="col-md-3">
            {{$e->employee_category}}
          </div>
          <div class="col-md-4">
            <input type="number" class="form-control" min="0" id="int_count_{{$e->id}}" value="0" onchange="calc()" onkeyup="calc()" name="int_count_{{$e->id}}">
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" id="int_charge_{{$e->id}}" value="2000" onchange="calc()" onkeyup="calc()" name="int_charge_{{$e->id}}">
          </div>
        </div>
        @endforeach
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">Internal labor cost (Rs.)</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control" id="int_labor_cost" name="int_labor_cost">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">No. of days worked by internal workers:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="int_work_days" onchange="calc()" onkeyup="calc()" name="int_work_days" value="0" required>
        </div>
      </div>

      <h4>External Labors</h4>
      <div class="form-group">
        <div class="form-row mt-4">
          <div class="col-md-3 text-center">
            <label class="control-label" for="empniclbl">Employee Category</label>
          </div>
          <div class="col-md-4 text-center">
            <label class="control-label" for="empniclbl">Number of workers</label>
          </div>
          <div class="col-md-4 text-center">
            <label class="control-label" for="empniclbl">Charge (Rs.)</label>
          </div>
        </div>
  
        @foreach($emp_cats as $e)
        <div class="form-row mb-2">
          <div class="col-md-3">
            {{$e->employee_category}}
          </div>
          <div class="col-md-4">
            <input type="number" class="form-control" min="0" id="ext_count_{{$e->id}}" onchange="calc()" onkeyup="calc()" value="0" name="ext_count_{{$e->id}}">
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" id="ext_charge_{{$e->id}}" onchange="calc()" onkeyup="calc()" value="2200" name="ext_charge_{{$e->id}}">
          </div>
        </div>
        @endforeach
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">External labor cost (Rs.)</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control" id="ext_labor_cost" name="ext_labor_cost">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">No. of days worked by external workers:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" onchange="calc()" onkeyup="calc()" id="ext_work_days" name="ext_work_days" value="0" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">Total cost of labors (Rs.)</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control" id="total_cost_of_labors">
        </div>
      </div>
      @endif




      @if($machine)
      <h3> Cost of machines </h3>

      <div class="form-group">
        <div class="form-row mt-4">
          <div class="col-md-3 text-center">
            <label class="control-label" for="empniclbl">Machine Category</label>
          </div>
          <div class="col-md-4 text-center">
            <label class="control-label" for="empniclbl">Number of machines</label>
          </div>
          <div class="col-md-4 text-center">
            <label class="control-label" for="empniclbl">Charge (Rs.)</label>
          </div>
        </div>
  
        @foreach($machine_types as $m)
        <div class="form-row mb-2">
          <div class="col-md-3">
            {{$m->machine_type_name}}
          </div>
          <div class="col-md-4">
            <input type="number" class="form-control" min="0" id="machine_count_{{$m->id}}" onchange="calc()" onkeyup="calc()" value="0" name="machine_count_{{$m->id}}">
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" id="machine_charge_{{$m->id}}" onchange="calc()" onkeyup="calc()" value="2200" name="machine_charge_{{$m->id}}">
          </div>
        </div>
        @endforeach
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">Machine cost (Rs.)</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control" id="machine_cost" name="machine_cost">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">No. of days machine used:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="0" onchange="calc()" onkeyup="calc()" id="machine_work_days" name="machine_work_days" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">Total cost of machines (Rs.)</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control" id="total_cost_of_machines">
        </div>
      </div>
      @endif

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">Total variable cost (Rs.)</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control" name="variable_cost" id="variable_cost">

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">Overhead rate (%)</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" onchange="calc()" onkeyup="calc()" id="overhead_rate" name="overhead_rate" value="20" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">Variable overhead cost (Rs.)</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" readonly id="variable_overhead_cost" name="variable_overhead_cost" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">NBT rate(%)</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" onchange="calc()" onkeyup="calc()" id="nbt_rate" name="nbt_rate" value="12" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">Variable cost and NBT (Rs.)</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" readonly id="variable_cost_plus_nbt" name="variable_cost_plus_nbt" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">VAT rate(%)</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" onchange="calc()" onkeyup="calc()" id="vat_rate" name="vat_rate" value="24" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">Total cost (Rs.)</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" readonly id="total_cost" name="total_cost" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">Profit(%)</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" onchange="calc()" onkeyup="calc()" id="profit" name="profit" value="15" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">Total cost charged from customer (Rs.):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" readonly id="cost_charged_from_customer" name="cost_charged_from_customer" required>

        </div>
      </div>

      <div class="form-group">
        @if($quotation == true)
          <input type="submit" class="btn btn-info" value="{{ $quotation == true ? 'Save' : 'Back' }}">
          <input class="btn btn-secondary float-right" type="reset" value="Reset">
        @else
          <a href="{{url('/admin')}}" class="btn btn-info">Back</a>
        @endif
      </div>
  </div>
</div>
@if($labor && $machine)
<script>
  function calc(){
    var int_labor_cost = 0;
    var ext_labor_cost = 0;
    var machine_cost = 0;
    for(var i=0;i<7;i++){
      int_labor_cost += (document.getElementById('int_count_'+(i+1)).value * document.getElementById('int_charge_'+(i+1)).value);
      ext_labor_cost += (document.getElementById('ext_count_'+(i+1)).value * document.getElementById('ext_charge_'+(i+1)).value);
    }
    for(var i=0;i<4;i++){
      machine_cost += (document.getElementById('machine_count_'+(i+1)).value * document.getElementById('machine_charge_'+(i+1)).value);
    }

    var total_cost_of_labors = document.getElementById('int_work_days').value * int_labor_cost + document.getElementById('ext_work_days').value * ext_labor_cost;
    var total_cost_of_machines = document.getElementById('machine_work_days').value * machine_cost;
    var variable_cost = total_cost_of_labors + total_cost_of_machines;
    var variable_overhead_cost = variable_cost * ((document.getElementById('overhead_rate').value/100)+1);
    var variable_cost_plus_nbt = variable_overhead_cost * ((document.getElementById('nbt_rate').value/100)+1);
    var total_cost = variable_cost_plus_nbt * ((document.getElementById('vat_rate').value/100)+1);
    var cost_charged_from_customer = total_cost * ((document.getElementById('profit').value/100)+1);

    document.getElementById('int_labor_cost').value = int_labor_cost.toFixed(2);
    document.getElementById('ext_labor_cost').value = ext_labor_cost.toFixed(2);
    document.getElementById('total_cost_of_labors').value = total_cost_of_labors.toFixed(2);
    document.getElementById('machine_cost').value = machine_cost.toFixed(2);
    document.getElementById('total_cost_of_machines').value = total_cost_of_machines.toFixed(2);
    document.getElementById('variable_cost').value = variable_cost.toFixed(2);
    document.getElementById('variable_overhead_cost').value = variable_overhead_cost.toFixed(2);
    document.getElementById('variable_cost_plus_nbt').value = variable_cost_plus_nbt.toFixed(2);
    document.getElementById('total_cost').value = total_cost.toFixed(2);
    document.getElementById('cost_charged_from_customer').value = cost_charged_from_customer.toFixed(2);
  }
</script>
@elseif(!$labor && $machine)
<script>
  function calc(){
    var machine_cost = 0;
    for(var i=0;i<4;i++){
      machine_cost += (document.getElementById('machine_count_'+(i+1)).value * document.getElementById('machine_charge_'+(i+1)).value);
    }

    var total_cost_of_machines = document.getElementById('machine_work_days').value * machine_cost;
    var variable_cost = total_cost_of_machines;
    var variable_overhead_cost = variable_cost * ((document.getElementById('overhead_rate').value/100)+1);
    var variable_cost_plus_nbt = variable_overhead_cost * ((document.getElementById('nbt_rate').value/100)+1);
    var total_cost = variable_cost_plus_nbt * ((document.getElementById('vat_rate').value/100)+1);
    var cost_charged_from_customer = total_cost * ((document.getElementById('profit').value/100)+1);

    document.getElementById('machine_cost').value = machine_cost.toFixed(2);
    document.getElementById('total_cost_of_machines').value = total_cost_of_machines.toFixed(2);
    document.getElementById('variable_cost').value = variable_cost.toFixed(2);
    document.getElementById('variable_overhead_cost').value = variable_overhead_cost.toFixed(2);
    document.getElementById('variable_cost_plus_nbt').value = variable_cost_plus_nbt.toFixed(2);
    document.getElementById('total_cost').value = total_cost.toFixed(2);
    document.getElementById('cost_charged_from_customer').value = cost_charged_from_customer.toFixed(2);
  }
</script>
@elseif($labor && !$machine)
<script>
  function calc(){
    var int_labor_cost = 0;
    var ext_labor_cost = 0;
    for(var i=0;i<7;i++){
      int_labor_cost += (document.getElementById('int_count_'+(i+1)).value * document.getElementById('int_charge_'+(i+1)).value);
      ext_labor_cost += (document.getElementById('ext_count_'+(i+1)).value * document.getElementById('ext_charge_'+(i+1)).value);
    }

    var total_cost_of_labors = document.getElementById('int_work_days').value * int_labor_cost + document.getElementById('ext_work_days').value * ext_labor_cost;
    var variable_cost = total_cost_of_labors;
    var variable_overhead_cost = variable_cost * ((document.getElementById('overhead_rate').value/100)+1);
    var variable_cost_plus_nbt = variable_overhead_cost * ((document.getElementById('nbt_rate').value/100)+1);
    var total_cost = variable_cost_plus_nbt * ((document.getElementById('vat_rate').value/100)+1);
    var cost_charged_from_customer = total_cost * ((document.getElementById('profit').value/100)+1);

    document.getElementById('int_labor_cost').value = int_labor_cost.toFixed(2);
    document.getElementById('ext_labor_cost').value = ext_labor_cost.toFixed(2);
    document.getElementById('total_cost_of_labors').value = total_cost_of_labors.toFixed(2);
    document.getElementById('variable_cost').value = variable_cost.toFixed(2);
    document.getElementById('variable_overhead_cost').value = variable_overhead_cost.toFixed(2);
    document.getElementById('variable_cost_plus_nbt').value = variable_cost_plus_nbt.toFixed(2);
    document.getElementById('total_cost').value = total_cost.toFixed(2);
    document.getElementById('cost_charged_from_customer').value = cost_charged_from_customer.toFixed(2);
  }
</script>
@endif
@endsection