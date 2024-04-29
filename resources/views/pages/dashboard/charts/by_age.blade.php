<div class="col-6 mb-3 tw-my-5">
    <div class="card h-100 tw-p-4 border-0 tw-shadow">
        {{-- <div class="row tw-ml-4">
            <div class="tw-w-10/12"><h4 class="tw-px-3 tw-pt-3 tw-text-xl tw-text-gray-800">By age range</h4></div>
            <div class="tw-w-8 tw-text-right tw-mx-0">
                <button class="tw-my-2 tw-mr-2 tw-text-xl tw-text-gray-800" data-toggle="modal" data-target="#age_modal"><i class="fas fa-search-plus"></i></button>
            </div>
        </div> --}}
      
        <div class="row">
            <div class="col">
                <div id="chart_age" class="tw-mx-auto tw-h-64"></div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="age_modal" tabindex="-1" aria-labelledby="age_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tital tw-text-2xl tw-text-gray-800" id="age_modal_label">Candidates by age range</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div id="chart_age_modal" class="tw-mx-auto"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var _18s = 0;
    var _20s = 0;
    var _25s = 0;
    var _30s = 0;
    var _35s = 0;
    var _40s = 0;
    var _45s = 0;
    var _m45s = 0;

    axios.get('/api/v1/chart/age')
        .then(function (response) {

            _18s = response.data["<18s"];
            _20s = response.data["<20s"];
            _25s = response.data["<25s"];
            _30s = response.data["<30s"];
            _35s = response.data["<35s"];
            _40s = response.data["<40s"];
            _45s = response.data["<45s"];
            _m45s = response.data[">45s"];
            
            var age_chart_options = {
                series: [{
                    name: 'Under 18',
                    data: [_18s]
                }, {
                    name: '18 - 20',
                    data: [_20s]
                }, {
                    name: '20 - 25',
                    data: [_25s]
                }, {
                    name: '25 - 30',
                    data: [_30s]
                }, {
                    name: '30 - 35',
                    data: [_35s]
                }, {
                    name: '35 - 40',
                    data: [_40s]
                }, {
                    name: '40 - 45',
                    data: [_45s]
                }, {
                    name: '45+',
                    data: [_m45s]
                }],
                title: {
                    text: 'Candidates by age',
                    align: 'left',
                    offsetX: 10
                },
                colors: ['#FF0000', '#C71585', '#8A2BE2', '#0000FF', '#158466','#00A933','#81D41A','#FFFF00'],
                chart: {
                    type: 'bar',
                    height: 400
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '90%',
                        // endingShape: 'rounded'
                        dataLabels: {
                            position: 'top'
                        }
                    },
                },
                dataLabels: {
                    style: {
                        colors: ['#FFFFFF']
                    },
                    offsetY: 10,
                    enabled: true,
                    // enabledOnSeries: [1,2,3,4,5],
                    dropShadow: {
                        enabled: true,
                        left: 2,
                        top: 2,
                        opacity: 0.5
                    }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: [''],
                },
                yaxis: {
                    title: {
                        text: '# of candidates'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val
                        }
                    }
                }
            };

                var chart_age = new ApexCharts(document.querySelector("#chart_age"), age_chart_options);
                chart_age.render();
                var chart_age_modal = new ApexCharts(document.querySelector("#chart_age_modal"), age_chart_options);
                chart_age_modal.render();

            })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });

</script>