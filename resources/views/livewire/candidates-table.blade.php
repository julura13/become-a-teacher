<div>
    <div class="tw-w-full tw-flex tw-pb-10">
        <div class="relative">
            <label>Search</label>
            <input wire:model.debounce.300ms="search" type="search" class="tw-block tw-mx-2 tw-bg-gray-200 tw-text-gray-700 border tw-border-gray-200 tw-rounded tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" placeholder="Search candidates...">
        </div>
        <div class="relative tw-mr-2">
            <label>Sort by</label>
            <select wire:model="orderBy" class="tw-block tw-bg-gray-200 border tw-border-gray-200 tw-text-gray-700 tw-py-3 tw-px-4 tw-pr-8 tw-rounded tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-state">
                <option value="id">ID</option>
                <option value="name">Name</option>
                <option value="email">Email</option>
            </select>
        </div>
        <div class="relative tw-mr-2">
            <label>Order by</label>
            <select wire:model="orderAsc" class="tw-block tw-bg-gray-200 border tw-border-gray-200 tw-text-gray-700 tw-py-3 tw-px-4 tw-pr-8 tw-rounded tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-state">
                <option value="1">Ascending</option>
                <option value="0">Descending</option>
            </select>
        </div>
        <div class="relative tw-mr-2">
            <label>Per page</label>
            <select wire:model="per_page" class="tw-block tw-bg-gray-200 border tw-border-gray-200 tw-text-gray-700 tw-py-3 tw-px-4 tw-pr-8 tw-rounded tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-state">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        <div class="relative tw-mr-2">
            <label>Download CSV</label>
            <button onclick="window.location.href='/api/v1/export/candidates';" class="tw-block tw-bg-green-500 border tw-border-green-400 tw-text-gray-100 tw-py-3 tw-px-4 tw-rounded-2xl tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-green-500 focus:tw-text-black tw-text-lg" id="grid-state">
                <i class="fas fa-file-csv"></i>
            </button>
        </div>
    </div>
    <div class="tw-overflow-x-auto tw-mb-2">
        <table class="tw-table-fixed border">
            <thead class="tw-bg-gray-200">
                <tr>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">ID</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Name</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Email</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Age</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Gender</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">University</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Created at</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Count used</th>
                    <th class="tw-truncate tw-px-6 tw-py-3 tw-text-xs tw-tracking-wider tw-text-left tw-uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                    <tr>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $candidate->id }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ ucfirst($candidate->name) }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $candidate->email }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $candidate->age }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $candidate->gender }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $candidate->university }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $candidate->updated_at->diffForHumans() }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2">{{ $candidate->count }}</td>
                        <td class="tw-truncate border tw-px-4 tw-py-2 tw-text-center">
                            <a href="/candidate/delete/{{ $candidate->id }}"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {{ $candidates->links() }}
    
</div>
