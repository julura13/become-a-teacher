<div>
    <div class="tw-w-full tw-grid tw-grid-rows-1 tw-grid-cols-4 tw-pb-10">
        <div class="tw-col-span-3">
            <div class="tw-flex">
                <div class="relative">
                    <input wire:model.debounce.300ms="search" type="search" class="tw-block tw-mx-2 tw-bg-gray-200 tw-text-gray-700 border tw-border-gray-200 tw-rounded tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500"placeholder="Search pathways...">
                </div>
                <div class="relative tw-mr-2">
                    <select wire:model="orderBy" class="tw-block tw-bg-gray-200 border tw-border-gray-200 tw-text-gray-700 tw-py-3 tw-px-4 tw-pr-8 tw-rounded tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-state">
                        <option value="id">ID</option>
                        <option value="name">Name</option>
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
            

        </div>

        <div class="tw-text-right tw-mr-2 tw-mt-2">
            <a class="tw-bg-blue-500 tw-rounded tw-px-2 tw-py-2 tw-text-white" href="/create/pathway">Add</a>
        </div>
    </div>
    <div class="tw-overflow-x-auto tw-mb-2">
        <table class="tw-table-fixed border">
            <thead class="tw-bg-gray-200">
                <tr>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">ID</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Name</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Description</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Additional info</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Requirements</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Created at</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Updated at</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pathways as $pathway)
                    <tr>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $pathway->id }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ ucfirst($pathway->name) }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $pathway->description }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $pathway->more_info }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2 {{ count($pathway->requirement) == 0 ? "tw-text-center" : "" }}">
                            @if (count($pathway->requirement) == 0)
                                <a href="/pathway/requirement/add/{{ $pathway->id }}" class="tw-bg-blue-500 tw-rounded tw-px-2 tw-py-1 tw-text-white"><i class="fas fa-plus"></i></a>
                            @else
                                @foreach ($pathway->requirement as $requirement)
                                ({{ $requirement->course_1_name }}{{$requirement->course_2_name == null ? "" : " OR ".$requirement->course_2_name}}{{ $requirement->course_3_name == null ? "" : " OR ".$requirement->course_3_name}}) 
                                @endforeach
                            @endif
                            
                        </td>


                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $pathway->created_at->diffForHumans() }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $pathway->updated_at->diffForHumans() }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2 tw-text-center">
                            <a href="pathway/{{ $pathway->id }}" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                            <a href="pathway/delete/{{ $pathway->id }}"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            <a href="/pathway/requirement/add/{{ $pathway->id }}" tooltip="Edit requirements">
                                <i class="ik ik-edit-2 f-16 ml-15 text-blue"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {{ $pathways->links() }}
    
</div>
