<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posted Jobs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse ($jobs as $job)
                        <div class="p-4 border-b border-gray-200 last:border-b-0">
                            <h4 class="text-lg font-semibold">{{ $job->title }}</h4>
                            <p class="text-sm text-gray-500">Applications: {{ $job->applications->count() }}</p>

                            <div class="mt-2 flex space-x-2">
                                <a href="{{ route('employers.jobs.applications', $job) }}" class="px-3 py-1 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600">View Applications</a>
                                <a href="{{ route('jobs.edit', $job) }}" class="px-3 py-1 text-sm bg-gray-200 rounded-md hover:bg-gray-300">Edit Job</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500">You have not posted any jobs yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>