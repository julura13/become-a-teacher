<div class="col-6 mb-3 tw-my-5">
    <div class="card h-100 tw-p-4 border-0 tw-shadow">
        {{-- <div class="row tw-ml-2">
            <div class="tw-w-10/12"><h4 class="tw-px-3 tw-pt-3 tw-text-xl tw-text-gray-800">By gender</h4></div>
            <div class="tw-w-8 tw-text-right tw-mx-0">
                <button class="tw-my-2 tw-mr-2 tw-text-xl tw-text-gray-800" data-toggle="modal" data-target="#gender_modal"><i class="fas fa-search-plus"></i></button>
            </div>
        </div> --}}
      
        <div class="row">
            <div class="col">
                <div id="chart_gender" class="tw-mx-auto tw-h-64"></div>
            </div>
        </div>
  
    </div>
    <!-- Modal -->
    <div class="modal fade" id="gender_modal" tabindex="-1" aria-labelledby="gender_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tital tw-text-2xl tw-text-gray-800" id="gender_modal_label">By gender</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div id="chart_gender_modal" class="tw-mx-auto"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var male = 0;
    var female = 0;
    var neither = 0;
    axios.get('/api/v1/chart/gender')
        .then(function (response) {

            male = response.data['male'];
            female = response.data['female'];
            neither = response.data['no_option'];
            prefer_not_to_say = response.data['prefer_not_to_say'];

            var gender_chart_options = {
                series: [male, female, neither, prefer_not_to_say],
                title: {
                    text: 'Candidates by gender',
                    align: 'left',
                    offsetX: 10
                },
                chart: {
                    // width: 400,
                    height: 450,
                    type: 'pie',
                },
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center', 
                },
                labels: ['Male', 'Female', "I don't see my option here", 'Prefer not to say'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            var chart_gender = new ApexCharts(document.querySelector("#chart_gender"), gender_chart_options);   
            chart_gender.render();
            var chart_gender_modal = new ApexCharts(document.querySelector("#chart_gender_modal"), gender_chart_options);
            chart_gender_modal.render();

        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });
</script>