<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">Pending Job Approvals</h3>
                    @forelse ($pendingJobs as $job)
                        <div class="p-4 border-b border-gray-200 last:border-b-0">
                            <h4 class="text-md font-semibold">{{ $job->title }}</h4>
                            <p class="text-sm text-gray-600">Company: {{ $job->company_name }}</p>
                            <p class="text-sm text-gray-500">Posted by: {{ $job->employer->name ?? 'N/A' }}</p>
                            <p class="text-sm text-gray-500">Posted at: {{ $job->created_at->diffForHumans() }}</p>

                            <div class="mt-2 flex space-x-2">
                                <a href="{{ route('jobs.show', $job) }}" class="px-3 py-1 text-sm bg-gray-200 rounded-md hover:bg-gray-300">View Details</a>
                                <form method="POST" action="{{ route('admin.jobs.approve', $job) }}">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 text-sm bg-green-500 text-white rounded-md hover:bg-green-600">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('admin.jobs.reject', $job) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 text-sm bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('Are you sure you want to reject and delete this job?');">Reject</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500">No pending jobs for approval.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>