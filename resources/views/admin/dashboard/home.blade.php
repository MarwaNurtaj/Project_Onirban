@extends('layouts.admin')
@section('page')
<div class="row">
    <div class="col-md-12 welcome_part">
        <p class="text-capitalize"><span>Welcome </span> {{Auth::user()->name}} {{Auth::user()->last_name}} </p>
    </div>
</div>

<div class="col-md-12">
    <canvas id="myChart"></canvas>
</div>

@php
$allData=App\Models\User::select('user_role', \DB::raw('COUNT(*) as count'))
    ->where('user_status', 1)
    ->groupBy('user_role')
    ->orderBy('id', 'ASC')
    ->get();
@endphp

<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            @php
            foreach($allData as $data) {
                echo "'".ucwords($data->roleInfo->role_name)."',";
            }
            @endphp
        ],
        datasets: [{
            label: 'Role Wise Active User Count',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

@endsection