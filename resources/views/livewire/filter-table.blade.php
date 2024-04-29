<div class="row">
    <div class="col">
    <div class="tw-w-full tw-flex tw-pb-10">
        <div class="relative tw-mr-2">
            <h3 class="tw-text-3xl">Select the courses you have completed!!</h3>
            <select id="course_id" class="tw-w-64 tw-bg-blue-500">
                <option value="">--Select--</option>
            @foreach ($categories as $category)

            <option value="{{$category->id}}">{{ $category->name }}</option>

                {{-- <label class="tw-font-bold">{{ $category->name }}</label>
                <br>
                @foreach ($courses as $course_single)
                {!! ($course_single->category == $category->id) ? "<input wire:model='course' type='checkbox' class='tw-mr-3' name='any_one[]' value='$course_single->id'> $course_single->name $course_single->level<br>" : "" !!}
                @endforeach
                <br> --}}

            @endforeach
            </select>

            <div id="course_list">

            </div>

        </div>
        <div>@json($course)</div>
    </div>
    </div>
    <div class="col">
    <div class="tw-overflow-x-auto tw-mb-2">
        <table class="tw-table-fixed border">
            <thead class="tw-bg-gray-200">
                <tr>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Teaching Methodology</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pathways as $pathway)
                    <tr>
                        <td class="tw-truncate border tw-px-4 tw-py-2 hover:tw-bg-blue-200"><a class="btn tw-m-1 tw-text-gray-800" data-toggle="modal" data-target="#method_{{$pathway->id}}">{{ ucfirst($pathway->name) }}</a></td>
                        <div class="modal fade" id="method_{{$pathway->id}}" tabindex="-1" aria-labelledby="method_modal_label" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="question_modal_label">Method: {{ ucfirst($pathway->name) }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <h4>Description:</h4>
                                        <p>{{ $pathway->description }}</p>

                                        <h4>Requirements:</h4>
                                        <p>{{ $pathway->requirement }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="relative tw-mr-2">
        <select wire:model="per_page" class="tw-block  tw-bg-gray-200 border tw-border-gray-200 tw-text-gray-700 tw-py-3 tw-px-4 tw-pr-8 tw-rounded tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-state">
            <option>10</option>
            <option>25</option>
            <option>50</option>
            <option>100</option>
        </select>
    </div>

    {{ $pathways->links() }}
    </div>
</div>

<script>


    $('#course_id').on("change", function () {
        let id = $('#course_id').val();

        console.log(id);
        axios.get('/api/v1/get/courses/' + id)
            .then(function (response) {
                // handle success
                console.log(response);
                let courses = response.data;
                let html = "";
                for (let i = 0; i < courses.length; i++) {

                    html += `<div class="tw-my-2"><input wire:model='course' type='checkbox' class='tw-mr-1' name='any_one[]' value='${courses[i].id}'>${courses[i].name} ${courses[i].level}</div>`;


                }

                $('#course_list').append(html);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
    });

</script>
