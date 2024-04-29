<div class="col-12 mb-6 tw-my-0">
    <div class="card h-100 tw-p-4 border-0 tw-shadow">
        {{-- <div class="row tw-ml-4">
            <div class="tw-w-10/12"><h4 class="tw-px-3 tw-pt-3 tw-text-xl tw-text-gray-800">By age range</h4></div>
            <div class="tw-w-8 tw-text-right tw-mx-0">
                <button class="tw-my-2 tw-mr-2 tw-text-xl tw-text-gray-800" data-toggle="modal" data-target="#university_modal"><i class="fas fa-search-plus"></i></button>
            </div>
        </div> --}}
      
        <div class="row">
            <div class="col">
                <div id="chart_university" class="tw-mx-auto tw-h-64"></div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="university_modal" tabindex="-1" aria-labelledby="university_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tital tw-text-2xl tw-text-gray-800" id="university_modal_label">Candidates by age range</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div id="chart_university_modal" class="tw-mx-auto"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var CPUT = 0;
    var CUT = 0;
    var DUT = 0;
    var MUT = 0;
    var NWU = 0;
    var RU = 0;
    var SMHSU = 0;
    var SPU = 0;
    var TUT = 0;
    var UNISA = 0;
    var UCT = 0;
    var UJ = 0;
    var UP = 0;
    var UW = 0;
    var UWC = 0;
    var UFH = 0;
    var UKN = 0;
    var UL = 0;
    var UM = 0;
    var US = 0;
    var UFS = 0;
    var UV = 0;
    var UZ = 0;
    var VUT = 0;
    var WSU = 0;
    var other = 0;

    axios.get('/api/v1/chart/university')
        .then(function (response) {

            CPUT = response.data["CPUT"];
            CUT = response.data["CUT"];
            DUT = response.data["DUT"];
            MUT = response.data["MUT"];
            NWU = response.data["NWU"];
            RU = response.data["RU"];
            SMHSU = response.data["SMHSU"];
            SPU = response.data["SPU"];
            TUT = response.data["TUT"];
            UNISA = response.data["UNISA"];
            UCT = response.data["UCT"];
            UJ = response.data["UJ"];
            UP = response.data["UP"];
            UW = response.data["UW"];
            UWC = response.data["UWC"];
            UFH = response.data["UFH"];
            UKN = response.data["UKN"];
            UL = response.data["UL"];
            UM = response.data["UM"];
            US = response.data["US"];
            UFS = response.data["UFS"];
            UV = response.data["UV"];
            UZ = response.data["UZ"];
            VUT = response.data["VUT"];
            WSU = response.data["WSU"];
            other = response.data["other"];
            
            var university_chart_options = {
                series: [{
                    name: 'Cape Peninsula University of Technology',
                    data: [CPUT]
                }, {
                    name: 'Central University of Technology',
                    data: [CUT]
                }, {
                    name: 'Durban University of Technology',
                    data: [DUT]
                }, {
                    name: 'Mangosuthu University of Technology',
                    data: [MUT]
                }, {
                    name: 'North-West University',
                    data: [NWU]
                }, {
                    name: 'Rhodes University',
                    data: [RU]
                }, {
                    name: 'Sefako Makgatho Health Sciences University',
                    data: [SMHSU]
                }, {
                    name: 'Sol Plaatjie University',
                    data: [SPU]
                }, {
                    name: 'Tshwane University of Technology',
                    data: [TUT]
                }, {
                    name: 'UNISA',
                    data: [UNISA]
                }, {
                    name: 'University of Cape Town',
                    data: [UCT]
                }, {
                    name: 'University of Johannesburg',
                    data: [UJ]
                }, {
                    name: 'University of Pretoria',
                    data: [UP]
                }, {
                    name: 'University of Witswatersrand',
                    data: [UW]
                }, {
                    name: 'University of the Western Cape',
                    data: [UWC]
                }, {
                    name: 'University of Fort Hare',
                    data: [UFH]
                }, {
                    name: 'University of KwaZulu-Natal',
                    data: [UKN]
                }, {
                    name: 'University of Limpopo',
                    data: [UL]
                }, {
                    name: 'University of Mpumalanga',
                    data: [UM]
                }, {
                    name: 'University of Stellebosch',
                    data: [US]
                }, {
                    name: 'University of the Free State',
                    data: [UFS]
                }, {
                    name: 'University of Venda',
                    data: [UV]
                }, {
                    name: 'University of Zululand',
                    data: [UZ]
                }, {
                    name: 'Vaal University of Technology',
                    data: [VUT]
                }, {
                    name: 'Walter Sisulu University',
                    data: [WSU]
                }, {
                    name: 'Other',
                    data: [other]
                },],

                title: {
                    text: 'Candidates by university',
                    align: 'left',
                    offsetX: 10
                },
                colors: ['#00FFFF', '#0000FF', '#DFFF00', '#1560BD', '#555D50','#FF00FF','#FFD700','#8e7618',
                '#4B0082', '#00A86B', '#F0E68C', '#BF94E4', '#B30059','#000080','#FFA500','#A020F0',
                '#51484F', '#FF0800', '#FA8072', '#40E0D0', '#635147','#8F00FF','#00FF00','#EDED09',
                '#00AAFF', '#bac4c8'],
                chart: {
                    type: 'bar',
                    height: 400
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '100%',
                        endingShape: 'rounded',
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
                    enabled: false,
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

                var chart_university = new ApexCharts(document.querySelector("#chart_university"), university_chart_options);
                chart_university.render();
                var chart_university_modal = new ApexCharts(document.querySelector("#chart_university_modal"), university_chart_options);
                chart_university_modal.render();

            })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });

</script>
