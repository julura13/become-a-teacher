<div class="col-12 mb-6 tw-my-0">
    <div class="card h-100 tw-p-4 tw-pr-8 tw-pt-10 border-0 tw-shadow">
        {{-- <div class="row tw-ml-2">
            <div class="tw-w-10/12"><h4 class="tw-px-3 tw-pt-3 tw-text-xl tw-text-gray-800">Candidates over time</h4></div>
            <div class="tw-w-8 tw-text-right tw-mx-0">
                <button class="tw-my-2 tw-mr-2 tw-text-xl tw-text-gray-800" data-toggle="modal" data-target="#applications_over_time_modal"><i class="fas fa-search-plus"></i></button>
            </div>
        </div> --}}
      
        <div class="row">
            <div class="col">
                <div id="chart_applications_over_time_modal" class="tw-mx-auto tw-h-64"></div>
            </div>
        </div>
        
    </div>
    <!-- Modal -->
    <div class="modal fade" id="applications_over_time_modal" tabindex="-1" aria-labelledby="applications_over_time_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tital tw-text-2xl tw-text-gray-800" id="applications_over_time_modal_label">Candidates over time</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div id="chart_applications_over_time_modal" class="tw-mx-auto"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var new_dates = 0;
    var new_applicants_dates = [];
    var new_applicants_count = [];
    var completed_applicants_count = [];
    var total_applicants_count = [];

    axios.get('/api/v1/chart/applicants_over_time')
    .then(function (response) {
        // handle success

        // console.log("All data: " + response.data);
        new_dates = response.data.chart_dates;
        // console.log(response.data.completed_applicants[0].date);

        // for (let i = 0; i < response.data.new_applicants.length; i++) {
        //     new_applicants_dates.push(response.data.new_applicants[i].date);
        // }

        // for (let i = 0; i < response.data.new_applicants.length; i++) {
        //     new_applicants_count.push(response.data.new_applicants[i].new);
        // }

        // for (let i = 0; i < response.data.completed_applicants.length; i++) {
        //     completed_applicants_count.push(response.data.completed_applicants[i].completed);
        // }     

        // for (let i = 0; i < response.data.total_applicants.length; i++) {
        //     total_applicants_count.push(response.data.total_applicants[i].total);
        // }     

        // console.log("New: ");
        // console.log(new_dates);
        // console.log("Count");
        // console.log(new_applicants_count);
        // console.log()

        var options = {
          series: [{
          name: 'Candidates',
          type: 'line',
          data: response.data.new_applicants
        }, 
        // {
        //   name: 'Completed',
        //   type: 'line',
        //   data: response.data.completed_applicants
        // }, 
        // {
        //   name: 'Total',
        //   type: 'line',
        //   data: response.data.total_applicants
        // }
      ],
        colors:['#008FFB', '#fc0fc0', '#FEB019'],
          chart: {
          height: 350,
          type: 'line',
          stacked: false
        },
        dataLabels: {
          enabled: false
        },
        markers: {
            size: 3,
            colors: ['#008FFB', '#fc0fc0', '#FEB019'],
            strokeColors: '#fff',
            strokeWidth: 2,
            strokeOpacity: 0.9,
            strokeDashArray: 0,
            fillOpacity: 1,
            discrete: [],
            shape: "circle",
            radius: 2,
            offsetX: 0,
            offsetY: 0,
            onClick: undefined,
            onDblClick: undefined,
            showNullDataPoints: true,
            hover: {
              size: undefined,
              sizeOffset: 3
            }
        },
        stroke: {
          width: [2, 2, 4],
          colors:['#008FFB', '#fc0fc0', '#FEB019'],
        },
        title: {
          text: 'Candidates over time',
          align: 'left',
          offsetX: 10
        },
        xaxis: {
        categories: response.data.chart_dates,
        },
        yaxis: [
          {
            // seriesName: 'New',
            opposite: true,
            axisTicks: {
              show: true,
            },
            axisBorder: {
              show: true,
              color: '#008FFB'
            },
            labels: {
              style: {
                colors: '#008FFB',
              }
            },
            title: {
              text: "# of candidates",
              style: {
                color: '#008FFB',
              }
            },
            tooltip: {
              enabled: true
            }
          },
          // {
          //   seriesName: 'Completed',
          //   opposite: true,
          //   axisTicks: {
          //     show: true,
          //   },
          //   axisBorder: {
          //     show: true,
          //     color: '#fc0fc0'
          //   },
          //   labels: {
          //     style: {
          //       colors: '#fc0fc0',
          //     }
          //   },
          //   title: {
          //     text: "New Applications",
          //     style: {
          //       color: '#fc0fc0',
          //     }
          //   },
          // },
          // {
          //   seriesName: 'Total',
          //   opposite: true,
          //   axisTicks: {
          //     show: true,
          //   },
          //   axisBorder: {
          //     show: true,
          //     color: '#FEB019'
          //   },
          //   labels: {
          //     style: {
          //       colors: '#FEB019',
          //     },
          //   },
          //   title: {
          //     text: "Completed Applications",
          //     style: {
          //       color: '#FEB019',
          //     }
          //   }
          // },
        ],
        tooltip: {
          fixed: {
            enabled: true,
            position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
            offsetY: 30,
            offsetX: 60
          },
        },
        legend: {
          horizontalAlign: 'left',
          offsetX: 40
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart_applications_over_time_modal"), options);
        chart.render();

    })
    .catch(function (error) {
        // handle error
        console.log(error);
    })
    .then(function () {
        // always executed
    });

</script>