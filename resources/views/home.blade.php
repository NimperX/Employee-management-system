@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    {{-- <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <!--h3 class="card-title">Projects</h3>
                  <a href="javascript:void(0);">View Report</a-->
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">20</span>
                    <span>Projects</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 
                    </span>
                    <span class="text-muted"></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div> --}}
    <div class="row">
      <div class="col-md-6 col-lg-6 col-xl-6">
        <!-- Project count -->
        <div class="card status">
          <div class="icon-container">
            <div class="icon">
              <ion-icon name="briefcase"></ion-icon>
            </div>
          </div>
          <div class="text-left details"><span class="h5">Projects</span><br>count</div>
          <div class="text-right count">{{$projects->count()}}</div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="card status">
          <div class="icon-container">
            <div class="icon">
              <ion-icon name="people"></ion-icon>
            </div>
          </div>
          <div class="text-left details"><span class="h5">Employees</span><br>count</div>
          <div class="text-right count">{{$employees->count()}}</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="card status">
          <div class="icon-container">
            <div class="icon">
              <ion-icon name="people"></ion-icon>
            </div>
          </div>
          <div class="text-left details"><span class="h5">Labor</span><br>count</div>
          <div class="text-right count">{{$labors->count()}}</div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="card status">
          <div class="icon-container">
            <div class="icon">
              <ion-icon name="person-add"></ion-icon>
            </div>
          </div>
          <div class="text-left details"><span class="h5">Supplier</span><br>count</div>
          <div class="text-right count">{{$suppliers->count()}}</div>
        </div>
      </div>
      <div class="col-md-12 col-lg-12 col-xl-4">
        <div class="card status">
          <div class="icon-container">
            <div class="icon">
              <ion-icon name="cog"></ion-icon>
            </div>
          </div>
          <div class="text-left details"><span class="h5">Machine</span><br>count</div>
          <div class="text-right count">{{$machines->count()}}</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7">
        <div class="card detail">
          <h2 class="h2">Recent Projects</h2>
          <table class="table">
            <tr>
              <th>#</th>
              <th>Project name</th>
              <th>Location</th>
              <th>Customer</th>
              <th>Contact details</th>
            </tr>
            @php
                $i=0;
            @endphp
            @foreach($projects as $p)
              @php
                  $i++;
              @endphp
              <tr>
                <td>{{$i}}</td>
                <td>{{$p->project_name}}</td>
                <td>{{$p->project_location}}</td>
                <td>
                  <b>{{$p->customer->company_name}}</b><br>
                  {{$p->customer->name_of_contact_person}}
                </td>
                <td>
                  {{$p->customer->contact_number}}<br>
                  {{$p->customer->email}}
                </td>
              </tr>
              @if($i>=5)
                @break
              @endif
            @endforeach
          </table>
          <!-- only upto five projects are displayed-->
        </div>
      </div>
      <div class="col-md-5">
        <div class="card detail">
          <h2 class="h2">Recent Supplier</h2>
          <table class="table">
            <tr>
              <th>#</th>
              <th>Supplier</th>
              <th>Contact details</th>
              <th>No. of labors provided</th>
            </tr>
            @php
                $i=0;
            @endphp
            @foreach($suppliers as $s)
              @php
                  $i++;
              @endphp
              <tr>
                <td>{{$i}}</td>
                <td>{{$s->supplier_company_name}}</td>
                <td>
                  {{$s->supplier_contact_number}}<br>
                  {{$s->supplier_email}}
                </td>
                <td class="text-center">{{$s->labor->count()}}</td>
              </tr>
              @if($i>=5)
                @break
              @endif
            @endforeach
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
            <div class="card detail">
              <canvas id="Chart1" width="400" height="400"></canvas>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card detail">
              <canvas id="Chart2" width="400" height="400"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card detail" style="height:830px;">
          <h2 class="h2">Machine allocation for projects</h2>
          <table class="table">
            <tr>
              <th>#</th>
              <th>Project</th>
              <th class="text-center">Allocated machine count</th>
            </tr>
            @php
                $i=0;
            @endphp
            @foreach($projects as $p)
              @php
                  $i++;
              @endphp
              <tr>
                <td>{{$i}}</td>
                <td>{{$p->project_name}}</td>
                <td class="text-center">
                  {{$p->machines->count()}}<br>
                </td>
            @endforeach
          </table>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->
<style>
  .status {
    flex-direction: row;
    align-items: center;
    overflow: visible;
    padding: 15px;
  }

  .detail {
    overflow-x: scroll;
    padding: 15px;
  }

  .icon-container {
    background-color: #36f;
    border-radius: .25rem;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 12px;
    transition: width .4s ease;
    transform: translateZ(0);
    -webkit-transform-style: preserve-3d;
    -webkit-backface-visibility: hidden;
    width:90px;
    height: 90px;
  }

  .icon {
    height: 100%;
    padding: 0.625rem;
  }

  .icon ion-icon {
    font-size: 2.5rem;
  }

  .details {
    padding: 0 .5rem 0 1.625rem;
  }

  .count {
    font-size: 50px;
    font-weight: bold;
    position: absolute;
    right: 30px;
  }

  nb-card {
    margin-top: 15px !important;
    margin-bottom: 10px !important;
  }

  nb-card-body {
    overflow: sc
  }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
<script>
  var ctx1 = document.getElementById('Chart1').getContext('2d');
  var ctx2 = document.getElementById('Chart2').getContext('2d');
  ctx1.canvas.parentNode.style.height = '400px';
  ctx2.canvas.parentNode.style.height = '400px';
  var myPieChart1 = new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: [
          @php
            $i=0;
          @endphp
          @foreach($projects as $p)
            @php
              $i=0;
              echo chr(39).$p->project_name.chr(39).',';
            @endphp
            @if($i>=5)
              @break
            @endif
          @endforeach
          ],
        datasets: [{
            label: '# of Votes',
            data: [
              @php
                $i=0;
              @endphp
              @foreach($projects as $p)
                @php
                  $i=0;
                  echo $p->employees->count().',';
                @endphp
                @if($i>=5)
                  @break
                @endif
              @endforeach
              ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
      cutoutPercentage:50,
      maintainAspectRatio:false,
      title: {
            display: true,
            text: 'Recent projects by employees allocation count',
            fontSize: 22
        }
    }
  });
  var myPieChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: [
          @php
            $i=0;
          @endphp
          @foreach($projects as $p)
            @php
              $i=0;
              echo chr(39).$p->project_name.chr(39).',';
            @endphp
            @if($i>=5)
              @break
            @endif
          @endforeach
          ],
        datasets: [{
            label: '# of Votes',
            data: [
              @php
                $i=0;
              @endphp
              @foreach($projects as $p)
                @php
                  $i=0;
                  echo $p->labors->count().',';
                @endphp
                @if($i>=5)
                  @break
                @endif
              @endforeach
              ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
      cutoutPercentage:50,
      maintainAspectRatio:false,
      title: {
            display: true,
            text: 'Recent projects by labor allocation count',
            fontSize: 22
        }
    }
  });
</script>
@endsection

@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
@endsection