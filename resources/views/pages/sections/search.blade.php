<div id="searchPage" class="container-fluid tw-hidden">
  <div class="form-group md:tw-text-center">

    <div class="tw-text-white tw-font-normal tw-text-2xl md:tw-text-3xl tw-w-80 tw-text-left tw-mx-auto md:tw-inline">I want to teach</div>
    <span class="tw-text-left">
      <div id="results_container" class="tw-bg-red-800 md:tw-w-80 tw-inline-block tw-relative tw-w-80 tw-text-white tw-text-2xl md:tw-text-3xl">
          <div class="tw-absolute md:tw--mt-8 tw-border-3 tw-inset-x-1/2 tw-transform tw--translate-x-1/2 tw-w-80 tw-justify-center">
              <input id="searchbox" type="text" placeholder="this subject" class="tw-placeholder-gray-200 tw-italic tw-inline tw-border-b tw-px-2 md:tw-w-5/6 tw-w-64 tw-text-white tw-bg-transparent"> <button id="clearSearch" class="tw-inline"><i class="ik ik-x"></i></button>
              <div id="results" class="tw-bg-transparent tw-px-2 tw-my-3 tw-rounded-b tw-h-64 tw-hidden">

              </div>

          </div>
      </div>
    </span>

  </div>

<input type="text" id='pathway_id' class="tw-hidden">

</div>

<script>

  let values = "";
  let selector = "#pathway_search_select";
  let results = "#results";
  let resultsContainer = "#results_container";


  axios.get('/api/v1/pathway/getPathways/')
    .then(function (response) {
      // handle success
      console.log(response);
      values = response.data;
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    })
    .then(function () {
      // always executed
    });

$( document ).ready(function() {
  function selectSearch(values, results){
    console.log(values);
    let html = "";

    for (let i = 0; i < values.length; i++) {
        html += `<div class="option tw-cursor-pointer tw-text-base tw-text-white hover:tw-text-gray-700" id="option_${i+1}" onclick="setSearch('option_${i+1}')">${values[i].label}</div>`;
    }

    $(results).html(html);
  }

  $('#goto_search').on('click', function(){
    selectSearch(values, results);
  })

  $('#close').on('click', function(){
        window.location.replace('/closing');
  })

  $(selector).on('click', function(){
    $(selector).addClass("tw-hidden");
    $(resultsContainer).removeClass("tw-hidden");
    $('#searchbox').focus();
  })

  $('#searchbox').on("focus", function(){
    $("#results").removeClass("tw-hidden");
  });

  $('#searchbox').on('keyup',function() {
    searchFilter("#searchbox");
  })

  $("#clearSearch").on('click', function(){
    $('#searchbox').val("");
    $('#searchbox').focus();
    searchFilter("#searchbox");
});

  function searchFilter(selector) {
    var filter = $(selector).val(),
        count = 0;
    $('#results div').each(function () {
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show();
            count++;
        }
    });
  }


});

function setSearch(id){
    let val = $('#'+id).text();
    console.log(val);
    $('#searchbox').val(val);
    $(".option").hide();
    $("#results").addClass("tw-hidden");
    loadMethod(val);
}

function loadMethod(name) {
    $("#search").addClass("tw-hidden");
    $("#method").show();

  axios.get('/api/v1/pathway/getPathway/' + name)
    .then(function (response) {
        // handle success
        console.log(response);
        console.log(response.data);
        let header_html = `<span class="lg:tw-text-xl tw-text-base">You have requested more information on <strong id="pathway_name" class="tw-text-gray-700 tw-underline">${response.data.name}</strong> as a high school subject.<span>`;

        $("#pathway_name").html(response.data.name);
        $("#pathway_name_header").html(header_html);
        $("#pathway_desc").html(response.data.description);
        $("#pathway_info").html(response.data.more_info);

        axios.get('/api/v1/requirements/getRequirements/' + response.data.id)
          .then(function (response) {
              // handle success
              console.log(response);
              console.log(response.data);
              $("#pathway_req").html("");
              for (let i = 0; i < response.data.length; i++) {
                let name2 = "";
                let name3 = "";

                if (response.data[i].course_2_name != null) {
                  name2 = " <strong class='tw-text-gray-700 tw-text-sm lg:tw-text-base'> AND </strong> " + response.data[i].course_2_name;
                }
                if (response.data[i].course_3_name != null) {
                  name3 = " <strong class='tw-text-gray-700 tw-text-sm lg:tw-text-base'> AND </strong> " + response.data[i].course_3_name;
                }
                console.log(response.data[i]);
                $("#pathway_req").append("<div class='tw-border-b tw-py-2'>" + response.data[i].course_1_name + name2 + name3 + "</div>   ");
              }
            })
            .catch(function (error) {
              // handle error
              console.log(error);
            })
            .then(function () {
              // always executed
            });

      })
      .catch(function (error) {
        // handle error
        console.log(error);
      })
      .then(function () {
        // always executed
      });
}

</script>

