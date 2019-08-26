@extends('layouts.app2')

@section('content')
    <div class="row py-3">
        <div class="mx-auto">
            <h2>Main Dashboard</h2>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12 p-2 col-sm-6">
            <div class="card">
                <div class="card-header bg-primary text-light">
					<a href="{{route('category.index')}}">
						<i class="fas fa-tags"></i> Category
					</a>
                </div>
                <div class="card-body">
					<canvas id="homeCategoriesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 p-2 col-sm-6">
            <div class="card">
                <div class="card-header bg-success text-light">
					<a href="{{route('tag.index')}}"><i class="fas fa-th-large"></i> Publisher</a>
				</div>
                <div class="card-body">
					<canvas id="homeTagsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 p-2 col-sm-6">
            <div class="card">
                <div class="card-header bg-dark text-light">
					<a href="{{route('post.index')}}"><i class="fas fa-gamepad"></i> Game</a>
                </div>
                <div class="card-body">
					<canvas id="homeGamesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 p-2 col-sm-6">
            <div class="card">
                <div class="card-header bg-warning text-light"><a href="{{asset('/admin/dlc')}}">
                    <i class="fas fa-box"></i> DLC</a>
                </div>
                <div class="card-body">
					<canvas id="homeDlcsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 p-2 col-sm-6">
            <div class="card">
                <div class="card-header bg-danger text-light"><a href="{{asset('/admin/comment')}}">
                    <i class="fas fa-comments"></i> Review</a>
                </div>
                <div class="card-body">
					<canvas id="homeReviewsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 p-2 col-sm-6">
            <div class="card">
                <div class="card-header bg-info text-light"><a href="{{asset('/admin/billing')}}">
					<i class="fas fa-file-invoice"></i> Billing</a>
                </div>
                <div class="card-body">
					<canvas id="homeBillChart"></canvas>
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript">
        let cateChartArea = document.getElementById('homeCategoriesChart').getContext('2d');
        let tagChartArea = document.getElementById('homeTagsChart').getContext('2d');
        let gameChartArea = document.getElementById('homeGamesChart').getContext('2d');
        let dlcChartArea = document.getElementById('homeDlcsChart').getContext('2d');
        let reviewChartArea = document.getElementById('homeReviewsChart').getContext('2d');
        let billChartArea = document.getElementById('homeBillChart').getContext('2d');
        let cateChart = new Chart(cateChartArea, {
            type: 'bar',
            data: {
                labels:	{!! json_encode($lsCateName) !!},
                datasets: [{
                    label: 'Game count',
                    data: {!! json_encode($lsCatePostCount) !!},
                    backgroundColor: [
						@foreach($lsCategory as $cate)
                            '#3762A5',
						@endforeach
                    ],
                    borderColor: [
						@foreach($lsCategory as $cate)
                            '#3762A5',
						@endforeach
                    ],
                    borderWidth: 1
                },{
                    label: 'Review count',
                    data: {!! json_encode($lsCatePostCommentCount) !!},
                    backgroundColor: [
						@foreach($lsCategory as $cate)
                        	'#5886ff',
						@endforeach
                    ],
                    borderColor: [
						@foreach($lsCategory as $cate)
                            '#5886ff',
						@endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        let tagChart = new Chart(tagChartArea, {
            type: 'bar',
            data: {
                labels:	{!! json_encode($lsTagName) !!},
                datasets: [{
                    label: 'Game count',
                    data: {!! json_encode($lsTagPostCount) !!},
                    backgroundColor: [
						@foreach($lsTag as $tag)
                            '#1CA56D',
						@endforeach
                    ],
                    borderColor: [
						@foreach($lsTag as $tag)
                            '#1CA56D',
						@endforeach
                    ],
                    borderWidth: 1
                },{
                    label: 'Review count',
                    data: {!! json_encode($lsTagPostCommentCount) !!},
                    backgroundColor: [
						@foreach($lsTag as $tag)
                            '#22FFB2',
						@endforeach
                    ],
                    borderColor: [
						@foreach($lsTag as $tag)
                            '#22FFB2',
						@endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        let gameChart = new Chart(gameChartArea, {
            type: 'doughnut',
            data: {
                labels:	['Windows', 'Xbox', 'Playstation'],
                datasets: [{
                    label: 'Game count',
                    data: {!!json_encode($platformGameCountArray)!!},
                    backgroundColor: ['#00A4EF', '#107C10', '#003087'],
                    borderColor: [],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        let dlcChart = new Chart(dlcChartArea, {
            type: 'doughnut',
            data: {
                labels:	['Windows', 'Xbox', 'Playstation'],
                datasets: [{
                    label: 'Game count',
                    data: {!!json_encode($platformDLCCountArray)!!},
                    backgroundColor: ['#00A4EF', '#107C10', '#003087'],
                    borderColor: [],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        let reviewChart = new Chart(reviewChartArea, {
            type: 'bar',
            data: {
                labels: ['5 star','4 star','3 star','2 star','1 star'],
                datasets: [{
                    label: 'Game Review count',
                    data: {!! json_encode($reviewPostArray) !!},
                    backgroundColor: ['#5A84FF','#1EFFB0','#8D8FA5','#FFCA3F','#FF5243'],
                    borderColor: [],
                    borderWidth: 1
                },{
                    label: 'DLC Review count',
                    data: {!! json_encode($reviewDlcArray) !!},
                    backgroundColor: ['#394BA5','#1CA575','#272937','#CD9F31','#B93E2F'],
                    borderColor: [],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        let billChart = new Chart(billChartArea, {
            type: 'bar',
            data: {
                labels: {!! json_encode($mostInvoiceName) !!},
                datasets: [{
                    label: 'Most invoices count',
                    data: {!! json_encode($mostInvoiceCount) !!},
                    backgroundColor:
						[
							@foreach($mostInvoiceCount as $count)
                                '#5A84FF',
							@endforeach
						],
                    borderColor: [],
                    borderWidth: 1
                },{
                    label: 'Average invoices per user',
                    data: {!! json_encode($countryUserAverage) !!},
                    backgroundColor:
						[
							@foreach($countryUserAverage as $average)
                                '#394BA5',
							@endforeach
						],
                    borderColor: [],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
	</script>
@endsection
