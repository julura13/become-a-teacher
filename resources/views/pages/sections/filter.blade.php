<div class="tw-m-10 tw-mx-auto">
        <div class="row">
                <div class="lg:tw-w-1/2 tw-w-2/3 tw-px-1 lg:tw-px-4">
                <div class="tw-w-full tw-flex">
                    <div class="relative">
                        <h3 class="lg:tw-text-2xl tw-text-lg tw-underline tw-font-bold tw-text-white">Select the courses you have completed!</h3>
                        <ul>
                        @foreach ($categories as $category)

                        
                            <li onclick="listMore({{$category->id}})" id="category_{{$category->id}}" class="tw-cursor-pointer lg:tw-text-xl tw-text-sm tw-text-white">
                                <i class="far fa-plus-square tw-mr-2" id="not_selected_{{$category->id}}"></i>
                                <i class="far fa-minus-square tw-mr-2 tw-hidden" id="selected_{{$category->id}}"></i>{{ $category->name }}</li>
                            <ul id="courses_{{ $category->id }}" class="tw-hidden tw-ml-3 lg:tw-ml-5 lg:tw-text-xl tw-text-sm tw-text-white">
                                @foreach ($category->courses as $course)
                                    <li onclick="selectCourse({{ $course->id }}, '{{ $course->name }}', '{{ $course->name }}-{{ $course->level }}')" class="tw-cursor-pointer {{ $course->name }}-{{ $course->level }}">
                                        <i class="far fa-square tw-mr-2" id="course_not_selected_{{ $course->id }}"></i>
                                        <i class="far fa-check-square tw-hidden tw-mr-2" id="course_selected_{{ $course->id }}"></i>
                                        {{ $course->name }} - {{ $course->level }}
                                    </li>
                                @endforeach

                            </ul>
                        @endforeach
                    </ul>

                        <div id="course_list">

                        </div>

                    </div>

                </div>
                </div>

                <div class="lg:tw-w-1/2 tw-w-1/3 tw-px-1 lg:tw-px-4 tw-hidden" id="methodologySection">
                <div class="tw-overflow-x-auto tw-mb-2">
                    <table class="tw-table-fixed">
                        <thead>
                            <tr>
                                <td class="lg:tw-text-2xl tw-text-lg tw-text-white tw-pb-4">You will be able to teach:</td>
                            </tr>
                        </thead>
                        <tbody id="pathwaysBody" class="tw-mt-5">
                           
                        </tbody>
                    </table>
                </div>


                </div>
            </div>
            <!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="pathwayInfo" tabindex="-1" role="dialog" aria-labelledby="pathwayInfoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pathwayInfoLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="pathwayInfoBody">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>


