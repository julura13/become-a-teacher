function listMore(id) {
    let element = $("#courses_" + id);

    if (element.hasClass("tw-hidden")) {
        $("#courses_" + id).removeClass("tw-hidden");
        $("#not_selected_" + id).addClass("tw-hidden");
        $("#selected_" + id).removeClass("tw-hidden");
    } else {
        $("#courses_" + id).addClass("tw-hidden");
        $("#not_selected_" + id).removeClass("tw-hidden");
        $("#selected_" + id).addClass("tw-hidden");
    }
}
let courseList = [];
let courseNames = [];


function selectCourse(id, name, course_name = null) {
    // console.log('I MADE A CHANGE')
    let element = $("#course_not_selected_" + id);
    console.log(course_name);
    let course_level_name = course_name;
    let level = course_level_name.charAt(course_level_name.length-1);


    if (element.hasClass("tw-hidden")) {
        $("#course_not_selected_" + id).removeClass("tw-hidden");
        $("#course_selected_" + id).addClass("tw-hidden");
        var result = courseList.filter(function(elem){
            return elem != id; 
        });

        var resultNames = courseNames.filter(function(elemName){
            return elemName != name; 
        });
        courseNames = resultNames;
        courseList = result;
    } else {
        if (level == 3) {
            $("#course_not_selected_" + id).addClass("tw-hidden");
            $("#course_selected_" + id).removeClass("tw-hidden");
            courseList.push(id);
            courseNames.push(name);

            $("#course_not_selected_" + (id - 1)).addClass("tw-hidden");
            $("#course_selected_" + (id - 1)).removeClass("tw-hidden");
            courseList.push((id - 1));
            courseNames.push(name);

            $("#course_not_selected_" + (id - 2)).addClass("tw-hidden");
            $("#course_selected_" + (id - 2)).removeClass("tw-hidden");
            courseList.push((id - 2));
            courseNames.push(name);
        } else if (level == 2) {
            $("#course_not_selected_" + id).addClass("tw-hidden");
            $("#course_selected_" + id).removeClass("tw-hidden");
            courseList.push(id);
            courseNames.push(name);

            $("#course_not_selected_" + (id - 1)).addClass("tw-hidden");
            $("#course_selected_" + (id - 1)).removeClass("tw-hidden");
            courseList.push((id - 1));
            courseNames.push(name);
        } else {
            $("#course_not_selected_" + id).addClass("tw-hidden");
            $("#course_selected_" + id).removeClass("tw-hidden");
            courseList.push(id);
            courseNames.push(name);
        }
        
        
    }

    console.log("Course list: " + courseList);
    console.log("Course name: " + courseNames);
    console.log(course_level_name[course_level_name.length]);

    axios.post('/api/v1/get/pathways/from/requirements', {
        courseList: courseList,
      })
      .then(function (response) {
        console.log(response.data);
        let html = "";

        let pathways = response.data.pathways;

        if (pathways.length == 0) {
            $("#methodologySection").addClass("tw-hidden");
        } else {
            for (let i = 0; i < pathways.length; i++) {
                html += `<tr>
                    <td class="tw-border-0"><button class="tw-rounded tw-bg-yellow-500 tw-text-white tw-text-sm lg:tw-text-lg lg:tw-px-3 lg:tw-py-2 tw-px-2 tw-py-1 tw-mb-3 hover:tw-bg-yellow-600" onclick="getPathwayInfo('${pathways[i].name}')">${pathways[i].name}</button></td>
                </tr>`;
                
            }
            $("#pathwaysBody").html(html);
            $("#methodologySection").removeClass("tw-hidden");
        }

      })
      .catch(function (error) {
        console.log(error);
      });
}


    // $('#course_id').on("change", function () {
    //     let id = $('#course_id').val();

    //     console.log(id);
    //     axios.get('/api/v1/get/courses/' + id)
    //         .then(function (response) {
    //             // handle success
    //             $('#course_list').html("");

    //             console.log(response);
    //             let courses = response.data;
    //             let html = "";
    //             for (let i = 0; i < courses.length; i++) {

    //                 html += `<div class="tw-my-2"><input wire:model='course' type='checkbox' class='tw-mr-1' name='any_one[]' value='${courses[i].name}'>${courses[i].name} ${courses[i].level}</div>`;


    //             }

    //             $('#course_list').append(html);

    //         })
    //         .catch(function (error) {
    //             // handle error
    //             console.log(error);
    //         })
    //         .then(function () {
    //             // always executed
    //         });
    // });

    function getPathwayInfo(name) {
        console.log(name);
        axios.get('/api/v1/pathway/getPathway/' + name)
          .then(function (response) {
              // handle success
              console.log(response.data);
              let data = response.data;
              $("#pathwayInfoLabel").text(data.name);
              let html = ""; 
              let infoDesc = ""; 
              let infoMoreInfo = "";  

              infoDesc = `<h3 class="tw-text-gray-700 tw-text-base tw-font-bold">Description:</h3><p>${data.description}</p>`;
              infoMoreInfo = `<h3 class="tw-text-gray-700 tw-text-base tw-font-bold">More info:</h3><p>${data.more_info}</p>`;
              html += infoDesc;
              html += infoMoreInfo;
              $("#pathwayInfoBody").html(html);
              $('#pathwayInfo').modal('show');
            //   $("#pathway_req").html("");
            //   for (let i = 0; i < response.data.length; i++) {
            //     let name2 = "";
            //     let name3 = "";

            //     if (response.data[i].course_2_name != null) {
            //       name2 = " <strong class='tw-text-gray-700'> OR </strong> " + response.data[i].course_2_name;
            //     }
            //     if (response.data[i].course_3_name != null) {
            //       name3 = " <strong class='tw-text-gray-700'> OR </strong> " + response.data[i].course_3_name;
            //     }
            //     console.log(response.data[i]);
            //     $("#pathway_req").append("" + response.data[i].course_1_name + name2 + name3 + "<br>    ");
            //   }
            })
            .catch(function (error) {
              // handle error
              console.log(error);
            })
            .then(function () {
              // always executed
            });
    }


