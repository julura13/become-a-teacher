<div>
    <div class="tw-w-full tw-flex tw-pb-10">
        <div class="relative">
            <input wire:model.debounce.300ms="search" type="search" class="tw-block tw-mx-2 tw-bg-gray-200 tw-text-gray-700 border tw-border-gray-200 tw-rounded tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500"placeholder="Search courses...">
        </div>
        <div class="relative tw-mr-2">
            <select wire:model="orderBy" class="tw-block tw-bg-gray-200 border tw-border-gray-200 tw-text-gray-700 tw-py-3 tw-px-4 tw-pr-8 tw-rounded tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-state">
                <option value="id">ID</option>
                <option value="name">Name</option>
                <option value="level">Level</option>
                <option value="created_at">Created At</option>
                <option value="updated_at">Updated At</option>
            </select>
        </div>
        <div class="relative tw-mr-2">
            <select wire:model="orderAsc" class="tw-block tw-bg-gray-200 border tw-border-gray-200 tw-text-gray-700 tw-py-3 tw-px-4 tw-pr-8 tw-rounded tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-state">
                <option value="1">Ascending</option>
                <option value="0">Descending</option>
            </select>
        </div>
        <div class="relative tw-mr-2">
            <select wire:model="per_page" class="tw-block  tw-bg-gray-200 border tw-border-gray-200 tw-text-gray-700 tw-py-3 tw-px-4 tw-pr-8 tw-rounded tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-state">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
    </div>
    <div class="tw-overflow-x-auto tw-mb-2">
        <table class="tw-table-fixed border">
            <thead class="tw-bg-gray-200">
                <tr>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">ID</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Name</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Level</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Description</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Created at</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Updated at</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $course->id }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ ucfirst($course->name) }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $course->level }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $course->description }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $course->created_at->diffForHumans() }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $course->updated_at->diffForHumans()  }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2 tw-text-center">
                            <a href="course/{{ $course->id }}" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                            <a href="course/delete/{{ $course->id }}"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {{ $courses->links() }}
    
</div>
